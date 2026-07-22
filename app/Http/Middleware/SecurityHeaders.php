<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=()');

        // Only send HSTS when the connection is actually HTTPS.
        // Sending it over plain HTTP (php artisan serve) causes browsers
        // to cache HTTPS-only and send SSL handshakes to the HTTP dev server,
        // producing "Unsupported SSL request" warnings.
        if (app()->environment('production') && $request->secure()) {
            $response->headers->set(
                'Strict-Transport-Security',
                'max-age=31536000; includeSubDomains'
            );
        }

        // When running under php artisan serve (any port), APP_ENV=production causes
        // URL::forceScheme('https') to fire, making asset() emit https:// URLs while
        // the dev server only speaks http://.  'self' then fails because page origin
        // (http://localhost:PORT) != asset origin (https://localhost:PORT).
        // Fix: explicitly add the exact request origin for localhost so CSP allows it
        // on any port, regardless of the scheme that asset() emits.
        $host = $request->getHost();
        $isLocalhost = in_array($host, ['localhost', '127.0.0.1', '::1'], true);
        $devOrigin = $isLocalhost ? ' ' . $request->getSchemeAndHttpHost() : '';

        // Monetización: solo si hay AdSense/GA configurado se relaja el CSP hacia
        // los dominios de Google (script + iframes de anuncios). Dormido = CSP
        // estricto ('frame-src none'), sin cambios respecto al original.
        $adsOn    = (bool) (config('services.adsense.client') || config('services.analytics.ga_id'));
        $gScript  = $adsOn ? ' https://pagead2.googlesyndication.com https://*.googlesyndication.com https://www.googletagmanager.com https://www.google-analytics.com https://adservice.google.com https://partner.googleadservices.com' : '';
        $gConnect = $adsOn ? ' https://pagead2.googlesyndication.com https://*.google-analytics.com https://*.doubleclick.net https://*.googlesyndication.com' : '';
        $frameSrc = $adsOn ? "frame-src https://googleads.g.doubleclick.net https://*.doubleclick.net https://*.googlesyndication.com" : "frame-src 'none'";

        $response->headers->set(
            'Content-Security-Policy',
            implode('; ', [
                "default-src 'self'{$devOrigin}",
                "script-src 'self'{$devOrigin} 'unsafe-inline' https://static.cloudflareinsights.com{$gScript}",
                "script-src-elem 'self'{$devOrigin} 'unsafe-inline' https://static.cloudflareinsights.com{$gScript}",
                "style-src 'self'{$devOrigin} 'unsafe-inline'",
                "style-src-elem 'self'{$devOrigin} 'unsafe-inline'",
                "font-src 'self'{$devOrigin} data:",
                "img-src 'self'{$devOrigin} data: blob: https: http:",
                // *.kapitalya.com.bo: el dashboard en vivo consulta la tasa FX
                // directamente a alertas.kapitalya.com.bo desde el navegador
                "connect-src 'self'{$devOrigin} https://*.kapitalya.com.bo https://cloudflareinsights.com https://static.cloudflareinsights.com{$gConnect}",
                $frameSrc,
                "object-src 'none'",
                "base-uri 'self'",
                "form-action 'self'{$devOrigin}",
            ])
        );

        return $response;
    }
}
