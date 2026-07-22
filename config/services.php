<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    */

    'mailgun' => [
        'domain'   => env('MAILGUN_DOMAIN'),
        'secret'   => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme'   => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key'    => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    // ── Servicios internos del ecosistema Kapitalya ──────────────────────────
    'kapitalya_admin' => [
        'url'   => env('KAPITALYA_ADMIN_URL', 'http://kapitalya-admin.kapitalya.svc.cluster.local:8008'),
        'token' => env('KAPITALYA_ADMIN_TOKEN', ''),
    ],

    'kapitalya_notifications' => [
        'url'     => env('NOTIFICATIONS_URL', 'http://kapitalya-notifications.kapitalya.svc.cluster.local:8090'),
        'api_key' => env('NOTIFICATIONS_API_KEY', ''),
    ],

    // ── Monetización — anuncios (AdSense) y analítica (opcional) ──────────────
    // Vacío = desactivado: no se carga ningún script de terceros, el CSP queda
    // estricto y no aparece banner. Nota: en un CV/portafolio profesional conviene
    // activar solo GA (medición) y NO AdSense (los anuncios restan seriedad).
    'adsense' => [
        'client' => env('ADSENSE_CLIENT', ''),
        'slot'   => env('ADSENSE_SLOT', ''),
    ],

    'analytics' => [
        'ga_id' => env('GA_MEASUREMENT_ID', ''),
    ],

];
