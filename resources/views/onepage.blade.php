@extends('layout.master')

@section('body')
@php
  // Proyectos destacados (curados) con enlaces reales verificados.
  $featured = [
    ['k' => 'proj18', 'ph' => '🛡️', 'demo' => 'https://fraud.kapitalya.com.bo', 'repo' => 'https://github.com/Serius69/deteccion-fraude-transacciones'],
    ['k' => 'proj22', 'ph' => '📊', 'demo' => 'https://insights.kapitalya.com.bo', 'repo' => null],
    ['k' => 'proj17', 'ph' => '🤖', 'demo' => null, 'repo' => 'https://github.com/Serius69/kapitalya-ecosystem'],
    ['k' => 'proj3',  'ph' => '📈', 'demo' => 'https://app.kapitalya.com.bo', 'repo' => 'https://github.com/Serius69/FindemproAI'],
    ['k' => 'proj8',  'ph' => '💳', 'demo' => null, 'repo' => 'https://github.com/Serius69/proyectos-fintech'],
    ['k' => 'proj21', 'ph' => '📐', 'demo' => null, 'repo' => 'https://github.com/Serius69/Monte-Carlo-GBM-derivados'],
    ['k' => 'proj7',  'ph' => '📉', 'demo' => null, 'repo' => 'https://github.com/Serius69/dolar-paralelo-bolivia-arima'],
    ['k' => 'proj9',  'ph' => '💹', 'demo' => null, 'repo' => 'https://github.com/Serius69/portafolio-acciones-bolivia'],
    ['k' => 'proj2',  'ph' => '📋', 'demo' => null, 'repo' => null],
  ];
  $skills = [
    ['Python / ML', 92], ['Machine Learning / IA', 90], ['Data Analytics / BI', 88],
    ['Django / FastAPI', 88], ['Sistemas Financieros', 90], ['SQL / Bases de datos', 85],
  ];
  $rates = collect($tromayRates ?? [])->take(4);
@endphp

{{-- ═══ Header ═══ --}}
<header class="site-header" id="site-header">
  <div class="wrap">
    <a href="#main" class="brand">Sergio<b>.</b>Troche</a>
    <nav class="nav" id="nav">
      <a href="#about">{{ __('portfolio.nav_about') }}</a>
      <a href="#skills">{{ __('portfolio.nav_skills') }}</a>
      <a href="#projects">{{ __('portfolio.nav_projects') }}</a>
      <a href="#experience">{{ __('portfolio.nav_experience') }}</a>
      <a href="#contact">{{ __('portfolio.nav_contact') }}</a>
    </nav>
    <div class="nav-actions">
      <a href="{{ __('portfolio.nav_lang_url') }}" class="icon-btn" title="{{ __('portfolio.nav_lang') }}" aria-label="Language" style="width:auto;padding:0 12px;border-radius:8px;font-size:.8rem;font-weight:700;letter-spacing:1px">{{ __('portfolio.nav_lang') }}</a>
      <button class="icon-btn" id="theme-toggle" aria-label="Theme"></button>
      <a href="{{ route('cv.download') }}" class="btn btn-primary" style="padding:9px 16px"><i class="fa-solid fa-download"></i> {{ __('portfolio.nav_download_cv') }}</a>
      <button class="icon-btn nav-toggle" id="nav-toggle" aria-label="Menu"><i class="fa-solid fa-bars"></i></button>
    </div>
  </div>
</header>

<main id="main">

