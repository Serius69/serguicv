<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'project/*/view',
        // El page-cache (CacheStaticPages, 120 min) sirve el HTML —incluido el
        // token @csrf— de la sesión que calentó el caché, así que cualquier otro
        // visitante recibiría 419 al enviar los formularios. Ambos endpoints son
        // públicos, sin estado autenticado que proteger, y están compensados con
        // throttle + honeypot ('website') en los controladores.
        'contact',
        'leads',
    ];
}
