            {{-- ══════════════════════════════════════════════════════════
                 CATÁLOGO DEL ECOSISTEMA — el monorepo completo
            ══════════════════════════════════════════════════════════ --}}
            @php
              $catLocale = app()->getLocale();
              // Estado honesto: 'live' = desplegado y accesible · 'ready' = código +
              // manifiestos K8s listos, deploy pendiente por migración de clúster.
              $catGroups = [
                [
                  't_es' => 'Núcleo Fintech', 't_en' => 'Fintech Core',
                  'items' => [
                    ['n' => 'Kapitalya Pay',      'es' => 'Pasarela de pagos y billetera',            'en' => 'Payments gateway & wallet',        'stack' => 'Java · Spring Boot',    'st' => 'ready', 'ic' => '💳'],
                    ['n' => 'KYC Engine',         'es' => 'Onboarding KYC + screening PEP/listas',    'en' => 'KYC onboarding + PEP/list screening','stack' => 'Django · DRF',         'st' => 'ready', 'ic' => '🪪'],
                    ['n' => 'ASFI Compliance',    'es' => 'Chequeo de cumplimiento normativo ASFI',   'en' => 'ASFI regulatory compliance checks', 'stack' => 'Django',               'st' => 'ready', 'ic' => '⚖️'],
                    ['n' => 'Market Maker',       'es' => 'Creador de mercado FX + opciones (GK/MC)', 'en' => 'FX market maker + options (GK/MC)', 'stack' => 'FastAPI · NumPy',      'st' => 'ready', 'ic' => '📈'],
                    ['n' => 'BilleteSeguro',      'es' => 'Antifraude para billeteras digitales',     'en' => 'Digital-wallet fraud defense',      'stack' => 'FastAPI',              'st' => 'ready', 'ic' => '🛡️'],
                  ],
                ],
                [
                  't_es' => 'Verticales Fintech', 't_en' => 'Fintech Verticals',
                  'items' => [
                    ['n' => 'Facturación',    'es' => 'Facturación electrónica (SIN)',        'en' => 'E-invoicing (SIN)',              'stack' => 'Django · React',  'st' => 'ready', 'ic' => '🧾'],
                    ['n' => 'Nómina',         'es' => 'Planillas y RC-IVA',                   'en' => 'Payroll & RC-IVA',               'stack' => 'Django · React',  'st' => 'ready', 'ic' => '👥'],
                    ['n' => 'Tributario',     'es' => 'Gestión de impuestos y declaraciones', 'en' => 'Tax management & filings',        'stack' => 'Django · React',  'st' => 'ready', 'ic' => '🏛️'],
                    ['n' => 'Crowdlending',   'es' => 'Préstamos P2P',                        'en' => 'P2P lending',                    'stack' => 'FastAPI · React', 'st' => 'ready', 'ic' => '🤝'],
                    ['n' => 'Cooperativas',   'es' => 'Gestión de cooperativas de ahorro',    'en' => 'Savings-cooperative management', 'stack' => 'Django · React',  'st' => 'ready', 'ic' => '🏦'],
                    ['n' => 'Remesas',        'es' => 'Remesas internacionales',              'en' => 'International remittances',       'stack' => 'FastAPI · React', 'st' => 'ready', 'ic' => '💸'],
                    ['n' => 'Microseguros',   'es' => 'Microseguros para PyMEs y personas',   'en' => 'Microinsurance',                 'stack' => 'FastAPI · React', 'st' => 'ready', 'ic' => '☂️'],
                    ['n' => 'Propiedades',    'es' => 'Crédito hipotecario e inmobiliario',   'en' => 'Real-estate finance',            'stack' => 'FastAPI · React', 'st' => 'ready', 'ic' => '🏠'],
                    ['n' => 'Contabilidad',   'es' => 'Contabilidad para PyMEs',              'en' => 'SME accounting',                 'stack' => 'FastAPI · React', 'st' => 'ready', 'ic' => '📒'],
                    ['n' => 'Pensiones',      'es' => 'Simulador y planificador de pensiones','en' => 'Pension simulator & planner',    'stack' => 'FastAPI · React', 'st' => 'ready', 'ic' => '👴'],
                    ['n' => 'Deuda',          'es' => 'Gestión y consolidación de deuda',     'en' => 'Debt management & consolidation', 'stack' => 'FastAPI · React', 'st' => 'ready', 'ic' => '📉'],
                    ['n' => 'Comparador',     'es' => 'Comparador de productos financieros',   'en' => 'Financial-product comparator',   'stack' => 'FastAPI · React', 'st' => 'ready', 'ic' => '🔎'],
                    ['n' => 'EduFinanzas',    'es' => 'Educación financiera gamificada',      'en' => 'Gamified financial education',   'stack' => 'FastAPI · React', 'st' => 'ready', 'ic' => '🎓'],
                    ['n' => 'Bolivia Data API','es' => 'API de datos macro (BCB/INE)',        'en' => 'Macro data API (BCB/INE)',       'stack' => 'FastAPI',         'st' => 'ready', 'ic' => '🗄️'],
                  ],
                ],
                [
                  't_es' => 'Enterprise B2B', 't_en' => 'Enterprise B2B',
                  'items' => [
                    ['n' => 'CRM',           'es' => 'CRM comercial multi-sector',       'en' => 'Multi-sector sales CRM',    'stack' => 'FastAPI · React', 'st' => 'ready', 'ic' => '📇'],
                    ['n' => 'Telecom',       'es' => 'Facturación y gestión telecom',    'en' => 'Telecom billing & ops',     'stack' => 'FastAPI · React', 'st' => 'ready', 'ic' => '📡'],
                    ['n' => 'Gobierno',      'es' => 'Gestión pública (GovTech)',        'en' => 'Public-sector management',  'stack' => 'FastAPI · React', 'st' => 'ready', 'ic' => '🏛️'],
                    ['n' => 'POS',           'es' => 'Punto de venta retail',            'en' => 'Retail point of sale',      'stack' => 'FastAPI · React', 'st' => 'ready', 'ic' => '🛒'],
                    ['n' => 'Mantenimiento', 'es' => 'Mantenimiento industrial (CMMS)',  'en' => 'Industrial maintenance (CMMS)','stack' => 'FastAPI · React','st' => 'ready', 'ic' => '🔧'],
                  ],
                ],
                [
                  't_es' => 'Micro-SaaS PyME', 't_en' => 'SME Micro-SaaS',
                  'items' => [
                    ['n' => 'ProformaPro',  'es' => 'Proformas y cotizaciones',       'en' => 'Quotes & proformas',         'stack' => 'FastAPI · React', 'st' => 'ready', 'ic' => '📝'],
                    ['n' => 'ImportaCosto', 'es' => 'Costeo de importaciones',         'en' => 'Import cost calculator',     'stack' => 'FastAPI · React', 'st' => 'ready', 'ic' => '🚢'],
                    ['n' => 'RC-IVA Fácil', 'es' => 'Crédito fiscal RC-IVA',           'en' => 'RC-IVA tax credit',          'stack' => 'FastAPI · React', 'st' => 'ready', 'ic' => '🧮'],
                    ['n' => 'VentaSegura',  'es' => 'Ventas y garantías',              'en' => 'Sales & warranties',         'stack' => 'FastAPI · React', 'st' => 'ready', 'ic' => '✅'],
                    ['n' => 'MesaWhats',    'es' => 'Pedidos de restaurante por WhatsApp','en' => 'Restaurant orders via WhatsApp','stack' => 'FastAPI · React','st' => 'ready', 'ic' => '💬'],
                    ['n' => 'MenuQR',       'es' => 'Menú digital con QR',             'en' => 'Digital QR menu',            'stack' => 'FastAPI · React', 'st' => 'ready', 'ic' => '📱'],
                    ['n' => 'CobraFácil',   'es' => 'Cobranzas y recordatorios',       'en' => 'Collections & reminders',    'stack' => 'FastAPI · React', 'st' => 'ready', 'ic' => '📮'],
                    ['n' => 'Katalogo',     'es' => 'Catálogo de productos online',    'en' => 'Online product catalog',     'stack' => 'FastAPI · React', 'st' => 'ready', 'ic' => '🗂️'],
                    ['n' => 'AgendaBo',     'es' => 'Agenda de turnos y reservas',     'en' => 'Bookings & appointments',    'stack' => 'FastAPI · React', 'st' => 'ready', 'ic' => '📅'],
                    ['n' => 'CajaDiaria',   'es' => 'Arqueo de caja diaria',           'en' => 'Daily cash reconciliation',  'stack' => 'FastAPI · React', 'st' => 'ready', 'ic' => '💵'],
                    ['n' => 'StockCel',     'es' => 'Inventario para tiendas de celulares','en' => 'Phone-shop inventory',    'stack' => 'FastAPI · React', 'st' => 'ready', 'ic' => '📦'],
                  ],
                ],
                [
                  't_es' => 'ML & Datos', 't_en' => 'ML & Data',
                  'items' => [
                    ['n' => 'BoliviaAI Assistant', 'es' => 'Asistente IA (RAG) con Claude',       'en' => 'RAG AI assistant (Claude)',    'stack' => 'FastAPI · Claude', 'st' => 'ready', 'ic' => '🤖'],
                    ['n' => 'Feature Store',       'es' => 'Almacén de features para ML',         'en' => 'ML feature store',             'stack' => 'FastAPI · Redis',  'st' => 'ready', 'ic' => '🧬'],
                    ['n' => 'Backtester',          'es' => 'Backtesting de estrategias',          'en' => 'Strategy backtesting',         'stack' => 'FastAPI',          'st' => 'ready', 'ic' => '⏮️'],
                    ['n' => 'Cashflow Simulator',  'es' => 'Simulador de flujo de caja PyME',     'en' => 'SME cash-flow simulator',      'stack' => 'Django',           'st' => 'ready', 'ic' => '💧'],
                    ['n' => 'Supply-Chain Opt.',   'es' => 'Optimización de cadena de suministro','en' => 'Supply-chain optimization',    'stack' => 'Django',           'st' => 'ready', 'ic' => '🔗'],
                  ],
                ],
                [
                  't_es' => 'Plataforma', 't_en' => 'Platform',
                  'items' => [
                    ['n' => 'Hub SSO',        'es' => 'Inicio de sesión único (JWT)',       'en' => 'Single sign-on (JWT)',         'stack' => 'Django · React', 'st' => 'ready', 'ic' => '🔐'],
                    ['n' => 'Notifications',  'es' => 'Notificaciones multicanal',          'en' => 'Multichannel notifications',   'stack' => 'FastAPI',        'st' => 'ready', 'ic' => '🔔'],
                    ['n' => 'GraphQL',        'es' => 'Federación GraphQL del ecosistema',  'en' => 'Ecosystem GraphQL federation', 'stack' => 'FastAPI',        'st' => 'ready', 'ic' => '◼️'],
                    ['n' => 'Admin',          'es' => 'Panel de administración central',    'en' => 'Central admin panel',          'stack' => 'Django · React', 'st' => 'ready', 'ic' => '🧭'],
                    ['n' => 'SecureWatch',    'es' => 'Monitoreo de seguridad',             'en' => 'Security monitoring',          'stack' => 'Django',         'st' => 'ready', 'ic' => '🛰️'],
                    ['n' => 'Onboarding',     'es' => 'Orquestador de onboarding',          'en' => 'Onboarding orchestrator',      'stack' => 'FastAPI',        'st' => 'ready', 'ic' => '🚦'],
                    ['n' => 'DevPortal',      'es' => 'Portal de APIs y SDKs',              'en' => 'API & SDK developer portal',   'stack' => 'React',          'st' => 'ready', 'ic' => '📚'],
                  ],
                ],
                [
                  't_es' => 'Portfolio poliglota', 't_en' => 'Polyglot portfolio',
                  'items' => [
                    ['n' => 'Cobra-Ya',    'es' => 'Cobranzas automatizadas',      'en' => 'Automated collections',   'stack' => 'Java · Spring',  'st' => 'ready', 'ic' => '☕'],
                    ['n' => 'Turno-Fácil', 'es' => 'Turnos y citas',               'en' => 'Queues & appointments',   'stack' => 'Laravel 11',     'st' => 'ready', 'ic' => '🎟️'],
                    ['n' => 'Concilia-QR', 'es' => 'Conciliación de pagos QR',     'en' => 'QR payment reconciliation','stack' => '.NET 8',         'st' => 'ready', 'ic' => '🔳'],
                    ['n' => 'Notify-Hub',  'es' => 'Hub de notificaciones',        'en' => 'Notifications hub',       'stack' => 'NestJS',         'st' => 'ready', 'ic' => '📨'],
                    ['n' => 'Ventas-IQ',   'es' => 'Analítica de ventas',          'en' => 'Sales analytics',         'stack' => 'FastAPI · Vue',  'st' => 'ready', 'ic' => '📊'],
                  ],
                ],
              ];
            @endphp

            <style>
              .catalog-group-title{display:flex;align-items:center;gap:.5rem;margin:2.2rem 0 1rem;
                font-size:.82rem;letter-spacing:.14em;text-transform:uppercase;font-weight:700;opacity:.85}
              .catalog-group-title::before{content:"";flex:0 0 22px;height:2px;background:currentColor;opacity:.5}
              .catalog-group-count{display:inline-flex;align-items:center;justify-content:center;
                min-width:1.5rem;height:1.5rem;padding:0 .4rem;border-radius:999px;
                border:1px solid currentColor;font-size:.7rem;letter-spacing:0;opacity:.7}
              #catalog .eco-card-desc{min-height:2.4em}
            </style>

            <section id="catalog" class="ecosystem-section">
              <div class="spacer-45"></div>
              <div class="section-title page-caption">
                <h5>{{ $catLocale === 'en' ? 'Full Ecosystem Catalog' : 'Catálogo del Ecosistema' }}</h5>
                <div class="zigzag">
                  <hr class="left"><hr class="right">
                  @include('partials.zigzag')
                </div>
              </div>

              <p class="eco-subtitle">
                {{ $catLocale === 'en'
                   ? 'The full Kapitalya monorepo — 69 projects across fintech, enterprise, SME micro-SaaS, ML and platform. Most are production-ready code with K8s manifests, CI and Bolivian demo seeds; deployment is pending the cluster migration.'
                   : 'El monorepo completo de Kapitalya — 69 proyectos entre fintech, enterprise, micro-SaaS PyME, ML y plataforma. La mayoría son código production-ready con manifiestos K8s, CI y seeds demo bolivianos; el deploy está pendiente por la migración de clúster.' }}
              </p>

              @foreach($catGroups as $g)
                <h4 class="catalog-group-title">{{ $catLocale === 'en' ? $g['t_en'] : $g['t_es'] }}
                  <span class="catalog-group-count">{{ count($g['items']) }}</span>
                </h4>
                <div class="eco-grid">
                  @foreach($g['items'] as $it)
                  <div class="eco-card classic-animation">
                    <div class="eco-card-head">
                      <span class="eco-card-icon">{{ $it['ic'] }}</span>
                      <span class="eco-badge {{ $it['st'] === 'live' ? 'eco-badge--public' : 'eco-badge--private' }}">
                        {{ $it['st'] === 'live'
                            ? ($catLocale === 'en' ? 'Live' : 'En vivo')
                            : ($catLocale === 'en' ? 'Production-ready' : 'Production-ready') }}
                      </span>
                    </div>
                    <h3 class="eco-card-name">{{ $it['n'] }}</h3>
                    <p class="eco-card-desc">{{ $catLocale === 'en' ? $it['en'] : $it['es'] }}</p>
                    <div class="eco-card-stack">{{ $it['stack'] }}</div>
                  </div>
                  @endforeach
                </div>
              @endforeach

            </section>
