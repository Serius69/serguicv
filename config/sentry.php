<?php

return [

    'dsn' => env('SENTRY_LARAVEL_DSN', ''),

    'release' => env('GIT_COMMIT', null),

    'environment' => env('APP_ENV', 'production'),

    'breadcrumbs' => [
        'logs'                 => true,
        'sql_queries'          => false,  // portfolio no tiene queries críticas
        'sql_bindings'         => false,
        'queue_info'           => true,
        'command_info'         => false,
        'http_client_requests' => true,
    ],

    'tracing' => [
        'queue_job_transactions' => false,
        'queue_jobs'             => false,
        'sql_queries'            => false,
        'http_client_requests'   => true,
    ],

    'traces_sample_rate' => (float) env('SENTRY_TRACES_RATE', 0.05),

    'send_default_pii' => false,

    'ignore_exceptions' => [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Validation\ValidationException::class,
        \Symfony\Component\HttpKernel\Exception\NotFoundHttpException::class,
        \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException::class,
        \Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException::class,
    ],

    // Callable [clase, método] y no Closure: los Closures rompen config:cache.
    // Además el Closure anterior mutaba una copia local sin setRequest() — el
    // scrub de PII era un no-op; SentryScrubber sí lo aplica.
    'before_send' => [\App\Support\SentryScrubber::class, 'beforeSend'],
];
