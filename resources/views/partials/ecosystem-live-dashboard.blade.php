{{-- ══════════════════════════════════════════════════════════════════════
     ECOSYSTEM LIVE DASHBOARD
     Panel de estado en tiempo real: grafo D3.js + ticker FX + contadores.
     Datos: /status endpoint propio + API pública de exchange-alert.
══════════════════════════════════════════════════════════════════════ --}}
<section id="ecosystem-dashboard" class="eco-dashboard-section">
  <div class="spacer-75"></div>
  <div class="section-title page-caption">
    <h5>{{ __('portfolio.ecosystem_status_title', [], app()->getLocale()) ?: 'Ecosistema · Estado en tiempo real' }}</h5>
    <div class="zigzag"><hr class="left"><hr class="right">@include('partials.zigzag')</div>
  </div>

  {{-- ── Contadores superiores ────────────────────────────────────────────── --}}
  <div class="eco-counters" role="status" aria-live="polite">
    <div class="eco-counter-item">
      <span class="eco-counter-value" id="ctr-pods">—</span>
      <span class="eco-counter-label">pods running</span>
    </div>
    <div class="eco-counter-item">
      <span class="eco-counter-value" id="ctr-dbs">11</span>
      <span class="eco-counter-label">bases de datos</span>
    </div>
    <div class="eco-counter-item">
      <span class="eco-counter-value" id="ctr-services">26</span>
      <span class="eco-counter-label">sistemas</span>
    </div>
    <div class="eco-counter-item eco-counter-fx">
      <span class="eco-counter-label eco-counter-label--small">USD · BOB paralelo</span>
      <span class="eco-counter-value eco-counter-value--fx" id="ctr-fx">—</span>
      <span class="eco-counter-label eco-counter-label--small" id="ctr-fx-time"></span>
    </div>
  </div>

  {{-- ── Grafo de servicios D3.js ─────────────────────────────────────────── --}}
  <div class="eco-graph-wrapper" aria-label="Mapa de microservicios del ecosistema Kapitalya">
    <svg id="ecosystem-graph" width="100%" height="420"></svg>
    <div class="eco-graph-legend">
      <span class="legend-dot legend-dot--green"></span>Running
      <span class="legend-dot legend-dot--yellow"></span>Degraded
      <span class="legend-dot legend-dot--red"></span>Down
      <span class="legend-dot legend-dot--grey"></span>Sin datos
    </div>
  </div>

  <p class="eco-dashboard-note">
    Datos en vivo · actualizado cada 60s ·
    <a href="/status" target="_blank" rel="noopener">ver API de estado completa →</a>
  </p>
</section>

