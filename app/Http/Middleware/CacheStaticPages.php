<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CacheStaticPages
{
    /**
     * Cache GET responses for portfolio pages.
     * La clave es la URL completa: /  y /en ya distinguen los locales (el
     * locale de la app en este punto siempre es el default — el controlador
     * lo cambia recién después).
     * Cache is busted on every deploy via APP_KEY change or manual clear.
     *
     * Requests that carry session flash (success/error del formulario de
     * contacto, errores de validación, old input) se sirven y renderizan
     * sin caché: de lo contrario el "mensaje enviado" de un visitante
     * quedaría cacheado para todos durante el TTL completo.
     */
    public function handle(Request $request, Closure $next, int $ttlMinutes = 60)
    {
        if (!$request->isMethod('GET') || app()->environment('local') || $this->hasFlashState($request)) {
            return $next($request);
        }

        $key = 'page_' . md5($request->url());

        $cached = Cache::get($key);
        if ($cached !== null) {
            return response($cached)
                ->header('Content-Type', 'text/html; charset=UTF-8')
                ->header('X-Cache', 'HIT');
        }

        $response = $next($request);

        if ($response->getStatusCode() === 200) {
            Cache::put($key, $response->getContent(), now()->addMinutes($ttlMinutes));
            $response->header('X-Cache', 'MISS');
        }

        return $response;
    }

    private function hasFlashState(Request $request): bool
    {
        if (!$request->hasSession()) {
            return false;
        }

        $session = $request->session();
        $errors  = $session->get('errors');

        return $session->has('success')
            || $session->has('error')
            || ($errors && $errors->any())
            || (bool) $session->get('_old_input');
    }
}
