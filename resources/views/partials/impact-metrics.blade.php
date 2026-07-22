{{-- ══════════════════════════════════════════════════════════════════════
     MÉTRICAS DE IMPACTO — Contadores animados (IntersectionObserver)
     Se incrementan cuando entran en el viewport.
══════════════════════════════════════════════════════════════════════ --}}
<section id="impact-metrics" class="impact-section">
  <div class="spacer-60"></div>
  <div class="section-title page-caption">
    <h5>Impacto técnico · Por qué importa</h5>
    <div class="zigzag"><hr class="left"><hr class="right">@include('partials.zigzag')</div>
  </div>

  <div class="impact-grid">

    <div class="impact-card" data-count="64717" data-suffix="" data-prefix="">
      <div class="impact-icon">📊</div>
      <div class="impact-value"><span class="impact-counter">0</span><span class="impact-unit">k+</span></div>
      <div class="impact-label">cotizaciones históricas reales del dólar analizadas (ARIMA)</div>
    </div>

    <div class="impact-card" data-count="10000" data-suffix="" data-prefix="">
      <div class="impact-icon">🎲</div>
      <div class="impact-value"><span class="impact-counter">0</span><span class="impact-unit">k</span></div>
      <div class="impact-label">escenarios Monte Carlo por corrida (simulador de Pymes)</div>
    </div>

    <div class="impact-card impact-card--highlight" data-count="50" data-suffix="ms" data-prefix="P95 &lt; ">
      <div class="impact-icon">⚡</div>
      <div class="impact-value">
        <span class="impact-prefix">P95 &lt; </span>
        <span class="impact-counter">0</span>
        <span class="impact-unit">ms</span>
      </div>
      <div class="impact-label">detección de fraude en tiempo real</div>
    </div>

    <div class="impact-card" data-count="78" data-suffix="%" data-prefix="">
      <div class="impact-icon">🎯</div>
      <div class="impact-value"><span class="impact-counter">0</span><span class="impact-unit">%</span></div>
      <div class="impact-label">AUC en modelo de scoring crediticio · datos reales (UCI German)</div>
    </div>

    <div class="impact-card" data-count="26" data-suffix="" data-prefix="">
      <div class="impact-icon">🏗️</div>
      <div class="impact-value"><span class="impact-counter">0</span></div>
      <div class="impact-label">sistemas en producción en el ecosistema Kapitalya</div>
    </div>

    <div class="impact-card" data-count="47" data-suffix="+" data-prefix="">
      <div class="impact-icon">🚀</div>
      <div class="impact-value"><span class="impact-counter">0</span><span class="impact-unit">k+</span></div>
      <div class="impact-label">líneas de código · 18 meses de desarrollo</div>
    </div>

  </div>
</section>

<style>
.impact-section { padding: 0 0 60px; }
.impact-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  gap: 20px; margin-top: 32px;
}
.impact-card {
  background: rgba(255,255,255,.03);
  border: 1px solid rgba(255,255,255,.08);
  border-radius: 14px; padding: 28px 24px;
  text-align: center; transition: border-color .3s, transform .3s;
  position: relative; overflow: hidden;
}
.impact-card::before {
  content: ''; position: absolute; inset: 0;
  background: radial-gradient(ellipse at top, rgba(255,180,0,.06) 0%, transparent 70%);
  pointer-events: none;
}
.impact-card:hover {
  border-color: rgba(255,180,0,.3);
  transform: translateY(-4px);
}
.impact-card--highlight {
  border-color: rgba(255,180,0,.25);
  background: rgba(255,180,0,.05);
}
.impact-card--highlight::before {
  background: radial-gradient(ellipse at top, rgba(255,180,0,.09) 0%, transparent 70%);
}
.impact-icon { font-size: 2rem; margin-bottom: 12px; }
.impact-value {
  font-size: 2.4rem; font-weight: 800; letter-spacing: -.03em; line-height: 1;
  margin-bottom: 10px;
  background: linear-gradient(135deg, #fff 0%, rgba(255,255,255,.6) 100%);
  -webkit-background-clip: text; -webkit-text-fill-color: transparent;
}
.impact-card--highlight .impact-value {
  background: linear-gradient(135deg, #ffb400, #ffd166);
  -webkit-background-clip: text; -webkit-text-fill-color: transparent;
}
.impact-prefix { font-size: 1.2rem; font-weight: 400; }
.impact-unit   { font-size: 1.4rem; font-weight: 600; }
.impact-label  { font-size: .8rem; opacity: .55; line-height: 1.4; }
</style>

<script>
(function () {
  'use strict';

  function animateCounter(el, target, duration) {
    const start = performance.now();
    const isLarge = target >= 1000;
    const displayTarget = isLarge ? Math.round(target / 1000) : target;

    function tick(now) {
      const elapsed = now - start;
      const progress = Math.min(elapsed / duration, 1);
      // Ease-out cubic
      const eased = 1 - Math.pow(1 - progress, 3);
      const current = Math.round(eased * displayTarget);
      el.textContent = current.toLocaleString('es-BO');
      if (progress < 1) requestAnimationFrame(tick);
      else el.textContent = displayTarget.toLocaleString('es-BO');
    }
    requestAnimationFrame(tick);
  }

  const cards = document.querySelectorAll('.impact-card[data-count]');
  if (!cards.length) return;

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      const card = entry.target;
      const counter = card.querySelector('.impact-counter');
      const target  = parseFloat(card.dataset.count);
      if (counter && !card.dataset.animated) {
        card.dataset.animated = 'true';
        animateCounter(counter, target, 1800);
      }
      observer.unobserve(card);
    });
  }, { threshold: 0.3 });

  cards.forEach(card => observer.observe(card));
})();
</script>
