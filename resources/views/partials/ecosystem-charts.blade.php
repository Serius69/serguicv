{{-- ══════════════════════════════════════════════════════════════════════
     ECOSISTEMA EN DATOS — Dos gráficos Chart.js (data-viz que vende)
     · Doughnut: 52 proyectos del catálogo por dominio
     · Barras horizontales: menciones de stack en el catálogo (se solapan)
     Cifras REALES derivadas de partials/catalog.blade.php (verificadas).
     Chart.js 4.4.4 ya está auto-hospedado y cargado global (window.Chart).
══════════════════════════════════════════════════════════════════════ --}}
@php
  $chLocale = app()->getLocale();

  // ── Gráfico 1 · Dominios (52 proyectos) ──────────────────────────────────
  //    Etiquetas por locale (reutiliza la nomenclatura del catálogo).
  $domainRows = [
    ['es' => 'Verticales Fintech',  'en' => 'Fintech Verticals',  'v' => 14],
    ['es' => 'Micro-SaaS PyME',     'en' => 'SME Micro-SaaS',      'v' => 11],
    ['es' => 'Plataforma',          'en' => 'Platform',            'v' => 7],
    ['es' => 'Núcleo Fintech',      'en' => 'Fintech Core',        'v' => 5],
    ['es' => 'Enterprise B2B',      'en' => 'Enterprise B2B',      'v' => 5],
    ['es' => 'ML & Datos',          'en' => 'ML & Data',           'v' => 5],
    ['es' => 'Portfolio poliglota', 'en' => 'Polyglot portfolio',  'v' => 5],
  ];
  $domainTotal  = array_sum(array_column($domainRows, 'v')); // 52
  $domainLabels = array_map(fn ($r) => $chLocale === 'en' ? $r['en'] : $r['es'], $domainRows);
  $domainData   = array_column($domainRows, 'v');
  // Paleta elegante y distinguible (ámbar de marca primero).
  $domainColors = ['#ffb400', '#4ea1ff', '#33c9a3', '#b57cff', '#ff7a66', '#ffd166', '#7f8fa6'];

  // ── Gráfico 2 · Menciones de stack (se solapan; NO son proyectos únicos) ──
  $stackRows = [
    ['es' => 'FastAPI',      'en' => 'FastAPI',      'v' => 35],
    ['es' => 'React',        'en' => 'React',        'v' => 32],
    ['es' => 'Django',       'en' => 'Django',       'v' => 11],
    ['es' => 'Java / Spring','en' => 'Java / Spring','v' => 2],
    ['es' => 'Otros (Vue · NestJS · .NET 8 · Laravel 11 · DRF)',
     'en' => 'Others (Vue · NestJS · .NET 8 · Laravel 11 · DRF)',
     // Etiqueta corta para el eje (la larga se cortaba); el detalle vive en el
     // tooltip (título) y en la tabla accesible .sr-only de abajo.
     'short_es' => 'Otros (5 stacks)', 'short_en' => 'Others (5 stacks)', 'v' => 5],
  ];
  $stackTotal  = array_sum(array_column($stackRows, 'v')); // 85 menciones
  // Etiqueta del eje Y: usa la versión corta cuando existe (fila "Otros").
  $stackLabels = array_map(
    fn ($r) => $chLocale === 'en' ? ($r['short_en'] ?? $r['en']) : ($r['short_es'] ?? $r['es']),
    $stackRows
  );
  // Etiqueta completa (para el título del tooltip, sin cortar).
  $stackFullLabels = array_map(fn ($r) => $chLocale === 'en' ? $r['en'] : $r['es'], $stackRows);
  $stackData   = array_column($stackRows, 'v');
@endphp

<style>
  /* Fallback accesible / no-JS: mismo dato para lectores de pantalla */
  #ecosystem-charts .sr-only {
    position: absolute !important; width: 1px; height: 1px;
    padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0);
    white-space: nowrap; border: 0;
  }
  .eco-charts-section { padding: 0 0 60px; }
  .eco-charts-subtitle {
    max-width: 720px; margin: 8px auto 0; text-align: center;
    font-size: .92rem; line-height: 1.6; opacity: .6;
  }
  .eco-charts-grid {
    display: grid; grid-template-columns: repeat(2, 1fr);
    gap: 24px; margin-top: 36px;
  }
  .eco-chart-card {
    background: rgba(255,255,255,.03);
    border: 1px solid rgba(255,255,255,.08);
    border-radius: 14px; padding: 26px 24px 22px;
    display: flex; flex-direction: column;
  }
  .eco-chart-card__title {
    font-size: .82rem; letter-spacing: .12em; text-transform: uppercase;
    font-weight: 700; opacity: .85; margin: 0 0 4px;
  }
  .eco-chart-card__note { font-size: .74rem; opacity: .5; line-height: 1.45; margin: 0 0 14px; }
  .eco-chart-canvas-wrap {
    position: relative; flex: 1 1 auto;
    min-height: 300px; display: flex; align-items: center; justify-content: center;
  }
  /* Tema claro: paneles con tinte oscuro sutil (el sitio togglea data-theme) */
  html[data-theme="light"] .eco-chart-card {
    background: rgba(0,0,0,.02);
    border-color: rgba(0,0,0,.08);
  }
  @media (max-width: 820px) {
    .eco-charts-grid { grid-template-columns: 1fr; }
    .eco-chart-canvas-wrap { min-height: 280px; }
  }
