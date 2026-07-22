{{-- ══════════════════════════════════════════════════════════════════════
     TOUR GUIADO INTERACTIVO — 5 pasos, navegación ← →  + teclado
     Duración estimada: 4 minutos
══════════════════════════════════════════════════════════════════════ --}}
<section id="ecosystem-tour" class="tour-section">
  <div class="spacer-75"></div>
  <div class="section-title page-caption">
    <h5>Tour · 4 minutos para entender el ecosistema</h5>
    <div class="zigzag"><hr class="left"><hr class="right">@include('partials.zigzag')</div>
  </div>

  <div class="tour-container" role="region" aria-label="Tour interactivo del ecosistema Kapitalya">

    {{-- Progress bar --}}
    <div class="tour-progress" aria-hidden="true">
      @for ($i = 0; $i < 5; $i++)
        <div class="tour-progress-dot {{ $i === 0 ? 'active' : '' }}" data-step="{{ $i }}"></div>
      @endfor
      <span class="tour-progress-label"><span id="tour-step-num">1</span> / 5</span>
    </div>

    {{-- Paso 1: El problema --}}
    <div class="tour-step active" data-step="0" aria-label="Paso 1 de 5">
      <div class="tour-step-inner">
        <div class="tour-visual">
          <div class="tour-svg-wrapper">
            <svg viewBox="0 0 320 200" class="tour-svg" aria-hidden="true">
              {{-- Casa de cambio con procesos manuales --}}
              <rect x="60" y="40" width="200" height="130" rx="8" fill="rgba(255,255,255,.05)" stroke="rgba(255,255,255,.15)" stroke-width="1.5"/>
              <text x="160" y="65" text-anchor="middle" fill="rgba(255,255,255,.5)" font-size="11">Casa de Cambio Boliviana</text>
              {{-- Hoja de papel --}}
              <rect class="tour-anim-float" x="90" y="80" width="50" height="65" rx="3" fill="rgba(255,200,100,.15)" stroke="rgba(255,200,100,.4)" stroke-width="1.5"/>
              <line x1="97" y1="92"  x2="132" y2="92"  stroke="rgba(255,200,100,.4)" stroke-width="1"/>
              <line x1="97" y1="100" x2="132" y2="100" stroke="rgba(255,200,100,.4)" stroke-width="1"/>
              <line x1="97" y1="108" x2="120" y2="108" stroke="rgba(255,200,100,.4)" stroke-width="1"/>
              <text x="115" y="160" text-anchor="middle" fill="rgba(255,200,100,.6)" font-size="9">Registro manual</text>
              {{-- Calculadora --}}
              <rect class="tour-anim-float-2" x="175" y="80" width="55" height="65" rx="3" fill="rgba(100,200,255,.1)" stroke="rgba(100,200,255,.35)" stroke-width="1.5"/>
              <text x="202" y="118" text-anchor="middle" fill="rgba(100,200,255,.5)" font-size="18">🧮</text>
              <text x="202" y="158" text-anchor="middle" fill="rgba(100,200,255,.5)" font-size="9">Sin control</text>
              {{-- X roja --}}
              <circle cx="285" cy="55" r="14" fill="rgba(255,71,87,.2)" stroke="rgba(255,71,87,.5)" stroke-width="1.5"/>
              <text x="285" y="60" text-anchor="middle" fill="rgba(255,71,87,.8)" font-size="14">✕</text>
            </svg>
          </div>
        </div>
        <div class="tour-content">
          <span class="tour-step-tag">El problema</span>
          <h3>Casas de cambio sin tecnología</h3>
          <p>En Bolivia, la mayoría de casas de cambio operan con registros manuales en papel, sin control de riesgo, sin cumplimiento ASFI automatizado y sin visibilidad del tipo de cambio en tiempo real.</p>
          <p>Resultado: errores humanos, fraude no detectado, multas regulatorias y oportunidades de negocio perdidas.</p>
        </div>
      </div>
    </div>

    {{-- Paso 2: La solución core --}}
    <div class="tour-step" data-step="1" aria-label="Paso 2 de 5">
      <div class="tour-step-inner">
        <div class="tour-visual">
          <div class="tour-live-badge">
            <span class="tour-live-dot"></span> Datos reales · staging
          </div>
          <div class="tour-api-preview">
            <div class="tour-api-label">POST /api/v1/transactions/ · forex-erp</div>
            <pre class="tour-api-json">{
  "transaction_type": "BUY",
  "currency_from": "USD",
  "currency_to":   "BOB",
  "amount_from":   1000,
  "exchange_rate": 6.96,
  "payment_method":"CASH",
  "status":        "COMPLETED"
}</pre>
            <div class="tour-api-response">
              <span class="tour-api-status tour-api-status--ok">201 Created</span>
              <span class="tour-api-time" id="tour-tx-latency">~45ms</span>
            </div>
          </div>
        </div>
        <div class="tour-content">
          <span class="tour-step-tag">La solución core</span>
          <h3>ERP multi-tenant para casas de cambio</h3>
          <p>Forex ERP reemplaza el papel con un sistema completo: 8 fuentes de tasas FX en tiempo real, control de caja por sucursal, cumplimiento ASFI automatizado y WebSocket para actualizaciones instantáneas.</p>
          <p>Multi-tenant: una instancia sirve a múltiples empresas con aislamiento completo de datos.</p>
          <a href="{{ env('FOREX_ERP_URL', 'https://forex.kapitalya.com.bo') }}" target="_blank" rel="noopener" class="tour-link">Ver forex-erp →</a>
        </div>
      </div>
    </div>

    {{-- Paso 3: Inteligencia --}}
    <div class="tour-step" data-step="2" aria-label="Paso 3 de 5">
      <div class="tour-step-inner">
        <div class="tour-visual">
          <div class="tour-forecast-chart">
            <canvas id="tour-forecast-canvas" width="300" height="160" aria-label="Predicción tipo de cambio"></canvas>
            <div class="tour-forecast-label">Predicción USD/BOB · próximos 7 días</div>
          </div>
        </div>
        <div class="tour-content">
          <span class="tour-step-tag">Inteligencia</span>
          <h3>ML · Detección de fraude · Predicciones</h3>
          <p><strong>Fraud Detector:</strong> XGBoost + Redis. Evalúa cada transacción en <span class="tour-highlight">P95 &lt; 50ms</span>. Si risk score &gt; 0.85 bloquea automáticamente.</p>
          <p><strong>FX Predictor:</strong> Ensemble (Prophet + XGBoost) con ponderación dinámica. Predicciones con intervalos de confianza multi-horizonte.</p>
          <p><strong>Credit Scoring:</strong> Random Forest sobre el proxy real UCI German Credit (mapeado al esquema boliviano). <span class="tour-highlight">AUC 0.78</span> en datos reales.</p>
        </div>
      </div>
    </div>

    {{-- Paso 4: Escala --}}
    <div class="tour-step" data-step="3" aria-label="Paso 4 de 5">
      <div class="tour-step-inner">
        <div class="tour-visual">
          <div class="tour-k8s-diagram">
            <div class="tour-k8s-namespace" data-ns="public">
              <span>public</span>
              <div class="tour-k8s-pods">
                <div class="tour-k8s-pod tour-k8s-pod--running"></div>
                <div class="tour-k8s-pod tour-k8s-pod--running"></div>
                <div class="tour-k8s-pod tour-k8s-pod--running"></div>
              </div>
            </div>
            <div class="tour-k8s-namespace" data-ns="kapitalya">
              <span>kapitalya</span>
              <div class="tour-k8s-pods">
                @for($i=0; $i<6; $i++)
                  <div class="tour-k8s-pod tour-k8s-pod--running" style="animation-delay: {{ $i * 0.1 }}s"></div>
                @endfor
              </div>
            </div>
            <div class="tour-k8s-namespace" data-ns="databases">
              <span>databases</span>
              <div class="tour-k8s-pods">
                @for($i=0; $i<5; $i++)
                  <div class="tour-k8s-pod tour-k8s-pod--running" style="animation-delay: {{ $i * 0.15 }}s"></div>
                @endfor
              </div>
            </div>
            <div class="tour-k8s-namespace" data-ns="monitoring">
              <span>monitoring</span>
              <div class="tour-k8s-pods">
                @for($i=0; $i<4; $i++)
                  <div class="tour-k8s-pod tour-k8s-pod--running" style="animation-delay: {{ $i * 0.12 }}s"></div>
                @endfor
              </div>
            </div>
          </div>
        </div>
        <div class="tour-content">
          <span class="tour-step-tag">Escala</span>
          <h3>26 sistemas · Kubernetes · Production-grade</h3>
          <p><strong>Infra:</strong> Docker Desktop K8s · 8 nodos · 47 pods Running · Cloudflare Tunnel → ingress-nginx.</p>
          <p><strong>Datos:</strong> 8× PostgreSQL · 3× MySQL · Redis DB 0-10 · Prometheus + Grafana + Tempo (trazas distribuidas).</p>
          <p><strong>Networking:</strong> KrakenD API Gateway · cert-manager TLS · Tailscale para servicios privados.</p>
        </div>
      </div>
    </div>

    {{-- Paso 5: Stack y timeline --}}
    <div class="tour-step" data-step="4" aria-label="Paso 5 de 5">
      <div class="tour-step-inner">
        <div class="tour-visual">
          <div class="tour-timeline">
            <div class="tour-timeline-item">
              <span class="tour-timeline-date">Mar 2024</span>
              <span class="tour-timeline-event">Tromay · Exchange Alert</span>
            </div>
            <div class="tour-timeline-item">
              <span class="tour-timeline-date">Jun 2024</span>
              <span class="tour-timeline-event">Forex ERP · KYC Engine</span>
            </div>
            <div class="tour-timeline-item">
              <span class="tour-timeline-date">Sep 2024</span>
              <span class="tour-timeline-event">Fraud Detector · ASFI Compliance</span>
            </div>
            <div class="tour-timeline-item">
              <span class="tour-timeline-date">Dic 2024</span>
              <span class="tour-timeline-event">Insights · BolivIA · Portfolio</span>
            </div>
            <div class="tour-timeline-item">
              <span class="tour-timeline-date">Mar 2025</span>
              <span class="tour-timeline-event">Credit Scoring · FX Predictor · K8s</span>
            </div>
            <div class="tour-timeline-item tour-timeline-item--current">
              <span class="tour-timeline-date">Jun 2025</span>
              <span class="tour-timeline-event">GraphQL · OTEL · Event Bus · SOPS</span>
            </div>
          </div>
        </div>
        <div class="tour-content">
          <span class="tour-step-tag">Stack</span>
          <h3>18 meses · 26 sistemas · 47,000+ líneas</h3>
          <p><strong>Backend:</strong> Django 4.2 · FastAPI · Laravel 9 · Celery · Airflow 2.9 · dbt 1.8</p>
          <p><strong>Frontend:</strong> React 18 · TypeScript · D3.js · Vite</p>
          <p><strong>ML:</strong> XGBoost · Prophet · Random Forest · ARIMA · Isolation Forest · Markowitz MPT</p>
          <p><strong>Infra:</strong> K8s · Docker · Prometheus · Grafana · OpenTelemetry · Redis Streams · SOPS</p>
          <button class="tour-cta-btn" id="tour-contact-open">
            ¿Te interesa? Hablemos →
          </button>
        </div>
      </div>
    </div>

    {{-- Navegación --}}
    <div class="tour-nav" role="navigation" aria-label="Navegación del tour">
      <button class="tour-nav-btn" id="tour-prev" aria-label="Paso anterior" disabled>
        ← Anterior
      </button>
      <button class="tour-nav-btn tour-nav-btn--primary" id="tour-next" aria-label="Siguiente paso">
        Siguiente →
      </button>
    </div>
  </div>