{{-- ═══ Hero ═══ --}}
<section class="section hero wrap" id="home">
  <div class="hero-grid">
    <div class="hero-photo reveal">
      <img src="{{ asset('images/profile.png') }}" alt="Sergio Troche" width="300" height="336">
      <div class="socials">
        <a href="https://github.com/Serius69" class="icon-btn" target="_blank" rel="noopener" aria-label="GitHub"><i class="fa-brands fa-github"></i></a>
        <a href="https://www.linkedin.com/in/sergio-troche" class="icon-btn" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
      </div>
    </div>
    <div class="hero-copy reveal">
      <p class="hero-greet">{{ __('portfolio.hero_greeting') }} 👋</p>
      <h1 class="hero-name">{{ __('portfolio.hero_name') }}</h1>
      <div class="hero-role" id="typed" data-roles="{{ __('portfolio.hero_typed') }}"></div>
      <p class="hero-tagline">{{ __('portfolio.hero_tagline') }}</p>
      <div class="hero-meta">
        <span><i class="fa-solid fa-location-dot"></i> {{ __('portfolio.hero_location') }}</span>
        <span><i class="fa-solid fa-envelope"></i> {{ __('portfolio.hero_email') }}</span>
        <span><i class="fa-brands fa-whatsapp"></i> {{ __('portfolio.hero_phone') }}</span>
      </div>
      <div class="hero-cta">
        <a href="#projects" class="btn btn-primary">{{ __('portfolio.hero_cta_work') }}</a>
        <a href="{{ route('cv.download') }}" class="btn btn-ghost"><i class="fa-solid fa-download"></i> {{ __('portfolio.hero_cta_cv') }}</a>
      </div>
      @if($openToWork ?? true)
      <div class="open-badge"><span class="dot"></span> {{ __('portfolio.open_to_work_msg') }}</div>
      @endif
    </div>
  </div>
  <div class="stats reveal">
    <div class="stat"><b>{{ __('portfolio.stat_solutions') }}</b><span>{{ __('portfolio.stat_solutions_lbl') }}</span></div>
    <div class="stat"><b>{{ __('portfolio.stat_accuracy') }}</b><span>{{ __('portfolio.stat_accuracy_lbl') }}</span></div>
    <div class="stat"><b>{{ __('portfolio.stat_time') }}</b><span>{{ __('portfolio.stat_time_lbl') }}</span></div>
    <div class="stat"><b>{{ __('portfolio.stat_dashboards') }}</b><span>{{ __('portfolio.stat_dashboards_lbl') }}</span></div>
  </div>
</section>

{{-- ═══ About ═══ --}}
<section class="section" id="about">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="eyebrow">{{ __('portfolio.nav_about') }}</span>
      <h2 class="section-title">{{ __('portfolio.about_title') }}</h2>
    </div>
    <div class="about-grid">
      <div class="reveal">
        <p>{{ __('portfolio.about_p1') }}</p>
        <p>{!! __('portfolio.about_p2') !!}</p>
        <p>{{ __('portfolio.about_p3') }}</p>
      </div>
      <div class="card-box about-card reveal">
        <span class="badge">{{ __('portfolio.about_kapitalya_badge') }}</span>
        <h3 style="font-size:1.15rem">Kapitalya</h3>
        <p style="color:var(--muted);font-size:.92rem">{{ __('portfolio.about_kapitalya_desc') }}</p>
        <a href="https://kapitalya.com.bo" target="_blank" rel="noopener" class="proj-link">{{ __('portfolio.about_kapitalya_link') }}</a>
      </div>
    </div>
  </div>
</section>

{{-- ═══ Skills ═══ --}}
<section class="section" id="skills">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="eyebrow">{{ __('portfolio.skills_title') }}</span>
      <h2 class="section-title">{{ __('portfolio.skills_title') }}</h2>
    </div>
    <div class="grid-2">
      <div class="reveal">
        @foreach($skills as $s)
        <div class="bar"><div class="bar-top"><span>{{ $s[0] }}</span><b>{{ $s[1] }}%</b></div>
          <div class="bar-track"><div class="bar-fill" data-w="{{ $s[1] }}%"></div></div></div>
        @endforeach
      </div>
      <div class="skill-cats reveal">
        <div class="skill-cat card-box"><h4>IA / Machine Learning</h4>
          <div class="chip-list"><span class="chip">PyTorch</span><span class="chip">scikit-learn</span><span class="chip">XGBoost</span><span class="chip">CatBoost</span><span class="chip">LSTM</span><span class="chip">Prophet</span><span class="chip">ARIMA</span><span class="chip">Monte Carlo</span></div></div>
        <div class="skill-cat card-box"><h4>LLM / NLP</h4>
          <div class="chip-list"><span class="chip">LangChain</span><span class="chip">Claude</span><span class="chip">RAG</span><span class="chip">embeddings</span><span class="chip">ChromaDB</span></div></div>
        <div class="skill-cat card-box"><h4>Backend / MLOps</h4>
          <div class="chip-list"><span class="chip">FastAPI</span><span class="chip">Django</span><span class="chip">PostgreSQL</span><span class="chip">Airflow</span><span class="chip">dbt</span><span class="chip">Docker</span><span class="chip">Kubernetes</span></div></div>
        <div class="skill-cat card-box"><h4>Datos / BI</h4>
          <div class="chip-list"><span class="chip">pandas</span><span class="chip">NumPy</span><span class="chip">SQL</span><span class="chip">Power BI</span><span class="chip">DAX</span></div></div>
      </div>
    </div>
  </div>
</section>