</style>

<section id="ecosystem-charts" class="eco-charts-section">
  <div class="spacer-60"></div>
  <div class="section-title page-caption">
    <h5>{{ __('portfolio.charts_title') }}</h5>
    <div class="zigzag"><hr class="left"><hr class="right">@include('partials.zigzag')</div>
  </div>
  <p class="eco-charts-subtitle">{{ __('portfolio.charts_subtitle') }}</p>

  <div class="eco-charts-grid">

    {{-- ── Gráfico 1 · Doughnut dominios ─────────────────────────────────── --}}
    <div class="eco-chart-card fade-in-scroll">
      <h6 class="eco-chart-card__title">{{ __('portfolio.chart_domain_title') }}</h6>
      <p class="eco-chart-card__note">
        {{ $chLocale === 'en'
           ? $domainTotal.' projects across '.count($domainRows).' domains'
           : $domainTotal.' proyectos en '.count($domainRows).' dominios' }}
      </p>
      <div class="eco-chart-canvas-wrap">
        <canvas id="ecoDomainChart"
                role="img"
                aria-label="{{ __('portfolio.chart_domain_title') }} — {{ $domainTotal }} {{ $chLocale === 'en' ? 'projects' : 'proyectos' }}"></canvas>
      </div>
      {{-- Fallback accesible / no-JS --}}
      <table class="sr-only">
        <caption>{{ __('portfolio.chart_domain_title') }}</caption>
        <thead><tr>
          <th>{{ $chLocale === 'en' ? 'Domain' : 'Dominio' }}</th>
          <th>{{ $chLocale === 'en' ? 'Projects' : 'Proyectos' }}</th>
        </tr></thead>
        <tbody>
          @foreach($domainRows as $r)
            <tr><td>{{ $chLocale === 'en' ? $r['en'] : $r['es'] }}</td><td>{{ $r['v'] }}</td></tr>
          @endforeach
          <tr><td>{{ $chLocale === 'en' ? 'Total' : 'Total' }}</td><td>{{ $domainTotal }}</td></tr>
        </tbody>
      </table>
    </div>

    {{-- ── Gráfico 2 · Barras horizontales stack ─────────────────────────── --}}
    <div class="eco-chart-card fade-in-scroll">
      <h6 class="eco-chart-card__title">{{ __('portfolio.chart_stack_title') }}</h6>
      <p class="eco-chart-card__note">{{ __('portfolio.chart_stack_note') }}</p>
      <div class="eco-chart-canvas-wrap">
        <canvas id="ecoStackChart"
                role="img"
                aria-label="{{ __('portfolio.chart_stack_title') }}"></canvas>
      </div>
      {{-- Fallback accesible / no-JS --}}
      <table class="sr-only">
        <caption>{{ __('portfolio.chart_stack_title') }}</caption>
        <thead><tr>
          <th>{{ $chLocale === 'en' ? 'Technology' : 'Tecnología' }}</th>
          <th>{{ $chLocale === 'en' ? 'Mentions' : 'Menciones' }}</th>
        </tr></thead>
        <tbody>
          @foreach($stackRows as $r)
            <tr><td>{{ $chLocale === 'en' ? $r['en'] : $r['es'] }}</td><td>{{ $r['v'] }}</td></tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
</section>