</section>

<style>
.tour-section { padding: 0 0 40px; }
.tour-container {
  max-width: 960px; margin: 0 auto;
  background: rgba(255,255,255,.03); border: 1px solid rgba(255,255,255,.07);
  border-radius: 20px; overflow: hidden;
}
.tour-progress {
  display: flex; align-items: center; gap: 8px; padding: 20px 32px 0;
}
.tour-progress-dot {
  width: 8px; height: 8px; border-radius: 50%;
  background: rgba(255,255,255,.2); cursor: pointer; transition: background .3s, transform .3s;
}
.tour-progress-dot.active { background: #ffb400; transform: scale(1.4); }
.tour-progress-label { margin-left: auto; font-size: .75rem; opacity: .4; }

.tour-step { display: none; }
.tour-step.active { display: block; animation: tourFadeIn .4s ease; }
@keyframes tourFadeIn { from { opacity: 0; transform: translateX(20px); } to { opacity: 1; transform: translateX(0); } }

.tour-step-inner {
  display: grid; grid-template-columns: 1fr 1fr; gap: 32px;
  padding: 32px; min-height: 340px;
}
@media (max-width: 700px) { .tour-step-inner { grid-template-columns: 1fr; } }

.tour-visual {
  display: flex; flex-direction: column; align-items: center; justify-content: center;
  background: rgba(0,0,0,.2); border-radius: 12px; padding: 20px; min-height: 200px;
}
.tour-svg { width: 100%; max-width: 300px; }
.tour-anim-float  { animation: float 3s ease-in-out infinite; }
.tour-anim-float-2{ animation: float 3s ease-in-out infinite 1.5s; }
@keyframes float { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-6px); } }