{{-- ═══ Projects ═══ --}}
<section class="section" id="projects">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="eyebrow">{{ __('portfolio.projects_title') }}</span>
      <h2 class="section-title">{{ __('portfolio.projects_title') }}</h2>
      <p class="section-sub">{{ app()->getLocale() === 'en' ? 'Selected AI, ML and data solutions — shipped to production.' : 'Soluciones de IA, ML y datos seleccionadas — llevadas a producción.' }}</p>
    </div>
    <div class="proj-grid">
      @foreach($featured as $f)
        @php $k = $f['k']; $cover = $projectImages[$k]['cover'] ?? null; @endphp
        <article class="proj-card reveal">
          <div class="proj-cover">
            @if($cover)<img src="{{ $cover }}" alt="{{ __('portfolio.'.$k.'_title') }}" loading="lazy">
            @else<span class="ph">{{ $f['ph'] }}</span>@endif
          </div>
          <div class="proj-body">
            <span class="proj-cat">{{ __('portfolio.'.$k.'_cat') }}</span>
            <h3 class="proj-title">{{ __('portfolio.'.$k.'_title') }}</h3>
            <p class="proj-impact">{{ __('portfolio.'.$k.'_impact') }}</p>
            <div class="chip-list">
              @foreach(array_slice((array) __('portfolio.'.$k.'_stack'), 0, 4) as $tech)
                <span class="chip">{{ $tech }}</span>
              @endforeach
            </div>
            <div class="proj-foot">
              @if($f['demo'])<a href="{{ $f['demo'] }}" target="_blank" rel="noopener" class="proj-link"><i class="fa-solid fa-arrow-up-right-from-square"></i> {{ __('portfolio.proj_visit_live') }}</a>@endif
              @if($f['repo'])<a href="{{ $f['repo'] }}" target="_blank" rel="noopener" class="proj-link"><i class="fa-brands fa-github"></i> {{ __('portfolio.proj_github') }}</a>@endif
            </div>
          </div>
        </article>
      @endforeach
    </div>
  </div>
</section>

{{-- ═══ Experience ═══ --}}
<section class="section" id="experience">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="eyebrow">{{ __('portfolio.experience_title') }}</span>
      <h2 class="section-title">{{ __('portfolio.experience_title') }}</h2>
    </div>
    <div class="grid-2" style="align-items:start">
      <div class="timeline reveal">
        @foreach([1,2,3] as $j)
        <div class="tl-item">
          <div class="tl-role">{{ __('portfolio.job'.$j.'_role') }}</div>
          <div class="tl-meta">{{ __('portfolio.job'.$j.'_company') }} · {{ __('portfolio.job'.$j.'_date') }}</div>
          <ul>
            @foreach(['_b1','_b2','_b3','_b4'] as $b)
              @if(__('portfolio.job'.$j.$b) !== 'portfolio.job'.$j.$b)<li>{{ __('portfolio.job'.$j.$b) }}</li>@endif
            @endforeach
          </ul>
        </div>
        @endforeach
      </div>
      <div class="reveal">
        <h4 class="eyebrow" style="display:block;margin-bottom:14px">{{ __('portfolio.education_title') }}</h4>
        <div class="timeline">
          @foreach([1,2,3] as $e)
          <div class="tl-item">
            <div class="tl-role" style="font-size:.98rem">{{ __('portfolio.edu'.$e.'_degree') }}</div>
            <div class="tl-meta">{{ __('portfolio.edu'.$e.'_inst') }} · {{ __('portfolio.edu'.$e.'_date') }}</div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ═══ Certifications ═══ --}}
<section class="section" id="certs">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="eyebrow">{{ __('portfolio.certs_title') }}</span>
      <h2 class="section-title">{{ __('portfolio.certs_title') }}</h2>
    </div>
    <div class="cert-grid">
      @foreach([1,2,3,4,5,6,7,8] as $c)
        @if(__('portfolio.cert'.$c.'_name') !== 'portfolio.cert'.$c.'_name')
        <div class="cert reveal">
          <i class="fa-solid fa-certificate"></i>
          <div><b>{{ __('portfolio.cert'.$c.'_name') }}</b><span>{{ __('portfolio.cert'.$c.'_issuer') }} · {{ __('portfolio.cert'.$c.'_date') }}</span></div>
        </div>
        @endif
      @endforeach
    </div>
  </div>
</section>

