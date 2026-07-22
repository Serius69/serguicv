{{-- ══════════════════════════════════════════════════════════════════════
     LEAD MODAL — Formulario contextual de contacto
     Se abre desde: tour step 5, secciones del ecosistema, hero.
     POST → /leads (serguicv) → kapitalya-admin /api/leads/
══════════════════════════════════════════════════════════════════════ --}}
<div id="lead-modal" class="lead-modal-overlay" aria-modal="true" role="dialog" aria-label="Formulario de contacto" hidden>
  <div class="lead-modal-box">

    <button class="lead-modal-close" id="lead-modal-close" aria-label="Cerrar">✕</button>

    <div class="lead-modal-header">
      <span class="lead-modal-emoji" id="lead-modal-emoji">👋</span>
      <h3 id="lead-modal-title">¿Te interesa el ecosistema Kapitalya?</h3>
      <p id="lead-modal-subtitle">Cuéntame qué te interesa y te escribo en menos de 24h.</p>
    </div>

    <form id="lead-form" novalidate>
      {{-- Sin @csrf: /leads está exento (el page-cache serviría un token de otra
           sesión → 419). Compensado con honeypot + throttle 10/5min. --}}
      <input type="hidden" name="source" id="lead-source" value="general">
      <input type="hidden" name="section" id="lead-section" value="">

      {{-- Honeypot anti-spam --}}
      <div style="position:absolute;left:-9999px;opacity:0;height:0;overflow:hidden" aria-hidden="true">
        <label for="lead-website">Website</label>
        <input id="lead-website" name="website" type="text" tabindex="-1" autocomplete="off">
      </div>

      <div class="lead-form-group">
        <label for="lead-name">Nombre</label>
        <input type="text" id="lead-name" name="name" placeholder="Tu nombre" required autocomplete="name">
      </div>

      <div class="lead-form-group">
        <label for="lead-email">Email</label>
        <input type="email" id="lead-email" name="email" placeholder="tu@empresa.com" required autocomplete="email">
      </div>

      <div class="lead-form-group">
        <label>¿Qué te interesa?</label>
        <div class="lead-interest-grid">
          <label class="lead-interest-chip">
            <input type="radio" name="interest" value="contratar"> 💼 Contratar
          </label>
          <label class="lead-interest-chip">
            <input type="radio" name="interest" value="colaborar"> 🤝 Colaborar
          </label>
          <label class="lead-interest-chip">
            <input type="radio" name="interest" value="invertir"> 💰 Invertir
          </label>
          <label class="lead-interest-chip">
            <input type="radio" name="interest" value="aprender"> 📚 Aprender
          </label>
        </div>
      </div>

      <button type="submit" class="lead-submit-btn" id="lead-submit">
        Enviar mensaje →
      </button>

      <p class="lead-privacy">Sin spam. Tu email se usa solo para responderte.</p>
    </form>

    <div class="lead-success" id="lead-success" hidden>
      <div class="lead-success-icon">✅</div>
      <h4>¡Mensaje enviado!</h4>
      <p>Te escribo a <strong id="lead-success-email"></strong> en menos de 24 horas.</p>
      <p class="lead-success-sub">Mientras tanto, explora el ecosistema:</p>
      <div class="lead-success-links">
        <a href="https://graphql.kapitalya.com.bo/graphql" target="_blank" rel="noopener">GraphiQL →</a>
        <a href="/sandbox">API Sandbox →</a>
        <a href="{{ config('portfolio.forex_erp_url') }}" target="_blank" rel="noopener">Forex ERP →</a>
      </div>
    </div>

  </div>
</div>

<style>
.lead-modal-overlay {
  position: fixed; inset: 0; z-index: 9999;
  background: rgba(0,0,0,.75); backdrop-filter: blur(4px);
  display: flex; align-items: center; justify-content: center;
  padding: 20px; animation: leadOverlayIn .25s ease;
}
.lead-modal-overlay[hidden] { display: none; }
@keyframes leadOverlayIn { from { opacity: 0; } to { opacity: 1; } }

