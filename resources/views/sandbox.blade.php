@extends('layout.master')

{{-- /sandbox es una ruta huérfana (no enlazada, sin valor SEO) → forzar noindex.
     El layout master fija <meta name="robots" content="index, follow"> en el <head>
     y NO expone un stack de <head> que podamos sobrescribir, así que reescribimos la
     meta durante el render (Googlebot ejecuta JS y respeta el noindex resultante).
     Refuerzo recomendado fuera de alcance: `Disallow: /sandbox` en public/robots.txt. --}}
@push('scripts')
<script>(function(){var m=document.querySelector('meta[name="robots"]');if(!m){m=document.createElement('meta');m.setAttribute('name','robots');document.head.appendChild(m);}m.setAttribute('content','noindex, nofollow');})();</script>
@endpush

@section('body')
<div class="page-cover">
  <div id="page-scroll">
    <div class="barba-wrapper" data-barba="wrapper">
      <main class="onepage" data-barba="container">
        <div class="container">
          <div class="page-wrapper">

            @include('partials.header')

            <section class="sandbox-section">
              <div class="spacer-75"></div>
              <div class="section-title page-caption">
                <h5>API Sandbox · Ecosistema Kapitalya en producción</h5>
                <div class="zigzag"><hr class="left"><hr class="right">@include('partials.zigzag')</div>
              </div>
              <p class="sandbox-intro">
                Esta es la <strong>API real del ecosistema</strong> corriendo en producción.
                Ejecuta las queries pre-construidas o escribe las tuyas.
                Sin login, sin API key para los endpoints públicos.
              </p>

              {{-- Query selector --}}
              <div class="sandbox-queries" role="tablist" aria-label="Queries disponibles">
                @php
                // Snippets con URLs resueltas (config, no env — compatible con
                // config:cache) y saltos de línea reales. Blade NO interpola
                // {{ }} dentro de @php: nunca usar placeholders aquí.
                $snippets = static fn (string $url): array => [
                    'python' => "import requests\nr = requests.get(\"{$url}\")\nprint(r.json())",
                    'js'     => "const r = await fetch(\"{$url}\");\nconsole.log(await r.json());",
                    'curl'   => "curl \"{$url}\"",
                ];

                $ratesUrl    = rtrim(config('portfolio.exchange_alert_url'), '/') . '/api/rates/?days=1';
                $forecastUrl = rtrim(config('portfolio.forex_predictor_url'), '/') . '/forecast/?horizon=7d';
                $insightsUrl = rtrim(config('portfolio.insights_url'), '/') . '/api/hallazgos/?limit=3';
                $statusUrl   = url('/status');

                $queries = [
                  [
                    'id'    => 'rates',
                    'label' => '💱 Tasas actuales',
                    'desc'  => 'Tipo de cambio USD/BOB del mercado paralelo boliviano',
                    'method'=> 'GET',
                    'url'   => $ratesUrl,
                  ] + $snippets($ratesUrl),
                  [
                    'id'    => 'forecast',
                    'label' => '📈 Predicción 7 días',
                    'desc'  => 'Forecast del tipo de cambio para los próximos 7 días (Ensemble ML)',
                    'method'=> 'GET',
                    'url'   => $forecastUrl,
                  ] + $snippets($forecastUrl),
                  [
                    'id'    => 'insights',
                    'label' => '🧠 Últimos insights',
                    'desc'  => 'Hallazgos económicos más recientes de Kapitalya Insights',
                    'method'=> 'GET',
                    'url'   => $insightsUrl,
                  ] + $snippets($insightsUrl),
                  [
                    'id'    => 'health',
                    'label' => '💚 Health del ecosistema',
                    'desc'  => 'Estado de todos los servicios del ecosistema Kapitalya',
                    'method'=> 'GET',
                    'url'   => $statusUrl,
                  ] + $snippets($statusUrl),
                ];
                @endphp

                @foreach($queries as $q)
                  <button
                    class="sandbox-query-btn {{ $loop->first ? 'active' : '' }}"
                    data-query-id="{{ $q['id'] }}"
                    role="tab"
                    aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                  >
                    {{ $q['label'] }}
                  </button>
                @endforeach
              </div>

              {{-- Panel principal --}}
              <div class="sandbox-panel">
                @foreach($queries as $q)
                  <div class="sandbox-query-panel {{ $loop->first ? 'active' : '' }}" data-panel="{{ $q['id'] }}">
                    <div class="sandbox-request-bar">
                      <span class="sandbox-method sandbox-method--{{ strtolower($q['method']) }}">{{ $q['method'] }}</span>
                      <code class="sandbox-url" id="url-{{ $q['id'] }}">{{ $q['url'] }}</code>
                      <button class="sandbox-run-btn" data-query="{{ $q['id'] }}" aria-label="Ejecutar query">
                        ▶ Ejecutar
                      </button>
                    </div>
                    <p class="sandbox-desc">{{ $q['desc'] }}</p>

                    {{-- Response --}}
                    <div class="sandbox-response" id="response-{{ $q['id'] }}">
                      <div class="sandbox-response-header">
                        <span class="sandbox-response-status" id="status-{{ $q['id'] }}"></span>
                        <span class="sandbox-response-time"  id="time-{{ $q['id'] }}"></span>
                        <button class="sandbox-code-btn" data-query="{{ $q['id'] }}">Ver código</button>
                      </div>
                      <pre class="sandbox-json language-json" id="json-{{ $q['id'] }}"><code id="code-{{ $q['id'] }}">Pulsa Ejecutar para ver la respuesta real →</code></pre>
                    </div>

                    {{-- Code snippets --}}
                    <div class="sandbox-code-panel" id="codepanel-{{ $q['id'] }}" hidden>
                      <div class="sandbox-code-tabs">
                        <button class="sandbox-code-tab active" data-lang="python">Python</button>
                        <button class="sandbox-code-tab" data-lang="js">JavaScript</button>
                        <button class="sandbox-code-tab" data-lang="curl">curl</button>
                      </div>
                      <pre class="sandbox-code-snippet language-python" data-code-python="{{ $q['python'] }}"><code>{{ $q['python'] }}</code></pre>
                      <pre class="sandbox-code-snippet language-javascript" data-code-js="{{ $q['js'] }}" hidden><code>{{ $q['js'] }}</code></pre>
                      <pre class="sandbox-code-snippet" data-code-curl="{{ $q['curl'] }}" hidden><code>{{ $q['curl'] }}</code></pre>
                    </div>
                  </div>
                @endforeach
              </div>

              <p class="sandbox-footer-note">
                🔒 Los endpoints privados (forex-erp, KYC, fraud) requieren JWT.
                <a href="https://graphql.kapitalya.com.bo/graphql" target="_blank" rel="noopener">
                  GraphiQL playground →
                </a>
              </p>
            </section>

            @include('partials.footer')
          </div>
        </div>
      </main>
    </div>
  </div>