{{-- ── Estilos ──────────────────────────────────────────────────────────────── --}}
<style>
.eco-dashboard-section { padding: 0 0 60px; }
.eco-counters {
  display: flex; flex-wrap: wrap; gap: 24px;
  justify-content: center; margin: 32px 0;
}
.eco-counter-item {
  display: flex; flex-direction: column; align-items: center;
  background: rgba(255,255,255,.04); border: 1px solid rgba(255,255,255,.08);
  border-radius: 12px; padding: 20px 28px; min-width: 130px;
  transition: border-color .3s;
}
.eco-counter-item:hover { border-color: rgba(255,255,255,.2); }
.eco-counter-value {
  font-size: 2rem; font-weight: 700; letter-spacing: -.02em;
  background: linear-gradient(135deg,#ffb400,#ffd166);
  -webkit-background-clip: text; -webkit-text-fill-color: transparent;
}
.eco-counter-value--fx { font-size: 1.6rem; }
.eco-counter-label { font-size: .75rem; opacity: .6; margin-top: 4px; text-align:center; }
.eco-counter-label--small { font-size: .65rem; }
.eco-counter-fx { min-width: 160px; }

.eco-graph-wrapper {
  position: relative; background: rgba(0,0,0,.3);
  border: 1px solid rgba(255,255,255,.07); border-radius: 16px;
  overflow: hidden; margin: 0 auto; max-width: 900px;
}
.eco-graph-legend {
  display: flex; gap: 16px; align-items: center; justify-content: flex-end;
  padding: 8px 16px; font-size: .7rem; opacity: .6;
}
.legend-dot {
  display: inline-block; width: 8px; height: 8px;
  border-radius: 50%; margin-right: 4px;
}
.legend-dot--green  { background: #00d4aa; }
.legend-dot--yellow { background: #f5a623; }
.legend-dot--red    { background: #ff4757; }
.legend-dot--grey   { background: #666; }
.eco-dashboard-note { text-align: center; font-size: .75rem; opacity: .45; margin-top: 16px; }
.eco-dashboard-note a { color: inherit; text-decoration: underline; }

/* Nodos del grafo */
.node circle { stroke-width: 2; cursor: pointer; transition: r .2s; }
.node circle:hover { r: 16; }
.node text { font-size: 10px; fill: rgba(255,255,255,.75); pointer-events: none; }
.link { stroke: rgba(255,255,255,.12); stroke-width: 1.5; }
</style>

{{-- ── Scripts ──────────────────────────────────────────────────────────────── --}}
<script>
(function () {
  'use strict';

  // ── Datos del ecosistema (estáticos + estado dinámico) ──────────────────
  const NODES = [
    // Namespace: public
    { id: 'forex-erp',          label: 'Forex ERP',        group: 'private',  url: null },
    { id: 'exchange-alert',     label: 'Exchange Alert',   group: 'public',   url: 'https://alertas.kapitalya.com.bo' },
    { id: 'tromay',             label: 'Tromay',           group: 'public',   url: 'https://tromay.kapitalya.com.bo' },
    { id: 'serguicv',           label: 'Serguicv',         group: 'public',   url: 'https://serguicv.kapitalya.com.bo' },
    { id: 'billeteseguro',      label: 'Billete Seguro',   group: 'kapitalya', url: null },
    { id: 'insights',           label: 'KP Insights',      group: 'kapitalya', url: 'https://insights.kapitalya.com.bo' },
    { id: 'fraud-detector',     label: 'Fraud Detector',   group: 'kapitalya', url: null },
    { id: 'compliance',         label: 'ASFI Compliance',  group: 'kapitalya', url: null },
    { id: 'kyc-engine',         label: 'KYC Engine',       group: 'kapitalya', url: null },
    { id: 'boliviaai',          label: 'BolivIA',          group: 'kapitalya', url: 'https://chat.kapitalya.com.bo' },
    { id: 'forex-predictor',    label: 'FX Predictor',     group: 'kapitalya', url: null },
    { id: 'portafolio',         label: 'Portafolio',       group: 'kapitalya', url: 'https://portafolio.kapitalya.com.bo' },
    { id: 'credit-scoring',     label: 'Credit Scoring',   group: 'kapitalya', url: 'https://scoring.kapitalya.com.bo' },
    { id: 'redis-shared',       label: 'Redis',            group: 'db',        url: null },
    { id: 'postgres-forex',     label: 'PG Forex',         group: 'db',        url: null },
    { id: 'graphql',            label: 'GraphQL API',      group: 'kapitalya', url: 'https://graphql.kapitalya.com.bo' },
  ];

  const LINKS = [
    { source: 'forex-erp',       target: 'redis-shared' },
    { source: 'forex-erp',       target: 'postgres-forex' },
    { source: 'forex-erp',       target: 'fraud-detector' },
    { source: 'forex-erp',       target: 'compliance' },
    { source: 'forex-erp',       target: 'kyc-engine' },
    { source: 'exchange-alert',  target: 'forex-predictor' },
    { source: 'exchange-alert',  target: 'redis-shared' },
    { source: 'insights',        target: 'redis-shared' },
    { source: 'boliviaai',       target: 'redis-shared' },
    { source: 'graphql',         target: 'exchange-alert' },
    { source: 'graphql',         target: 'insights' },
    { source: 'graphql',         target: 'forex-predictor' },
    { source: 'graphql',         target: 'portafolio' },
    { source: 'fraud-detector',  target: 'redis-shared' },
    { source: 'compliance',      target: 'redis-shared' },
  ];

  const GROUP_COLORS = {
    public:   '#00d4aa',
    private:  '#ffb400',
    kapitalya:'#4a90e2',
    db:       '#f5a623',
  };

  // Estado de cada nodo (se actualiza con /status)
  const nodeStatus = {};
  NODES.forEach(n => { nodeStatus[n.id] = 'unknown'; });

  // ── Fetch /status ────────────────────────────────────────────────────────
  async function fetchStatus() {
    try {
      const res = await fetch('/status', { headers: { Accept: 'application/json' }, signal: AbortSignal.timeout(5000) });
      if (!res.ok) return;
      const data = await res.json();

      // /status devuelve services como ARRAY [{id, status, ...}]; algunos ids
      // del endpoint no coinciden con los ids de los nodos del grafo.
      const SERVICE_TO_NODE = {
        'alertas':        'exchange-alert',
        'asfi':           'compliance',
        'bolivian-forex': 'forex-predictor',
      };
      (Array.isArray(data.services) ? data.services : []).forEach(svc => {
        const nodeId = SERVICE_TO_NODE[svc.id] || svc.id;
        if (nodeId in nodeStatus) {
          nodeStatus[nodeId] = svc.status === 'up' ? 'up' : 'down';
        }
      });

      renderGraph();
    } catch (e) {
      // Fallar silenciosamente
    }
  }

  // ── Fetch tasa FX ────────────────────────────────────────────────────────
  async function fetchFxRate() {
    try {
      const res = await fetch(
        '{{ config('portfolio.exchange_alert_url') }}/api/rates/?days=1',
        { signal: AbortSignal.timeout(4000) }
      );
      if (!res.ok) return;
      const data = await res.json();
      const latest = Array.isArray(data) ? data[0] : (data.results ?? [{}])[0];
      const parallel = latest?.parallel_rate ?? latest?.informal_rate;
      if (parallel) {
        document.getElementById('ctr-fx').textContent = parseFloat(parallel).toFixed(2);
        document.getElementById('ctr-fx-time').textContent =
          new Date().toLocaleTimeString('es-BO', { hour: '2-digit', minute: '2-digit' });
      }
    } catch (e) {}
  }

  // ── Grafo D3.js ──────────────────────────────────────────────────────────
  function renderGraph() {
    const container = document.getElementById('ecosystem-graph');
    if (!container || typeof d3 === 'undefined') return;

    const W = container.parentElement.clientWidth || 900;
    const H = 380;
    container.setAttribute('viewBox', `0 0 ${W} ${H}`);

    d3.select('#ecosystem-graph').selectAll('*').remove();
    const svg = d3.select('#ecosystem-graph');

    // Líneas de dependencia
    const link = svg.append('g').selectAll('line')
      .data(LINKS).join('line').attr('class', 'link');

    // Nodos
    const node = svg.append('g').selectAll('g')
      .data(NODES).join('g').attr('class', 'node')
      .call(d3.drag()
        .on('start', (e, d) => { if (!e.active) sim.alphaTarget(0.3).restart(); d.fx = d.x; d.fy = d.y; })
        .on('drag',  (e, d) => { d.fx = e.x; d.fy = e.y; })
        .on('end',   (e, d) => { if (!e.active) sim.alphaTarget(0); d.fx = null; d.fy = null; })
      )
      .on('click', (e, d) => { if (d.url) window.open(d.url, '_blank', 'noopener'); });

    const statusColor = (id) => {
      const s = nodeStatus[id] ?? 'unknown';
      if (s === 'ok' || s === 'running') return '#00d4aa';
      if (s === 'degraded' || s === 'warning') return '#f5a623';
      if (s === 'down' || s === 'error') return '#ff4757';
      return GROUP_COLORS[NODES.find(n => n.id === id)?.group] ?? '#666';
    };

    node.append('circle')
      .attr('r', d => d.group === 'db' ? 10 : 13)
      .attr('fill', d => statusColor(d.id) + '33')
      .attr('stroke', d => statusColor(d.id));

    node.append('text')
      .attr('dy', 24).attr('text-anchor', 'middle')
      .text(d => d.label);

    // Tooltip
    node.append('title').text(d => `${d.label} · ${nodeStatus[d.id] ?? 'sin datos'}`);

    const sim = d3.forceSimulation(NODES)
      .force('link', d3.forceLink(LINKS).id(d => d.id).distance(90))
      .force('charge', d3.forceManyBody().strength(-300))
      .force('center', d3.forceCenter(W / 2, H / 2))
      .force('collision', d3.forceCollide(30))
      .on('tick', () => {
        link
          .attr('x1', d => d.source.x).attr('y1', d => d.source.y)
          .attr('x2', d => d.target.x).attr('y2', d => d.target.y);
        node.attr('transform', d => `translate(${d.x},${d.y})`);
      });
  }

  // ── Inicialización ───────────────────────────────────────────────────────
  function init() {
    // Cargar D3.js dinámicamente si no está disponible
    if (typeof d3 === 'undefined') {
      const s = document.createElement('script');
      s.src = '{{ asset('js/d3.min.js') }}';
      s.onload = () => { renderGraph(); fetchStatus(); fetchFxRate(); };
      document.head.appendChild(s);
    } else {
      renderGraph();
      fetchStatus();
      fetchFxRate();
    }

    // Actualizar cada 60s
    setInterval(fetchStatus, 60000);
    setInterval(fetchFxRate, 30000);

    // Re-renderizar al cambiar tamaño
    let resizeTimer;
    window.addEventListener('resize', () => {
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(renderGraph, 250);
    });
  }

  // ── Arranque perezoso (lazy) ───────────────────────────────────────────────
  // El widget (D3 279 KB + polling /status y FX) está bajo el fold: no inyectamos
  // D3 ni arrancamos los setInterval hasta que la sección entra al viewport.
  var started = false;
  function start() {
    if (started) return;   // guard: no inicializar dos veces
    started = true;
    init();
  }

  function bootstrap() {
    var container = document.getElementById('ecosystem-dashboard');
    // Fallback (muy raro): sin IntersectionObserver → comportamiento actual.
    if (!container || !('IntersectionObserver' in window)) {
      start();
      return;
    }
    var io = new IntersectionObserver(function (entries) {
      for (var i = 0; i < entries.length; i++) {
        if (entries[i].isIntersecting) {
          io.disconnect();   // una sola vez basta
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
