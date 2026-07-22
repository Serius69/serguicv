<?php

/*
|--------------------------------------------------------------------------
| Portfolio / ecosistema Kapitalya
|--------------------------------------------------------------------------
| Toda la configuración que antes se leía con env() directamente en
| controladores y vistas vive aquí, para que `php artisan config:cache`
| funcione en producción (env() devuelve null con la config cacheada).
*/

return [

    // Badge "Open to work" en el hero
    'open_to_work' => (bool) filter_var(env('OPEN_TO_WORK', false), FILTER_VALIDATE_BOOLEAN),

    // Tromay — tasas USD/BOB en vivo (widget FX)
    'tromay_internal_url' => env('TROMAY_INTERNAL_URL', 'http://tromay_app:80'),

    // URLs usadas en vistas (sandbox, lead-modal, dashboard en vivo)
    'exchange_alert_url'  => env('EXCHANGE_ALERT_URL', 'https://alertas.kapitalya.com.bo'),
    'forex_erp_url'       => env('FOREX_ERP_URL', env('FOREX_URL', 'https://forex.kapitalya.com.bo')),
    'forex_predictor_url' => env('FOREX_PREDICTOR_URL', 'https://predictor.kapitalya.com.bo'),
    'insights_url'        => env('INSIGHTS_URL', 'https://insights.kapitalya.com.bo'),

    /*
    |----------------------------------------------------------------------
    | Catálogo de servicios para GET /status
    |----------------------------------------------------------------------
    | Grupo A: URLs internas de contenedor (misma red red_publica_gateway).
    | Grupo B: portfolio ML/FastAPI, chequeados vía gateway HTTPS público.
    */
    'status_services' => [
        [
            'id'     => 'tromay',
            'name'   => 'Tromay',
            'group'  => 'A',
            'url'    => rtrim(env('TROMAY_INTERNAL_URL', 'http://tromay_app:80'), '/') . '/health',
            'public' => env('TROMAY_URL', 'https://tromay.kapitalya.com.bo'),
        ],
        [
            'id'     => 'findempro-ai',
            'name'   => 'Findempro AI',
            'group'  => 'A',
            'url'    => 'http://findempro_nginx:80/health/live/',
            'public' => env('FINDEMPROAI_URL', 'https://app.kapitalya.com.bo'),
        ],
        [
            'id'     => 'findempro-lac',
            'name'   => 'Findempro Lácteos',
            'group'  => 'A',
            'url'    => 'http://findempro_lacteos_nginx:80/health/live/',
            'public' => env('FINDEMPROLAREOS_URL', 'https://lacteos.kapitalya.com.bo'),
        ],
        [
            'id'     => 'forex-erp',
            'name'   => 'Kapitalya ERP',
            'group'  => 'A',
            'url'    => 'http://kapitalya_nginx:80/health/',
            'public' => env('FOREX_URL', 'https://forex.kapitalya.com.bo'),
        ],
        [
            'id'     => 'alertas',
            'name'   => 'Alertas Bolivia',
            'group'  => 'A',
            'url'    => 'http://exchange_rate_app:8000/api/status/',
            'public' => env('ALERTAS_URL', 'https://alertas.kapitalya.com.bo'),
        ],
        [
            'id'     => 'bolivian-forex',
            'name'   => 'Bolivian Forex Predictor',
            'group'  => 'B',
            'url'    => env('FOREX_PRED_URL', 'https://bolivian-forex.kapitalya.com.bo') . '/health',
            'public' => env('FOREX_PRED_URL', 'https://bolivian-forex.kapitalya.com.bo'),
        ],
        [
            'id'     => 'analytics',
            'name'   => 'Analytics Dashboard',
            'group'  => 'B',
            'url'    => env('ANALYTICS_URL', 'https://analytics.kapitalya.com.bo') . '/health',
            'public' => env('ANALYTICS_URL', 'https://analytics.kapitalya.com.bo'),
        ],
        [
            'id'     => 'asfi',
            'name'   => 'ASFI Compliance',
            'group'  => 'B',
            'url'    => env('ASFI_URL', 'https://asfi.kapitalya.com.bo') . '/health',
            'public' => env('ASFI_URL', 'https://asfi.kapitalya.com.bo'),
        ],
        [
            'id'     => 'market-maker',
            'name'   => 'Market Maker',
            'group'  => 'B',
            'url'    => env('MARKET_MAKER_URL', 'https://market-maker.kapitalya.com.bo') . '/health',
            'public' => env('MARKET_MAKER_URL', 'https://market-maker.kapitalya.com.bo'),
        ],
        [
            'id'     => 'kyc-engine',
            'name'   => 'KYC Engine',
            'group'  => 'B',
            'url'    => env('KYC_URL', 'https://kyc.kapitalya.com.bo') . '/health',
            'public' => env('KYC_URL', 'https://kyc.kapitalya.com.bo'),
        ],
        [
            'id'     => 'llm-analyst',
            'name'   => 'LLM Financial Analyst',
            'group'  => 'B',
            'url'    => env('LLM_URL', 'https://llm.kapitalya.com.bo') . '/health',
            'public' => env('LLM_URL', 'https://llm.kapitalya.com.bo'),
        ],
        [
            'id'     => 'fraud-detector',
            'name'   => 'Fraud Detector',
            'group'  => 'B',
            'url'    => env('FRAUD_URL', 'https://fraud.kapitalya.com.bo') . '/health',
            'public' => env('FRAUD_URL', 'https://fraud.kapitalya.com.bo'),
        ],
        [
            'id'     => 'ml-time-series',
            'name'   => 'ML Time Series',
            'group'  => 'B',
            'url'    => env('ML_TS_URL', 'https://ml.kapitalya.com.bo') . '/_stcore/health',
            'public' => env('ML_TS_URL', 'https://ml.kapitalya.com.bo'),
        ],
        [
            'id'     => 'airflow',
            'name'   => 'Data Pipeline (Airflow)',
            'group'  => 'B',
            'url'    => env('AIRFLOW_URL', 'https://airflow.kapitalya.com.bo') . '/health',
            'public' => env('AIRFLOW_URL', 'https://airflow.kapitalya.com.bo'),
        ],
    ],

];