</div>

{{-- Prism.js para syntax highlighting (self-hosted v1.29.0) --}}
<link rel="stylesheet" href="{{ asset('css/prism-tomorrow.min.css') }}">
<script src="{{ asset('js/prism.min.js') }}" defer></script>
<script src="{{ asset('js/prism-json.min.js') }}" defer></script>
<script src="{{ asset('js/prism-python.min.js') }}" defer></script>
<script src="{{ asset('js/prism-bash.min.js') }}" defer></script>

<style>
.sandbox-section { padding: 0 0 80px; }
.sandbox-intro { font-size: .9rem; opacity: .7; max-width: 680px; margin: 16px 0 32px; line-height: 1.6; }
.sandbox-intro strong { color: #00d4aa; }
.sandbox-queries { display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 24px; }
.sandbox-query-btn {
  padding: 8px 18px; border-radius: 8px; border: 1px solid rgba(255,255,255,.15);
  background: transparent; color: rgba(255,255,255,.65); cursor: pointer;
  font-size: .85rem; transition: all .2s;
}
.sandbox-query-btn:hover { border-color: rgba(255,255,255,.35); color: #fff; }
.sandbox-query-btn.active {
  background: rgba(123,97,255,.2); border-color: #7b61ff; color: #fff;
}

.sandbox-panel {
  background: rgba(0,0,0,.3); border: 1px solid rgba(255,255,255,.08);
  border-radius: 14px; overflow: hidden;
}
.sandbox-query-panel { display: none; }
.sandbox-query-panel.active { display: block; }

.sandbox-request-bar {
  display: flex; align-items: center; gap: 12px;
  padding: 14px 20px; border-bottom: 1px solid rgba(255,255,255,.07);
  flex-wrap: wrap;
}
.sandbox-method {
  font-size: .7rem; font-weight: 700; padding: 3px 8px; border-radius: 4px;
  text-transform: uppercase;
}
.sandbox-method--get { background: rgba(0,212,170,.15); color: #00d4aa; }
.sandbox-method--post { background: rgba(74,144,226,.15); color: #4a90e2; }
.sandbox-url { font-size: .8rem; opacity: .6; flex: 1; overflow-x: auto; font-family: monospace; }
.sandbox-run-btn {
  padding: 7px 18px; background: linear-gradient(135deg,#7b61ff,#4a90e2);
  border: none; border-radius: 6px; color: #fff; cursor: pointer;
  font-size: .8rem; font-weight: 600; transition: opacity .2s; white-space: nowrap;
}
.sandbox-run-btn:hover { opacity: .85; }
.sandbox-run-btn:disabled { opacity: .4; cursor: wait; }
.sandbox-desc { padding: 10px 20px 0; font-size: .8rem; opacity: .5; margin: 0; }

.sandbox-response { padding: 0; }
.sandbox-response-header {
  display: flex; align-items: center; gap: 12px; padding: 10px 20px;
  border-bottom: 1px solid rgba(255,255,255,.05);
}
.sandbox-response-status { font-size: .75rem; font-weight: 600; }
.sandbox-response-status.ok   { color: #00d4aa; }
.sandbox-response-status.err  { color: #ff4757; }
.sandbox-response-time { font-size: .7rem; opacity: .4; margin-right: auto; }
.sandbox-code-btn {
  font-size: .7rem; padding: 4px 12px; border-radius: 5px;
  border: 1px solid rgba(255,255,255,.15); background: transparent;
  color: rgba(255,255,255,.6); cursor: pointer;
}
.sandbox-code-btn:hover { border-color: rgba(255,255,255,.35); color: #fff; }

.sandbox-json {
  margin: 0; max-height: 320px; overflow-y: auto;
  font-size: .78rem; line-height: 1.5; padding: 16px 20px !important;
  background: transparent !important;
}

.sandbox-code-panel { border-top: 1px solid rgba(255,255,255,.07); }
.sandbox-code-tabs { display: flex; gap: 2px; padding: 10px 20px 0; }
.sandbox-code-tab {
  padding: 5px 14px; font-size: .75rem; border-radius: 5px 5px 0 0;
  border: 1px solid rgba(255,255,255,.1); border-bottom: none;
  background: transparent; color: rgba(255,255,255,.5); cursor: pointer;
}
.sandbox-code-tab.active { background: rgba(255,255,255,.08); color: #fff; }
.sandbox-code-snippet {
  margin: 0; font-size: .78rem; padding: 14px 20px !important;
  max-height: 160px; overflow-y: auto; background: transparent !important;
}
.sandbox-footer-note {
  margin-top: 20px; font-size: .75rem; opacity: .4; text-align: center;
}
.sandbox-footer-note a { color: inherit; text-decoration: underline; }
</style>

<script>
(function () {
  'use strict';

  // ── Query switching ───────────────────────────────────────────────────────
  document.querySelectorAll('.sandbox-query-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      const id = btn.dataset.queryId;
      document.querySelectorAll('.sandbox-query-btn').forEach(b => {
        b.classList.toggle('active', b === btn);
        b.setAttribute('aria-selected', b === btn ? 'true' : 'false');
      });
      document.querySelectorAll('.sandbox-query-panel').forEach(p => {
        p.classList.toggle('active', p.dataset.panel === id);
      });
    });
  });

  // ── Ejecutar queries ──────────────────────────────────────────────────────
  document.querySelectorAll('.sandbox-run-btn').forEach(btn => {
    btn.addEventListener('click', async () => {
      const id = btn.dataset.query;
      const urlEl = document.getElementById(`url-${id}`);
      const statusEl = document.getElementById(`status-${id}`);
      const timeEl = document.getElementById(`time-${id}`);
      const codeEl = document.getElementById(`code-${id}`);

      if (!urlEl || !codeEl) return;

      btn.disabled = true;
      btn.textContent = '⟳ Cargando...';
      codeEl.textContent = 'Cargando...';

      const t0 = performance.now();
      try {
        const res = await fetch(urlEl.textContent.trim(), { signal: AbortSignal.timeout(8000) });
        const ms = Math.round(performance.now() - t0);
        const json = await res.json();

        codeEl.textContent = JSON.stringify(json, null, 2);
        statusEl.textContent = `${res.status} ${res.statusText}`;
        statusEl.className = `sandbox-response-status ${res.ok ? 'ok' : 'err'}`;
        timeEl.textContent = `${ms}ms`;

        if (typeof Prism !== 'undefined') {
          codeEl.parentElement.className = 'sandbox-json language-json';
          Prism.highlightElement(codeEl);
        }
      } catch (e) {
        const ms = Math.round(performance.now() - t0);
        codeEl.textContent = `Error: ${e.message}`;
        statusEl.textContent = 'Error';
        statusEl.className = 'sandbox-response-status err';
        timeEl.textContent = `${ms}ms`;
      } finally {
        btn.disabled = false;
        btn.textContent = '▶ Ejecutar';
      }
    });
  });

  // ── Ver código ────────────────────────────────────────────────────────────
  document.querySelectorAll('.sandbox-code-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      const panel = document.getElementById(`codepanel-${btn.dataset.query}`);
      if (panel) {
        const hidden = panel.hidden;
        panel.hidden = !hidden;
        btn.textContent = hidden ? 'Ocultar código' : 'Ver código';
      }
    });
  });

  // Code language tabs
  document.querySelectorAll('.sandbox-code-tabs').forEach(tabs => {
    tabs.querySelectorAll('.sandbox-code-tab').forEach(tab => {
      tab.addEventListener('click', () => {
        const lang = tab.dataset.lang;
        const panel = tabs.parentElement;
        tabs.querySelectorAll('.sandbox-code-tab').forEach(t => t.classList.toggle('active', t === tab));
        panel.querySelectorAll('.sandbox-code-snippet').forEach(s => {
          s.hidden = !s.hasAttribute(`data-code-${lang}`);
        });
      });
    });
  });
})();
</script>
@endsection