.lead-modal-box {
  background: #111; border: 1px solid rgba(255,255,255,.12);
  border-radius: 20px; padding: 36px; max-width: 440px; width: 100%;
  position: relative; animation: leadBoxIn .3s cubic-bezier(.34,1.56,.64,1);
}
@keyframes leadBoxIn { from { opacity: 0; transform: translateY(20px) scale(.97); } to { opacity: 1; transform: translateY(0) scale(1); } }

.lead-modal-close {
  position: absolute; top: 16px; right: 16px;
  background: transparent; border: 1px solid rgba(255,255,255,.15);
  color: rgba(255,255,255,.5); border-radius: 6px;
  width: 28px; height: 28px; cursor: pointer; font-size: .8rem;
  transition: all .2s;
}
.lead-modal-close:hover { border-color: rgba(255,255,255,.4); color: #fff; }

.lead-modal-header { text-align: center; margin-bottom: 28px; }
.lead-modal-emoji  { font-size: 2.5rem; display: block; margin-bottom: 10px; }
.lead-modal-header h3 { font-size: 1.2rem; font-weight: 700; margin: 0 0 8px; }
.lead-modal-header p  { font-size: .85rem; opacity: .6; margin: 0; }

.lead-form-group { margin-bottom: 18px; }
.lead-form-group label { display: block; font-size: .8rem; opacity: .65; margin-bottom: 6px; }
.lead-form-group input[type=text],
.lead-form-group input[type=email] {
  width: 100%; padding: 10px 14px; background: rgba(255,255,255,.06);
  border: 1px solid rgba(255,255,255,.12); border-radius: 8px;
  color: #fff; font-size: .9rem; transition: border-color .2s;
}
.lead-form-group input:focus {
  outline: none; border-color: #ffb400;
  box-shadow: 0 0 0 3px rgba(255,180,0,.15);
}
.lead-form-group input.error { border-color: #ff4757; }

.lead-interest-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; }
.lead-interest-chip {
  display: flex; align-items: center; gap: 8px;
  padding: 8px 12px; border-radius: 8px; cursor: pointer;
  border: 1px solid rgba(255,255,255,.1); font-size: .85rem;
  transition: all .2s;
}
.lead-interest-chip:hover { border-color: rgba(255,255,255,.25); }
.lead-interest-chip input { display: none; }
.lead-interest-chip:has(input:checked) {
  border-color: #ffb400; background: rgba(255,180,0,.15);
}

.lead-submit-btn {
  width: 100%; padding: 13px;
  background: linear-gradient(135deg,#ffb400,#ffd166);
  border: none; border-radius: 10px; color: #fff;
  font-size: .95rem; font-weight: 600; cursor: pointer;
  margin-top: 8px; transition: opacity .2s;
}
.lead-submit-btn:hover { opacity: .88; }
.lead-submit-btn:disabled { opacity: .5; cursor: wait; }

.lead-privacy { font-size: .7rem; opacity: .35; text-align: center; margin-top: 10px; }

/* Success state */
.lead-success { text-align: center; padding: 20px 0; }
.lead-success-icon { font-size: 3rem; margin-bottom: 12px; }
.lead-success h4 { font-size: 1.2rem; margin: 0 0 8px; }
.lead-success p  { font-size: .85rem; opacity: .7; margin: 0 0 6px; }
.lead-success-sub { opacity: .45 !important; font-size: .75rem !important; margin-top: 16px !important; }
.lead-success-links { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; margin-top: 8px; }
.lead-success-links a {
  font-size: .8rem; color: #ffb400; text-decoration: none;
  border: 1px solid rgba(255,180,0,.3); border-radius: 6px; padding: 5px 12px;
}
.lead-success-links a:hover { background: rgba(255,180,0,.1); }
</style>

<script>
(function () {
  'use strict';

  const modal     = document.getElementById('lead-modal');
  const form      = document.getElementById('lead-form');
  const success   = document.getElementById('lead-success');
  const closeBtn  = document.getElementById('lead-modal-close');
  const submitBtn = document.getElementById('lead-submit');
  const sourceEl  = document.getElementById('lead-source');
  const sectionEl = document.getElementById('lead-section');
  const titleEl   = document.getElementById('lead-modal-title');
  const emojiEl   = document.getElementById('lead-modal-emoji');

  const CONTEXT_TITLES = {
    'tour-step-5':    { emoji: '🚀', title: '¿Te interesa el stack completo?' },
    'ecosystem':      { emoji: '🌐', title: '¿Te interesa el ecosistema?' },
    'hero':           { emoji: '👋', title: 'Hablemos de tu proyecto' },
    'general':        { emoji: '💬', title: '¿Te interesa Kapitalya?' },
  };

  // Abrir modal desde cualquier parte
  document.addEventListener('lead:open', (e) => {
    const source = e.detail?.source || 'general';
    const ctx = CONTEXT_TITLES[source] || CONTEXT_TITLES.general;
    if (emojiEl) emojiEl.textContent = ctx.emoji;
    if (titleEl) titleEl.textContent = ctx.title;
    if (sourceEl) sourceEl.value = source;
    if (sectionEl) sectionEl.value = document.querySelector('section:hover')?.id || '';
    if (form) form.hidden = false;
    if (success) success.hidden = true;
    modal.hidden = false;
    document.body.style.overflow = 'hidden';
    setTimeout(() => modal.querySelector('input')?.focus(), 100);
  });

  // Botones que abren el modal directamente
  document.querySelectorAll('[data-lead-open]').forEach(btn => {
    btn.addEventListener('click', () => {
      document.dispatchEvent(new CustomEvent('lead:open', {
        detail: { source: btn.dataset.leadOpen || 'general' }
      }));
    });
  });

  function closeModal() {
    modal.hidden = true;
    document.body.style.overflow = '';
  }

  closeBtn?.addEventListener('click', closeModal);
  modal?.addEventListener('click', e => { if (e.target === modal) closeModal(); });
  document.addEventListener('keydown', e => { if (e.key === 'Escape') closeModal(); });

  // Submit
  form?.addEventListener('submit', async (e) => {
    e.preventDefault();

    const name     = document.getElementById('lead-name')?.value.trim();
    const email    = document.getElementById('lead-email')?.value.trim();
    const website  = document.getElementById('lead-website')?.value || '';
    const interest = form.querySelector('input[name=interest]:checked')?.value || 'general';
    const source   = sourceEl?.value || 'general';
    const section  = sectionEl?.value || '';

    // Validación básica
    let valid = true;
    if (!name) { document.getElementById('lead-name').classList.add('error'); valid = false; }
    if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      document.getElementById('lead-email').classList.add('error'); valid = false;
    }
    if (!valid) return;

    submitBtn.disabled = true;
    submitBtn.textContent = 'Enviando...';

    try {
      const res = await fetch('/leads', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
        },
        body: JSON.stringify({ name, email, website, interest, source, section }),
      });

      if (res.ok || res.status === 201) {
        form.hidden = true;
        success.hidden = false;
        const successEmail = document.getElementById('lead-success-email');
        if (successEmail) successEmail.textContent = email;
      } else {
        throw new Error(`HTTP ${res.status}`);
      }
    } catch (err) {
      submitBtn.disabled = false;
      submitBtn.textContent = 'Error — intenta de nuevo';
      setTimeout(() => { submitBtn.textContent = 'Enviar mensaje →'; }, 3000);
    }
  });

  // Limpiar error class al tipear
  ['lead-name','lead-email'].forEach(id => {
    document.getElementById(id)?.addEventListener('input', e => {
      e.target.classList.remove('error');
    });
  });
})();
</script>