.tour-content { display: flex; flex-direction: column; justify-content: center; gap: 12px; }
.tour-step-tag {
  display: inline-block; font-size: .7rem; font-weight: 600; letter-spacing: .1em;
  text-transform: uppercase; color: #ffb400; background: rgba(255,180,0,.1);
  border: 1px solid rgba(255,180,0,.3); border-radius: 4px; padding: 2px 10px;
  width: fit-content;
}
.tour-content h3 { font-size: 1.3rem; font-weight: 700; margin: 0; line-height: 1.3; }
.tour-content p  { font-size: .88rem; opacity: .75; margin: 0; line-height: 1.6; }
.tour-highlight  { color: #00d4aa; font-weight: 600; }
.tour-link {
  display: inline-block; margin-top: 8px; font-size: .8rem;
  color: #ffb400; text-decoration: none;
}
.tour-link:hover { text-decoration: underline; }

.tour-nav {
  display: flex; justify-content: space-between; padding: 20px 32px;
  border-top: 1px solid rgba(255,255,255,.07);
}
.tour-nav-btn {
  padding: 10px 24px; border-radius: 8px; border: 1px solid rgba(255,255,255,.15);
  background: transparent; color: rgba(255,255,255,.7); cursor: pointer;
  font-size: .9rem; transition: all .2s;
}
.tour-nav-btn:hover:not(:disabled) { border-color: rgba(255,255,255,.4); color: #fff; }
.tour-nav-btn:disabled { opacity: .3; cursor: default; }
.tour-nav-btn--primary {
  background: linear-gradient(135deg,#ffb400,#ffd166);
  border-color: transparent; color: #fff;
}
.tour-nav-btn--primary:hover:not(:disabled) { opacity: .9; }

/* Live badge */
.tour-live-badge {
  display: flex; align-items: center; gap: 6px; font-size: .7rem;
  color: #00d4aa; margin-bottom: 12px;
}
.tour-live-dot {
  width: 7px; height: 7px; border-radius: 50%; background: #00d4aa;
  animation: pulse 2s infinite;
}
@keyframes pulse { 0%,100% { opacity: 1; } 50% { opacity: .3; } }

/* API preview */
.tour-api-preview {
  width: 100%; background: rgba(0,0,0,.4); border-radius: 8px;
  border: 1px solid rgba(255,255,255,.1); overflow: hidden;
}
.tour-api-label {
  padding: 8px 12px; font-size: .65rem; opacity: .5; border-bottom: 1px solid rgba(255,255,255,.07);
}
.tour-api-json {
  margin: 0; padding: 12px; font-size: .72rem; color: #a8ff78; line-height: 1.5;
  overflow-x: auto; font-family: 'JetBrains Mono', 'Fira Code', monospace;
}
.tour-api-response { padding: 8px 12px; display: flex; gap: 12px; align-items: center; border-top: 1px solid rgba(255,255,255,.07); }
.tour-api-status--ok { color: #00d4aa; font-size: .75rem; font-weight: 600; }
.tour-api-time { font-size: .7rem; opacity: .5; }

/* K8s pods diagram */
.tour-k8s-diagram { display: flex; flex-wrap: wrap; gap: 8px; justify-content: center; }
.tour-k8s-namespace {
  background: rgba(255,255,255,.04); border: 1px solid rgba(255,255,255,.1);
  border-radius: 8px; padding: 10px 14px; text-align: center;
}
.tour-k8s-namespace span { font-size: .65rem; opacity: .5; display: block; margin-bottom: 8px; }
.tour-k8s-pods { display: flex; flex-wrap: wrap; gap: 4px; justify-content: center; max-width: 90px; }
.tour-k8s-pod {
  width: 10px; height: 10px; border-radius: 2px;
  animation: podPulse 2s ease-in-out infinite;
}
.tour-k8s-pod--running { background: #00d4aa; }
@keyframes podPulse { 0%,100% { opacity: 1; } 50% { opacity: .6; } }

/* Timeline */
.tour-timeline { display: flex; flex-direction: column; gap: 10px; width: 100%; }
.tour-timeline-item {
  display: flex; gap: 12px; align-items: baseline;
  padding: 6px 10px; border-radius: 6px; font-size: .8rem;
}
.tour-timeline-item--current {
  background: rgba(255,180,0,.15); border: 1px solid rgba(255,180,0,.3);
}
.tour-timeline-date { font-size: .7rem; opacity: .5; min-width: 60px; }
.tour-timeline-event { opacity: .8; }

/* CTA button */
.tour-cta-btn {
  margin-top: 16px; padding: 12px 28px;
  background: linear-gradient(135deg,#ffb400,#ffd166);
  border: none; border-radius: 8px; color: #fff;
  font-size: .9rem; font-weight: 600; cursor: pointer;
  transition: opacity .2s; width: fit-content;
}
.tour-cta-btn:hover { opacity: .88; }

/* Forecast canvas wrapper */
.tour-forecast-chart { width: 100%; text-align: center; }
.tour-forecast-label { font-size: .7rem; opacity: .4; margin-top: 8px; }
</style>

<script>
(function () {
  'use strict';

  let currentStep = 0;
  const totalSteps = 5;
  const steps = document.querySelectorAll('.tour-step');
  const dots  = document.querySelectorAll('.tour-progress-dot');
  const prevBtn = document.getElementById('tour-prev');
  const nextBtn = document.getElementById('tour-next');
  const stepNum = document.getElementById('tour-step-num');

  function goToStep(n) {
    if (n < 0 || n >= totalSteps) return;
    steps[currentStep].classList.remove('active');
    dots[currentStep].classList.remove('active');
    currentStep = n;
    steps[currentStep].classList.add('active');
    dots[currentStep].classList.add('active');
    if (stepNum) stepNum.textContent = currentStep + 1;
    prevBtn.disabled = currentStep === 0;
    nextBtn.textContent = currentStep === totalSteps - 1 ? 'Reiniciar →' : 'Siguiente →';
    if (currentStep === 2) drawForecastChart();
    window.dispatchEvent(new CustomEvent('tour:step', { detail: { step: currentStep } }));
  }

  prevBtn?.addEventListener('click', () => goToStep(currentStep - 1));
  nextBtn?.addEventListener('click', () => {
    if (currentStep === totalSteps - 1) { goToStep(0); } else { goToStep(currentStep + 1); }
  });

  dots.forEach(dot => dot.addEventListener('click', () => goToStep(parseInt(dot.dataset.step))));

  // Teclado ← →
  document.addEventListener('keydown', e => {
    if (e.key === 'ArrowRight') goToStep(currentStep + 1);
    if (e.key === 'ArrowLeft')  goToStep(currentStep - 1);
  });

  // CTA → abre modal de contacto
  document.getElementById('tour-contact-open')?.addEventListener('click', () => {
    document.dispatchEvent(new CustomEvent('lead:open', { detail: { source: 'tour-step-5' } }));
  });

  // Mini chart de predicción (Canvas 2D — sin dependencias)
  function drawForecastChart() {
    const canvas = document.getElementById('tour-forecast-canvas');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');
    const W = canvas.width, H = canvas.height;
    ctx.clearRect(0, 0, W, H);

    // Datos simulados de predicción (7 días)
    const base = 6.97;
    const points = Array.from({ length: 8 }, (_, i) => ({
      x: (W * 0.1) + i * (W * 0.8 / 7),
      y: H * 0.5 - (Math.sin(i * 0.7 + 1) * 18 + i * 2),
      lower: H * 0.5 - (Math.sin(i * 0.7 + 1) * 18 + i * 2) + 20,
      upper: H * 0.5 - (Math.sin(i * 0.7 + 1) * 18 + i * 2) - 20,
    }));

    // Banda de confianza
    const grad = ctx.createLinearGradient(0, 0, 0, H);
    grad.addColorStop(0, 'rgba(255,180,0,.15)');
    grad.addColorStop(1, 'rgba(255,180,0,.02)');
    ctx.beginPath();
    ctx.moveTo(points[0].x, points[0].upper);
    points.forEach(p => ctx.lineTo(p.x, p.upper));
    points.slice().reverse().forEach(p => ctx.lineTo(p.x, p.lower));
    ctx.closePath();
    ctx.fillStyle = grad;
    ctx.fill();

    // Línea de predicción
    ctx.beginPath();
    ctx.moveTo(points[0].x, points[0].y);
    points.forEach(p => ctx.lineTo(p.x, p.y));
    ctx.strokeStyle = '#ffb400';
    ctx.lineWidth = 2.5;
    ctx.stroke();

    // Línea histórica (hasta el día 3)
    ctx.beginPath();
    ctx.moveTo(points[0].x, points[0].y + 5);
    points.slice(0, 4).forEach(p => ctx.lineTo(p.x, p.y + 5));
    ctx.strokeStyle = '#00d4aa';
    ctx.lineWidth = 2;
    ctx.setLineDash([]);
    ctx.stroke();

    // Etiqueta de precio
    ctx.fillStyle = 'rgba(255,255,255,.6)';
    ctx.font = '10px monospace';
    ctx.fillText(`${base.toFixed(2)} BOB`, points[0].x, points[0].y - 8);
    ctx.fillText(`${(base + 0.04).toFixed(2)} BOB`, points[7].x - 40, points[7].y - 8);

    // Línea "hoy"
    const todayX = points[3].x;
    ctx.setLineDash([4, 3]);
    ctx.beginPath();
    ctx.moveTo(todayX, H * 0.1); ctx.lineTo(todayX, H * 0.9);
    ctx.strokeStyle = 'rgba(255,255,255,.2)';
    ctx.lineWidth = 1;
    ctx.stroke();
    ctx.setLineDash([]);
    ctx.fillStyle = 'rgba(255,255,255,.35)';
    ctx.font = '9px sans-serif';
    ctx.fillText('Hoy', todayX + 4, H * 0.15);
  }
})();
</script>
