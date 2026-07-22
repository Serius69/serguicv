/**
 * portfolio-enhanced.js
 * Animated counters · Project modals · Skills radar · WhatsApp FAB
 * Theme toggle · Gallery lightbox
 */
(function () {
  'use strict';

  /* ── Easing ──────────────────────────────────────────────────────────── */
  function easeOutQuart(t) { return 1 - Math.pow(1 - t, 4); }

  /* ── Animated Counters ───────────────────────────────────────────────── */
  function runCounter(el) {
    var target   = +el.dataset.target;
    var suffix   = el.dataset.suffix || '';
    var duration = 1800;
    var start    = performance.now();

    function tick(now) {
      var progress = Math.min((now - start) / duration, 1);
      el.textContent = Math.round(easeOutQuart(progress) * target) + suffix;
      if (progress < 1) requestAnimationFrame(tick);
    }
    requestAnimationFrame(tick);
  }

  if ('IntersectionObserver' in window) {
    var counterObs = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting && !entry.target.dataset.counted) {
          entry.target.dataset.counted = '1';
          runCounter(entry.target);
        }
      });
    }, { threshold: 0.6 });

    document.querySelectorAll('[data-target]').forEach(function (el) {
      counterObs.observe(el);
    });
  }

  /* ── Project Modals ──────────────────────────────────────────────────── */
  var overlay = document.getElementById('modal-overlay');

  function openModal(id) {
    var modal = document.getElementById('modal-' + id);
    if (!modal || !overlay) return;
    overlay.classList.add('is-open');
    modal.classList.add('is-open');
    document.body.classList.add('modal-active');
    modal.setAttribute('aria-hidden', 'false');
    // Move focus to close button for keyboard users
    var closeBtn = modal.querySelector('.modal-close-btn');
    if (closeBtn) closeBtn.focus();

    // Inject view counter element on first open
    var header = modal.querySelector('.modal-header');
    if (header && !modal.querySelector('.modal-view-count')) {
      var headerCloseBtn = header.querySelector('.modal-close-btn');
      var vcSpan = document.createElement('span');
      vcSpan.className = 'modal-view-count';
      vcSpan.innerHTML = '<i class="fa-solid fa-eye" aria-hidden="true"></i> <span class="mvc-num">—</span>';
      if (headerCloseBtn) header.insertBefore(vcSpan, headerCloseBtn);
    }

    // Record view (no CSRF needed — endpoint is exempt)
    var vcNum = modal.querySelector('.mvc-num');
    fetch('/project/' + id + '/view', { method: 'POST' })
      .then(function (r) { return r.ok ? r.json() : null; })
      .then(function (data) { if (vcNum && data) vcNum.textContent = data.count; })
      .catch(function () {});
  }

  function closeAllModals() {
    if (!overlay) return;
    overlay.classList.remove('is-open');
    document.querySelectorAll('.case-modal').forEach(function (m) {
      m.classList.remove('is-open');
      m.setAttribute('aria-hidden', 'true');
    });
    document.body.classList.remove('modal-active');
  }

  // Set initial ARIA state and enrich trigger buttons
  document.querySelectorAll('.case-modal').forEach(function (m) {
    m.setAttribute('aria-hidden', 'true');
    var h3 = m.querySelector('h3');
    if (h3) {
      var labelId = m.id + '-label';
      h3.id = labelId;
      m.setAttribute('aria-labelledby', labelId);
    }
  });

  document.querySelectorAll('[data-open-modal]').forEach(function (btn) {
    var modalId = 'modal-' + btn.getAttribute('data-open-modal');
    btn.setAttribute('role', 'button');
    btn.setAttribute('aria-haspopup', 'dialog');
    btn.setAttribute('aria-controls', modalId);
    btn.addEventListener('click', function (e) {
      e.preventDefault();
      openModal(btn.getAttribute('data-open-modal'));
    });
  });

  if (overlay) {
    overlay.addEventListener('click', closeAllModals);
  }

  document.querySelectorAll('.modal-close-btn').forEach(function (btn) {
    btn.addEventListener('click', closeAllModals);
  });

  // El cierre con Escape vive en un único listener consolidado (más abajo)

  /* ── Skills Radar Chart (Chart.js) ───────────────────────────────────── */
  var radarCanvas = document.getElementById('skillsRadar');
  if (radarCanvas && window.Chart) {
    var radarLabels = radarCanvas.dataset.labels
      ? radarCanvas.dataset.labels.split('|')
      : ['Python / ML', 'Power BI / DAX', 'Django / Laravel', 'SQL / Databases', 'Financial Systems', 'Data Analytics'];
    new window.Chart(radarCanvas, {
      type: 'radar',
      data: {
        labels: radarLabels,
        datasets: [{
          label: 'Proficiency',
          data: [85, 90, 85, 85, 88, 87],
          backgroundColor: 'rgba(255, 180, 0, 0.12)',
          borderColor: '#ffb400',
          borderWidth: 2,
          pointBackgroundColor: '#ffb400',
          pointBorderColor: '#111111',
          pointBorderWidth: 2,
          pointRadius: 4,
          pointHoverRadius: 7
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: true,
        scales: {
          r: {
            min: 0,
            max: 100,
            ticks: { display: false, stepSize: 25 },
            grid: { color: 'rgba(255,255,255,0.07)' },
            angleLines: { color: 'rgba(255,255,255,0.07)' },
            pointLabels: {
              color: '#888888',
              font: { family: "'Poppins', sans-serif", size: 11, weight: '500' }
            }
          }
        },
        plugins: {
          legend: { display: false },
          tooltip: {
            callbacks: {
              label: function (ctx) { return ' ' + ctx.raw + '%'; }
            }
          }
        }
      }
    });
  }

  /* ── WhatsApp FAB entrance pulse ──────────────────────────────────────── */
  var fab = document.getElementById('wa-fab');
  if (fab) {
    setTimeout(function () { fab.classList.add('pulse'); }, 4000);
  }

  /* ── "Now" status cycler ─────────────────────────────────────────────── */
  var nowStatus = document.getElementById('now-status-text');
  if (nowStatus) {
    var statuses   = nowStatus.dataset.statuses ? nowStatus.dataset.statuses.split('|') : [];
    var statusIdx  = 0;
    if (statuses.length > 1) {
      setInterval(function () {
        statusIdx = (statusIdx + 1) % statuses.length;
        nowStatus.style.opacity = '0';
        setTimeout(function () {
          nowStatus.textContent = statuses[statusIdx];
          nowStatus.style.opacity = '1';
        }, 300);
      }, 3200);
    }
  }

  /* ── Gallery Lightbox ────────────────────────────────────────────────── */
  var lb = (function () {
    var lbEl    = document.getElementById('gallery-lb');
    var imgEl   = document.getElementById('gallery-lb-img');
    var counter = document.getElementById('gallery-lb-counter');
    var btnClose = document.getElementById('gallery-lb-close');
    var btnPrev  = document.getElementById('gallery-lb-prev');
    var btnNext  = document.getElementById('gallery-lb-next');
    var images   = [];
    var idx      = 0;

    if (!lbEl) return { open: function(){}, openCerts: function(){} };

    function render() {
      var src = images[idx];
      imgEl.classList.add('loading');
      var tmp = new Image();
      tmp.onload = function () {
        imgEl.src = src;
        imgEl.classList.remove('loading');
      };
      tmp.onerror = function () {
        imgEl.src = src;
        imgEl.classList.remove('loading');
      };
      tmp.src = src;
      counter.textContent = (idx + 1) + ' / ' + images.length;
      btnPrev.style.display = images.length > 1 ? '' : 'none';
      btnNext.style.display = images.length > 1 ? '' : 'none';
    }

    function open(imgs, startIdx) {
      if (!imgs || !imgs.length) return;
      images = imgs;
      idx    = startIdx || 0;
      render();
      lbEl.classList.add('is-open');
      lbEl.setAttribute('aria-hidden', 'false');
      document.body.style.overflow = 'hidden';
    }

    function close() {
      lbEl.classList.remove('is-open');
      lbEl.setAttribute('aria-hidden', 'true');
      document.body.style.overflow = '';
      setTimeout(function () { imgEl.src = ''; }, 300);
    }

    function prev() { idx = (idx - 1 + images.length) % images.length; render(); }
    function next() { idx = (idx + 1) % images.length; render(); }

    // Controls
    var bgEl = lbEl.querySelector('.gallery-lb-bg');
    if (bgEl)    bgEl.addEventListener('click', close);
    if (btnClose) btnClose.addEventListener('click', close);
    if (btnPrev)  btnPrev.addEventListener('click', function(e){ e.stopPropagation(); prev(); });
    if (btnNext)  btnNext.addEventListener('click', function(e){ e.stopPropagation(); next(); });

    // Keyboard
    document.addEventListener('keydown', function (e) {
      if (!lbEl.classList.contains('is-open')) return;
      if (e.key === 'Escape')      close();
      if (e.key === 'ArrowLeft')   prev();
      if (e.key === 'ArrowRight')  next();
    });

    // Touch swipe
    var touchStartX = null;
    lbEl.addEventListener('touchstart', function(e){ touchStartX = e.touches[0].clientX; }, { passive: true });
    lbEl.addEventListener('touchend', function(e){
      if (touchStartX === null) return;
      var dx = e.changedTouches[0].clientX - touchStartX;
      if (Math.abs(dx) > 50) { dx < 0 ? next() : prev(); }
      touchStartX = null;
    });

    // Cert images array (populated from HTML data attribute)
    var certGrid = document.getElementById('cert-img-grid');
    var certUrls = certGrid ? JSON.parse(certGrid.dataset.urls || '[]') : [];

    function openCerts(startIdx) {
      open(certUrls, startIdx);
    }

    return { open: open, openCerts: openCerts, close: close };
  })();

  // Expose globally so inline onclick handlers can call it
  window.portfolioLightbox = lb;

  /* ── Fade-in on scroll ───────────────────────────────────────────────── */
  if ('IntersectionObserver' in window) {
    var fadeObs = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          fadeObs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

    document.querySelectorAll('.fade-in-scroll').forEach(function (el) {
      fadeObs.observe(el);
    });
  }

  /* ── Theme Toggle ────────────────────────────────────────────────────── */
  var themeBtn  = document.getElementById('theme-toggle-btn');
  var pfBody    = document.getElementById('pf-body');

  function applyTheme(theme) {
    document.documentElement.setAttribute('data-theme', theme);
    if (pfBody) {
      if (theme === 'light') {
        pfBody.classList.remove('dark-version');
      } else {
        pfBody.classList.add('dark-version');
      }
    }
    if (themeBtn) {
      themeBtn.setAttribute('aria-label', theme === 'dark' ? 'Switch to light mode' : 'Switch to dark mode');
      themeBtn.innerHTML = theme === 'dark'
        ? '<i class="fa-solid fa-sun"></i>'
        : '<i class="fa-solid fa-moon"></i>';
    }
    localStorage.setItem('pf-theme', theme);
  }

  // Apply on load (data-theme already set in <head>, just sync body class + icon)
  var currentTheme = document.documentElement.getAttribute('data-theme') || 'dark';
  applyTheme(currentTheme);

  if (themeBtn) {
    themeBtn.addEventListener('click', function () {
      var next = document.documentElement.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
      applyTheme(next);
    });
  }

  /* ── Close modals on ESC (consolidated) ─────────────────────────────── */
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') closeAllModals();
  });

  /* ── Nav: shrink on scroll ───────────────────────────────────────────── */
  var navHeader = document.getElementById('fixed');
  if (navHeader) {
    function handleNavScroll() {
      navHeader.classList.toggle('is-scrolled', window.scrollY > 60);
    }
    window.addEventListener('scroll', handleNavScroll, { passive: true });
    handleNavScroll();
  }

  /* ── Nav: active section highlight via IntersectionObserver ─────────── */
  (function () {
    var navLinks = document.querySelectorAll('nav ul li a[href^="#"]');
    if (!navLinks.length || !('IntersectionObserver' in window)) return;

    var activeId    = null;
    var sectionMap  = {};

    navLinks.forEach(function (a) {
      var id = a.getAttribute('href').slice(1);
      if (id) {
        var el = document.getElementById(id);
        if (el) sectionMap[id] = a;
      }
    });

    var sectionObs = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          activeId = entry.target.id;
        }
      });

      navLinks.forEach(function (a) {
        var href = a.getAttribute('href').slice(1);
        a.classList.toggle('nav-active', href === activeId);
      });
    }, {
      threshold: 0.3,
      rootMargin: '-64px 0px -40% 0px'
    });

    Object.keys(sectionMap).forEach(function (id) {
      var el = document.getElementById(id);
      if (el) sectionObs.observe(el);
    });
  })();

  /* ── Project filter: CSS-class based (extends Isotope) ──────────────── */
  (function () {
    var filterLinks = document.querySelectorAll('.portfolio_filter a[data-filter]');
    if (!filterLinks.length) return;

    filterLinks.forEach(function (link) {
      link.addEventListener('click', function (e) {
        e.preventDefault();
        filterLinks.forEach(function (l) { l.classList.remove('select-cat'); });
        link.classList.add('select-cat');
      });
    });
  })();

  /* ── Certifications category filter ─────────────────────────────────── */
  (function () {
    var filterBtns = document.querySelectorAll('.cert-filter-btn');
    var certCards  = document.querySelectorAll('.cert-img-card');
    if (!filterBtns.length || !certCards.length) return;

    filterBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        var cat = btn.getAttribute('data-cat');
        filterBtns.forEach(function (b) { b.classList.remove('active'); });
        btn.classList.add('active');

        certCards.forEach(function (card) {
          if (cat === 'all' || card.getAttribute('data-category') === cat) {
            card.style.display = '';
            card.style.opacity = '1';
          } else {
            card.style.display = 'none';
          }
        });
      });
    });
  })();

})();