@push('scripts')
<script>
(function () {
  'use strict';

  function initEcosystemCharts() {
    if (!window.Chart) return; // Chart.js (defer) ya corrió antes de DOMContentLoaded

    // ── Colores según tema (el sitio togglea data-theme en <html>) ─────────
    var isLight   = document.documentElement.getAttribute('data-theme') === 'light';
    var textColor = isLight ? '#33373d' : '#e9e9ec';
    var mutedText = isLight ? 'rgba(0,0,0,.55)' : 'rgba(255,255,255,.62)';
    var gridColor = isLight ? 'rgba(0,0,0,.08)' : 'rgba(255,255,255,.08)';
    var arcBorder = isLight ? '#ffffff' : '#141414';
    var accent    = '#ffb400';
    var font      = "'Poppins', sans-serif";

    // ── Gráfico 1 · Doughnut "Ecosistema por dominio" ─────────────────────
    var domainCanvas = document.getElementById('ecoDomainChart');
    if (domainCanvas) {
      var domLabels = @json($domainLabels);
      var domData   = @json($domainData);
      var domColors = @json($domainColors);
      var domTotal  = {{ $domainTotal }};
      var domCenterLbl = @json($chLocale === 'en' ? 'projects' : 'proyectos');

      // Plugin: total al centro del doughnut
      var centerTextPlugin = {
        id: 'ecoCenterText',
        afterDraw: function (chart) {
          var ctx = chart.ctx;
          var area = chart.chartArea;
          if (!area) return;
          var cx = (area.left + area.right) / 2;
          var cy = (area.top + area.bottom) / 2;
          ctx.save();
          ctx.textAlign = 'center';
          ctx.textBaseline = 'middle';
          ctx.fillStyle = textColor;
          ctx.font = '700 34px ' + font;
          ctx.fillText(String(domTotal), cx, cy - 6);
          ctx.fillStyle = mutedText;
          ctx.font = '500 11px ' + font;
          ctx.fillText(domCenterLbl, cx, cy + 18);
          ctx.restore();
        }
      };

      new window.Chart(domainCanvas, {
        type: 'doughnut',
        data: {
          labels: domLabels,
          datasets: [{
            data: domData,
            backgroundColor: domColors,
            borderColor: arcBorder,
            borderWidth: 2,
            hoverOffset: 8
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          cutout: '60%',
          plugins: {
            legend: {
              position: 'right',
              labels: {
                color: textColor,
                font: { family: font, size: 11.5 },
                boxWidth: 12, boxHeight: 12, padding: 10, usePointStyle: true
              }
            },
            tooltip: {
              callbacks: {
                label: function (ctx) {
                  var v = ctx.parsed;
                  var pct = Math.round((v / domTotal) * 100);
                  return ' ' + v + ' · ' + pct + '%';
                }
              }
            }
          }
        },
        plugins: [centerTextPlugin]
      });
    }

    // ── Gráfico 2 · Barras horizontales "Stack · menciones" ───────────────
    var stackCanvas = document.getElementById('ecoStackChart');
    if (stackCanvas) {
      var stkLabels = @json($stackLabels);
      var stkFull   = @json($stackFullLabels);
      var stkData   = @json($stackData);
      var stkTotal  = {{ $stackTotal }};

      new window.Chart(stackCanvas, {
        type: 'bar',
        data: {
          labels: stkLabels,
          datasets: [{
            label: @json($chLocale === 'en' ? 'Mentions' : 'Menciones'),
            data: stkData,
            backgroundColor: 'rgba(255,180,0,.82)',
            hoverBackgroundColor: accent,
            borderColor: accent,
            borderWidth: 1,
            borderRadius: 6,
            barThickness: 'flex',
            maxBarThickness: 34
          }]
        },
        options: {
          indexAxis: 'y',
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            x: {
              beginAtZero: true,
              grid: { color: gridColor },
              ticks: { color: mutedText, font: { family: font, size: 11 }, precision: 0 }
            },
            y: {
              grid: { display: false },
              ticks: { color: textColor, font: { family: font, size: 11.5, weight: '500' } }
            }
          },
          plugins: {
            legend: { display: false },
            tooltip: {
              callbacks: {
                // Título con el nombre completo (el eje muestra la versión corta).
                title: function (items) {
                  var i = items && items[0] ? items[0].dataIndex : -1;
                  return (i > -1 && stkFull[i]) ? stkFull[i] : (items[0] ? items[0].label : '');
                },
                label: function (ctx) {
                  var v = ctx.parsed.x;
                  var pct = Math.round((v / stkTotal) * 100);
                  return ' ' + v + (v === 1 ? ' ' : ' ') +
                         @json($chLocale === 'en' ? 'mentions' : 'menciones') +
                         ' · ' + pct + '%';
                }
              }
            }
          }
        }
      });
    }
  }

  // ── Arranque perezoso (lazy) ───────────────────────────────────────────────
  // Chart.js sigue con `defer` en el <head> (necesario para el skillsRadar de la
  // sección Skills, que se pinta desde portfolio-enhanced.js y NO tiene reintento).
  // Aquí solo diferimos la CONSTRUCCIÓN de estos dos gráficos hasta que la sección
  // entra al viewport (están bajo el fold).
  var started = false;
  function start() {
    if (started) return;   // guard: no inicializar dos veces
    started = true;
    initEcosystemCharts();
  }

  function bootstrap() {
    var container = document.getElementById('ecosystem-charts');
    if (!container || !('IntersectionObserver' in window)) {
      start();
      return;
    }
    var io = new IntersectionObserver(function (entries) {
      for (var i = 0; i < entries.length; i++) {
        if (entries[i].isIntersecting) {
          io.disconnect();
          start();
          break;
        }
      }
    }, { rootMargin: '200px' });
    io.observe(container);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', bootstrap);
  } else {
    bootstrap();
  }
})();
</script>
@endpush
