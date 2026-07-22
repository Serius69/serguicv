            {{-- ══════════════════════════════════════════════════════════
                 ECOSISTEMA EN PRODUCCIÓN
            ══════════════════════════════════════════════════════════ --}}
            <section id="ecosystem" class="ecosystem-section">
              <div class="spacer-75"></div>
              <div class="section-title page-caption">
                <h5>{{ __('portfolio.ecosystem_title') }}</h5>
                <div class="zigzag">
                  <hr class="left"><hr class="right">
                  @include('partials.zigzag')
                </div>
              </div>

              <p class="eco-subtitle">{{ __('portfolio.ecosystem_subtitle') }}</p>

              @php
                $ecosistema = [
                  [
                    'nombre'  => 'Tromay',
                    'desc_es' => 'Sistema integral para casa de cambio — tasas FX en tiempo real, transacciones, clientes y noticias financieras.',
                    'desc_en' => 'Full-stack exchange house management — real-time FX rates, transactions, clients, and financial news.',
                    'url'     => env('TROMAY_URL', 'https://kapitalya.com.bo'),
                    'stack'   => 'Laravel · MySQL · Redis',
                    'acceso'  => 'publico',
                    'icon'    => '💱',
                  ],
                  [
                    'nombre'  => 'Findempro AI',
                    'desc_es' => 'Plataforma de simulación y toma de decisiones financieras para Pymes con modelos probabilísticos e IA.',
                    'desc_en' => 'Financial decision-support platform for SMEs with probabilistic simulation models and AI.',
                    'url'     => env('FINDEMPROAI_URL', 'https://app.kapitalya.com.bo'),
                    'stack'   => 'Django · Python · Celery · PostgreSQL',
                    'acceso'  => 'publico',
                    'icon'    => '🤖',
                  ],
                  [
                    'nombre'  => 'Findempro Lácteos',
                    'desc_es' => 'Versión sectorial de Findempro especializada en el sector lácteo boliviano. Pronóstico de demanda y gestión.',
                    'desc_en' => 'Sector-specific Findempro for Bolivia\'s dairy industry. Demand forecasting and management.',
                    'url'     => env('FINDEMPROLAREOS_URL', 'https://lacteos.kapitalya.com.bo'),
                    'stack'   => 'Django · Python · Celery · MySQL',
                    'acceso'  => 'publico',
                    'icon'    => '🥛',
                  ],
                  [
                    'nombre'  => 'Kapitalya ERP',
                    'desc_es' => 'ERP multi-tenant para casas de cambio: tasas FX real-time (8 fuentes del mercado paralelo), ML forecasting, WebSocket y cumplimiento ASFI.',
                    'desc_en' => 'Multi-tenant ERP for exchange houses: real-time FX rates (8 parallel-market sources), ML forecasting, WebSocket, and ASFI compliance.',
                    'url'     => null,
                    'stack'   => 'Django · React · TypeScript · Celery · PostgreSQL',
                    'acceso'  => 'privado',
                    'icon'    => '🏦',
                  ],
                  [
                    'nombre'  => 'Alertas Tipo de Cambio',
                    'desc_es' => 'Sistema de alertas del dólar paralelo boliviano — pronósticos ARIMA y notificaciones WhatsApp (Twilio).',
                    'desc_en' => 'Bolivia\'s parallel dollar alert system — ARIMA forecasts and WhatsApp notifications via Twilio.',
                    'url'     => null,
                    'stack'   => 'Django · ARIMA · Twilio · APScheduler',
                    'acceso'  => 'privado',
                    'icon'    => '📊',
                  ],
                  [
                    'nombre'  => 'Kapitalya Insights',
                    'desc_es' => 'Portal público de análisis económico boliviano — investigación, proyecciones econométricas e indicadores en vivo. Referencia de SEO y accesibilidad (WCAG 2.1 AA). Deploy pendiente por migración de clúster.',
                    'desc_en' => 'Public Bolivian economic-analysis portal — research, econometric projections, and live indicators. SEO and accessibility (WCAG 2.1 AA) reference. Deployment pending cluster migration.',
                    'url'     => null,
                    'stack'   => 'Django · DRF · React · PostgreSQL',
                    'acceso'  => 'privado',
                    'icon'    => '📈',
                  ],
                  [
                    'nombre'  => 'Suite Kapitalya (30 verticales)',
                    'desc_es' => '14 fintech + 5 enterprise + 11 micro-SaaS PyME en un monorepo, con Hub SSO (un solo login), seeds bolivianos, CI y hardening de seguridad. Deploy pendiente por migración de clúster.',
                    'desc_en' => '14 fintech + 5 enterprise + 11 SME micro-SaaS in one monorepo, with Hub SSO (single login), Bolivian seeds, CI, and security hardening. Deployment pending cluster migration.',
                    'url'     => null,
                    'stack'   => 'FastAPI · Django · React · PostgreSQL · Redis',
                    'acceso'  => 'privado',
                    'icon'    => '🧩',
                  ],
                ];
                $locale = app()->getLocale();
              @endphp

              <div class="eco-grid">
                @foreach($ecosistema as $p)
                <div class="eco-card classic-animation">
                  <div class="eco-card-head">
                    <span class="eco-card-icon">{{ $p['icon'] }}</span>
                    <span class="eco-badge {{ $p['acceso'] === 'publico' ? 'eco-badge--public' : 'eco-badge--private' }}">
                      {{ $p['acceso'] === 'publico' ? __('portfolio.ecosystem_public') : __('portfolio.ecosystem_private') }}
                    </span>
                  </div>
                  <h3 class="eco-card-name">{{ $p['nombre'] }}</h3>
                  <p class="eco-card-desc">
                    {{ $locale === 'en' ? $p['desc_en'] : $p['desc_es'] }}
                  </p>
                  <div class="eco-card-stack">{{ $p['stack'] }}</div>
                  @if($p['url'])
                    <a href="{{ $p['url'] }}" target="_blank" rel="noopener" class="eco-card-link">
                      {{ __('portfolio.ecosystem_visit') }} →
                    </a>
                  @else
                    <span class="eco-card-locked">🔒 {{ __('portfolio.ecosystem_private') }}</span>
                  @endif
                </div>
                @endforeach
              </div>

              @if(!empty($tromayRates))
              <div class="eco-rates-widget">
                <div class="eco-rates-header">
                  <h4 class="eco-rates-title">💱 {{ __('portfolio.ecosystem_rates_title') }}</h4>
                  <span class="eco-rates-src">{{ __('portfolio.ecosystem_rates_src') }}</span>
                </div>
                <div class="eco-rates-grid">
                  @foreach($tromayRates as $rate)
                  @if(isset($rate['name'], $rate['buy'], $rate['sell']))
                  <div class="eco-rate-card">
                    <div class="eco-rate-name">{{ $rate['name'] }}</div>
                    <div class="eco-rate-values">
                      <span>
                        <span class="eco-rate-lbl">{{ __('portfolio.ecosystem_buy') }}</span>
                        <strong class="eco-rate-buy">{{ number_format($rate['buy'], 4) }}</strong>
                      </span>
                      <span>
                        <span class="eco-rate-lbl">{{ __('portfolio.ecosystem_sell') }}</span>
                        <strong class="eco-rate-sell">{{ number_format($rate['sell'], 4) }}</strong>
                      </span>
                    </div>
                  </div>
                  @endif
                  @endforeach
                </div>
              </div>
              @endif

            </section>