{{-- ═══ Ecosystem live rates (opcional) ═══ --}}
@if($rates->count())
<section class="section" id="ecosystem">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="eyebrow">{{ __('portfolio.ecosystem_title') }}</span>
      <h2 class="section-title">{{ __('portfolio.ecosystem_rates_title') }}</h2>
      <p class="section-sub">{{ __('portfolio.ecosystem_rates_src') }}</p>
    </div>
    <div class="rates reveal">
      @foreach($rates as $r)
      <div class="rate"><b>{{ is_array($r) ? ($r['venta'] ?? $r['sell'] ?? '—') : $r }}</b><span>{{ is_array($r) ? ($r['moneda'] ?? $r['currency'] ?? '') : '' }}</span></div>
      @endforeach
    </div>
  </div>
</section>
@endif

{{-- ═══ Contact ═══ --}}
<section class="section" id="contact">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="eyebrow">{{ __('portfolio.nav_contact') }}</span>
      <h2 class="section-title">{{ __('portfolio.contact_title') }}</h2>
      <p class="section-sub">{{ __('portfolio.contact_subtitle') }}</p>
    </div>
    <div class="contact-methods reveal" style="max-width:520px">
      <a href="mailto:{{ __('portfolio.hero_email') }}"><i class="fa-solid fa-envelope"></i> <span>{{ __('portfolio.hero_email') }}</span></a>
      <a href="https://wa.me/59178939071" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp"></i> <span>{{ __('portfolio.hero_phone') }}</span></a>
      <a href="https://github.com/Serius69" target="_blank" rel="noopener"><i class="fa-brands fa-github"></i> <span>github.com/Serius69</span></a>
      <a href="#"><i class="fa-solid fa-location-dot"></i> <span>{{ __('portfolio.contact_location_v') }}</span></a>
    </div>
  </div>
</section>

</main>

{{-- ═══ Footer ═══ --}}
<footer class="site-footer">
  <div class="wrap">
    <span>{{ __('portfolio.footer_copy') }}</span>
    <span>Sergio · Data Scientist · AI &amp; Digital Transformation</span>
  </div>
</footer>

<a href="https://wa.me/59178939071" class="wa-fab" target="_blank" rel="noopener" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
@endsection

@push('scripts')
<script>
(function () {
  // Header shadow on scroll
  var header = document.getElementById('site-header');
  var onScroll = function () { header.classList.toggle('scrolled', window.scrollY > 8); };
  window.addEventListener('scroll', onScroll, { passive: true }); onScroll();

  // Mobile nav
  var t = document.getElementById('nav-toggle'), nav = document.getElementById('nav');
  if (t) t.addEventListener('click', function () { nav.classList.toggle('open'); });
  nav.querySelectorAll('a').forEach(function (a) { a.addEventListener('click', function () { nav.classList.remove('open'); }); });

  // Reveal on scroll
  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (e) { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } });
  }, { threshold: 0.12, rootMargin: '0px 0px -8% 0px' });
  document.querySelectorAll('.reveal').forEach(function (el) { io.observe(el); });

  // Animate skill bars when visible
  var bio = new IntersectionObserver(function (entries) {
    entries.forEach(function (e) { if (e.isIntersecting) { e.target.style.width = e.target.dataset.w; bio.unobserve(e.target); } });
  }, { threshold: 0.5 });
  document.querySelectorAll('.bar-fill').forEach(function (el) { bio.observe(el); });

  // Active nav link
  var sections = [...document.querySelectorAll('main section[id]')];
  var links = {}; document.querySelectorAll('.nav a').forEach(function (a) { links[a.getAttribute('href').slice(1)] = a; });
  var nio = new IntersectionObserver(function (entries) {
    entries.forEach(function (e) { if (e.isIntersecting && links[e.target.id]) {
      Object.values(links).forEach(function (l) { l.classList.remove('active'); }); links[e.target.id].classList.add('active');
    }});
  }, { threshold: 0.4 });
  sections.forEach(function (s) { if (links[s.id]) nio.observe(s); });

  // Typed roles
  var el = document.getElementById('typed');
  if (el) {
    var roles = (el.dataset.roles || '').split(',').map(function (s) { return s.trim(); }).filter(Boolean);
    var ri = 0, ci = 0, del = false;
    (function tick() {
      if (!roles.length) return;
      var w = roles[ri];
      el.textContent = w.slice(0, ci);
      if (!del && ci < w.length) { ci++; setTimeout(tick, 70); }
      else if (!del) { del = true; setTimeout(tick, 1400); }
      else if (del && ci > 0) { ci--; setTimeout(tick, 35); }
      else { del = false; ri = (ri + 1) % roles.length; setTimeout(tick, 250); }
    })();
  }
}());
</script>
@endpush
