            {{-- ══════════════════════════════════════════════════════════
                 PROJECTS / PORTFOLIO
            ══════════════════════════════════════════════════════════ --}}
            <section class="portfolio" id="portfolio">
              <div class="spacer-75"></div>
              <div class="section-title page-caption">
                <h5>{{ __('portfolio.projects_title') }}</h5>
                <div class="zigzag">
                  <hr class="left"><hr class="right">
                  @include('partials.zigzag')
                </div>
              </div>
              <div class="spacer-45"></div>

              {{-- ════════════════════════════════════════════════════
                   FEATURED WORK — TOP 3 PROJECTS
              ════════════════════════════════════════════════════ --}}
              <div class="spacer-15"></div>
              <p class="portfolio-intro">
                {{ app()->getLocale() === 'en'
                   ? 'Three projects that best represent the intersection of data science, financial systems, and engineering depth.'
                   : 'Tres proyectos que mejor representan la intersección de ciencia de datos, sistemas financieros y profundidad técnica.' }}
              </p>
              <div class="spacer-45"></div>

              {{-- Featured 1: ARIMA Dollar Bolivia ──────────────── --}}
              <div class="feat-proj classic-animation" data-delay=".2">
                <div class="feat-proj-content">
                  <div class="feat-proj-num">01</div>
                  <span class="feat-proj-cat">Time Series · Fintech · Python</span>
                  <h2 class="feat-proj-title">{{ __('portfolio.proj7_title') }}</h2>
                  <p class="feat-proj-problem">
                    {{ app()->getLocale() === 'en'
                       ? "Bolivia's informal FX market operated with zero predictive infrastructure. Businesses made USD conversion decisions on intuition — creating avoidable exposure to rate swings that cost real money."
                       : "El mercado paralelo de dólares en Bolivia operaba sin infraestructura predictiva. Los negocios tomaban decisiones de cambio por intuición, generando pérdidas evitables." }}
                  </p>
                  <div class="feat-proj-metrics">
                    <div class="feat-metric">
                      <span class="feat-metric-val">64.7k</span>
                      <span class="feat-metric-lbl">{{ app()->getLocale() === 'en' ? 'Historical quotes' : 'Cotizaciones' }}</span>
                    </div>
                    <div class="feat-metric">
                      <span class="feat-metric-val">ADF</span>
                      <span class="feat-metric-lbl">{{ app()->getLocale() === 'en' ? 'Stationarity test' : 'Estacionariedad' }}</span>
                    </div>
                    <div class="feat-metric">
                      <span class="feat-metric-val">AIC</span>
                      <span class="feat-metric-lbl">{{ app()->getLocale() === 'en' ? 'Order selection' : 'Selección orden' }}</span>
                    </div>
                    <div class="feat-metric">
                      <span class="feat-metric-val">±CI</span>
                      <span class="feat-metric-lbl">{{ app()->getLocale() === 'en' ? 'Confidence bands' : 'Bandas CI' }}</span>
                    </div>
                  </div>
                  <div class="feat-proj-stack">
                    @foreach(['Python', 'ARIMA', 'statsmodels', 'Django REST', 'Jupyter', 'pandas'] as $t)
                      <span class="tech-badge">{{ $t }}</span>
                    @endforeach
                  </div>
                  <div class="feat-proj-actions">
                    <a href="#" class="case-study-btn" data-open-modal="proj7">
                      {{ __('portfolio.proj_case_study') }} <span class="cs-arrow">→</span>
                    </a>
                    <a href="{{ __('portfolio.proj7_github') }}" target="_blank" rel="noopener" class="proj-github-badge">
                      <i class="fa-brands fa-github"></i> GitHub
                    </a>
                  </div>
                </div>
                <div class="feat-proj-visual grad-ts">
                  <div class="feat-proj-gradient-cover">
                    <span class="feat-proj-emoji">📈</span>
                    <span class="feat-proj-cover-label">Time Series · ARIMA</span>
                  </div>
                </div>
              </div>

              {{-- Featured 2: Monte Carlo / Findempro AI ─────────── --}}
              @php $fpMC = $projectImages['proj3']; @endphp
              <div class="feat-proj feat-proj--alt classic-animation" data-delay=".3">
                <div class="feat-proj-content">
                  <div class="feat-proj-num">02</div>
                  <span class="feat-proj-cat">AI · Simulation · SME Finance</span>
                  <h2 class="feat-proj-title">{{ __('portfolio.proj3_title') }} — Monte Carlo Engine</h2>
                  <p class="feat-proj-problem">
                    {{ app()->getLocale() === 'en'
                       ? 'Small businesses make inventory and financial decisions under extreme uncertainty, with no access to probabilistic modeling. Poor forecasting causes overstock, stockouts, and cash flow crises.'
                       : 'Las PYMEs toman decisiones bajo incertidumbre extrema, sin herramientas de modelado probabilístico. La mala previsión genera sobrestock, quiebres y crisis de flujo de caja.' }}
                  </p>
                  <div class="feat-proj-metrics">
                    <div class="feat-metric">
                      <span class="feat-metric-val">10k</span>
                      <span class="feat-metric-lbl">{{ app()->getLocale() === 'en' ? 'Scenarios/run' : 'Escenarios' }}</span>
                    </div>
                    <div class="feat-metric">
                      <span class="feat-metric-val">6</span>
                      <span class="feat-metric-lbl">{{ app()->getLocale() === 'en' ? 'PDF distributions' : 'Distribuciones PDF' }}</span>
                    </div>
                    <div class="feat-metric">
                      <span class="feat-metric-val">19</span>
                      <span class="feat-metric-lbl">{{ app()->getLocale() === 'en' ? 'Industries' : 'Industrias' }}</span>
                    </div>
                    <div class="feat-metric">
                      <span class="feat-metric-val">97/100</span>
                      <span class="feat-metric-lbl">{{ app()->getLocale() === 'en' ? 'Thesis grade' : 'Nota de tesis' }}</span>
                    </div>
                  </div>
                  <div class="feat-proj-stack">
                    @foreach(['Python', 'Django', 'NumPy', 'SciPy', 'CuPy (GPU)', 'Monte Carlo · GBM', 'PostgreSQL'] as $t)
                      <span class="tech-badge">{{ $t }}</span>
                    @endforeach
                  </div>
                  <div class="feat-proj-actions">
                    <a href="#" class="case-study-btn" data-open-modal="proj3">
                      {{ __('portfolio.proj_case_study') }} <span class="cs-arrow">→</span>
                    </a>
                    @if($fpMC['count'] > 0)
                      <button class="view-gallery-btn" onclick="portfolioLightbox.open({{ Js::from($fpMC['images']) }}, 0)">
                        <i class="fa-solid fa-images"></i> {{ $fpMC['count'] }} {{ __('portfolio.gallery_photos') }}
                      </button>
                    @endif
                  </div>
                </div>
                <div class="feat-proj-visual">
                  @if($fpMC['cover'])
                    <img class="feat-proj-img-cover" src="{{ $fpMC['cover'] }}" alt="Findempro AI Simulation" loading="lazy">
                    @if($fpMC['count'] > 1)
                      <div class="feat-proj-img-strip">
                        @foreach(array_slice($fpMC['images'], 0, 5) as $ti => $fthumb)
                          <div class="feat-proj-thumb" onclick="portfolioLightbox.open({{ Js::from($fpMC['images']) }}, {{ $ti }})">
                            <img src="{{ $fthumb }}" loading="lazy" alt="">
                          </div>
                        @endforeach
                      </div>
                    @endif
                  @else
                    <div class="feat-proj-gradient-cover grad-ml">
                      <span class="feat-proj-emoji">🎲</span>
                      <span class="feat-proj-cover-label">Monte Carlo · Simulation</span>
                    </div>
                  @endif
                </div>
              </div>

              {{-- Featured 3: Investment Portfolio Optimization ────── --}}
              <div class="feat-proj classic-animation" data-delay=".4">
                <div class="feat-proj-content">
                  <div class="feat-proj-num">03</div>
                  <span class="feat-proj-cat">Quantitative Finance · Python · MPT</span>
                  <h2 class="feat-proj-title">{{ __('portfolio.proj9_title') }}</h2>
                  <p class="feat-proj-problem">
                    {{ app()->getLocale() === 'en'
                       ? 'Retail investors in emerging markets lack quantitative tools for portfolio construction. Advisors rely on qualitative judgment rather than Modern Portfolio Theory — leaving systematic alpha uncaptured.'
                       : 'Los inversores minoristas en mercados emergentes carecen de herramientas cuantitativas. Los asesores usan juicio cualitativo en lugar de Teoría Moderna de Portafolios.' }}
                  </p>
                  <div class="feat-proj-metrics">
                    <div class="feat-metric">
                      <span class="feat-metric-val">Sharpe</span>
                      <span class="feat-metric-lbl">{{ app()->getLocale() === 'en' ? 'Ratio optimization' : 'Optimización' }}</span>
                    </div>
                    <div class="feat-metric">
                      <span class="feat-metric-val">VaR</span>
                      <span class="feat-metric-lbl">95% &amp; 99% CI</span>
                    </div>
                    <div class="feat-metric">
                      <span class="feat-metric-val">MPT</span>
                      <span class="feat-metric-lbl">Efficient Frontier</span>
                    </div>
                    <div class="feat-metric">
                      <span class="feat-metric-val">Monte</span>
                      <span class="feat-metric-lbl">Carlo simulation</span>
                    </div>
                  </div>
                  <div class="feat-proj-stack">
                    @foreach(['Python', 'pandas', 'NumPy', 'scipy', 'matplotlib', 'yfinance', 'Jupyter'] as $t)
                      <span class="tech-badge">{{ $t }}</span>
                    @endforeach
                  </div>
                  <div class="feat-proj-actions">
                    <a href="#" class="case-study-btn" data-open-modal="proj9">
                      {{ __('portfolio.proj_case_study') }} <span class="cs-arrow">→</span>
                    </a>
                    <a href="{{ __('portfolio.proj9_github') }}" target="_blank" rel="noopener" class="proj-github-badge">
                      <i class="fa-brands fa-github"></i> GitHub
                    </a>
                  </div>
                </div>
                @php $fp9 = $projectImages['proj9']; @endphp
                <div class="feat-proj-visual{{ $fp9['cover'] ? '' : ' grad-fin' }}">
                  @if($fp9['cover'])
                    <img class="feat-proj-img-cover" src="{{ $fp9['cover'] }}" alt="{{ __('portfolio.proj9_title') }}" loading="lazy">
                  @else
                    <div class="feat-proj-gradient-cover">
                      <span class="feat-proj-emoji">💹</span>
                      <span class="feat-proj-cover-label">Efficient Frontier · VaR</span>
                    </div>
                  @endif
                </div>
              </div>

              {{-- ── All Projects divider ─────────────────────────── --}}
              <div class="all-projects-divider">
                <div class="all-projects-divider-line"></div>
                <span class="all-projects-divider-label">
                  {{ app()->getLocale() === 'en' ? 'All Projects' : 'Todos los Proyectos' }}
                </span>
                <div class="all-projects-divider-line"></div>
              </div>

              <div class="section-head">
                <div class="portfolio_filter">
                  <ul>
                    <li><a class="select-cat" data-filter="*"      href="#">{{ __('portfolio.filter_all') }}</a></li>
                    <li><a data-filter=".ai"                        href="#">{{ __('portfolio.filter_ai') }}</a></li>
                    <li><a data-filter=".fintech"                   href="#">{{ __('portfolio.filter_fintech') }}</a></li>
                    <li><a data-filter=".bi"                        href="#">{{ __('portfolio.filter_bi') }}</a></li>
                    <li><a data-filter=".web"                       href="#">{{ __('portfolio.filter_web') }}</a></li>
                    <li><a data-filter=".java"                      href="#">{{ __('portfolio.filter_java') }}</a></li>
                    <li><a data-filter=".iot"                       href="#">{{ __('portfolio.filter_iot') }}</a></li>
                  </ul>
                </div>
                <div class="spacer-60"></div>
              </div>

              <div class="row masonry">

                {{-- Project 1: Kapitalya Forex AI --}}
                @php $p1 = $projectImages['proj1']; @endphp
                <div class="col-xl-4 col-lg-6 col-md-6 grid-item ai fintech">
                  <div class="work-holder scale-animation" data-duration="2" data-delay=".3">
                    <figure class="portfolio-item">
                      <img src="{{ $p1['cover'] ?? asset('images/profile.png') }}"
                           alt="Kapitalya Forex AI" loading="lazy">
                      <figcaption>
                        <div class="outer"><div class="inner">
                          <span>{{ __('portfolio.proj1_cat') }}</span>
                          <h3 class="title">{{ __('portfolio.proj1_title') }}</h3>
                        </div></div>
                      </figcaption>
                    </figure>
                    {{-- Thumbnail strip --}}
                    @if($p1['count'] > 0)
                    <div class="proj-thumb-strip">
                      @foreach(array_slice($p1['images'], 0, 3) as $ti => $thumb)
                        <div class="proj-thumb" onclick="portfolioLightbox.open({{ Js::from($p1['images']) }}, {{ $ti }})">
                          <img src="{{ $thumb }}" loading="lazy" alt="">
                        </div>
                      @endforeach
                      @if($p1['count'] > 3)
                        <div class="proj-thumb proj-thumb-more" onclick="portfolioLightbox.open({{ Js::from($p1['images']) }}, 3)">
                          +{{ $p1['count'] - 3 }}
                        </div>
                      @endif
                    </div>
                    @endif
                    <div class="project-meta">
                      <p class="project-impact">{{ __('portfolio.proj1_impact') }}</p>
                      <div class="tech-badges">
                        @foreach(__('portfolio.proj1_stack') as $tech)
                          <span class="tech-badge">{{ $tech }}</span>
                        @endforeach
                      </div>
                      <div class="proj-actions">
                        <a href="#" class="case-study-btn" data-open-modal="proj1">
                          {{ __('portfolio.proj_case_study') }} <span class="cs-arrow">→</span>
                        </a>
                        <a href="{{ __('portfolio.proj1_url') }}" target="_blank" rel="noopener noreferrer" class="proj-live-btn">
                          <i class="fa-solid fa-arrow-up-right-from-square"></i>
                          {{ __('portfolio.proj_visit_live') }}
                        </a>
                        @if($p1['count'] > 0)
                        <button class="view-gallery-btn" onclick="portfolioLightbox.open({{ Js::from($p1['images']) }}, 0)">
                          <i class="fa-solid fa-images"></i> {{ $p1['count'] }} {{ __('portfolio.gallery_photos') ?? 'photos' }}
                        </button>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

                {{-- Project 2: Kapitalya BI --}}
                @php $p2 = $projectImages['proj2']; @endphp
                <div class="col-xl-4 col-lg-6 col-md-6 grid-item bi">
                  <div class="work-holder scale-animation" data-duration="2" data-delay=".5">
                    <figure class="portfolio-item">
                      <img src="{{ $p2['cover'] ?? asset('images/profile.png') }}"
                           alt="Kapitalya BI System" loading="lazy">
                      <figcaption>
                        <div class="outer"><div class="inner">
                          <span>{{ __('portfolio.proj2_cat') }}</span>
                          <h3 class="title">{{ __('portfolio.proj2_title') }}</h3>
                        </div></div>
                      </figcaption>
                    </figure>
                    @if($p2['count'] > 0)
                    <div class="proj-thumb-strip">
                      @foreach(array_slice($p2['images'], 0, 3) as $ti => $thumb)
                        <div class="proj-thumb" onclick="portfolioLightbox.open({{ Js::from($p2['images']) }}, {{ $ti }})">
                          <img src="{{ $thumb }}" loading="lazy" alt="">
                        </div>
                      @endforeach
                      @if($p2['count'] > 3)
                        <div class="proj-thumb proj-thumb-more" onclick="portfolioLightbox.open({{ Js::from($p2['images']) }}, 3)">
                          +{{ $p2['count'] - 3 }}
                        </div>
                      @endif
                    </div>
                    @endif
                    <div class="project-meta">
                      <p class="project-impact">{{ __('portfolio.proj2_impact') }}</p>
                      <div class="tech-badges">
                        @foreach(__('portfolio.proj2_stack') as $tech)
                          <span class="tech-badge">{{ $tech }}</span>
                        @endforeach
                      </div>
                      <div class="proj-actions">
                        <a href="#" class="case-study-btn" data-open-modal="proj2">
                          {{ __('portfolio.proj_case_study') }} <span class="cs-arrow">→</span>
                        </a>
                        <a href="{{ __('portfolio.proj2_url') }}" target="_blank" rel="noopener noreferrer" class="proj-live-btn">
                          <i class="fa-solid fa-arrow-up-right-from-square"></i>
                          {{ __('portfolio.proj_visit_live') }}
                        </a>
                        @if($p2['count'] > 0)
                        <button class="view-gallery-btn" onclick="portfolioLightbox.open({{ Js::from($p2['images']) }}, 0)">
                          <i class="fa-solid fa-images"></i> {{ $p2['count'] }} {{ __('portfolio.gallery_photos') ?? 'photos' }}
                        </button>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

                {{-- Project 3: Findempro AI --}}
                @php $p3 = $projectImages['proj3']; @endphp
                <div class="col-xl-4 col-lg-6 col-md-6 grid-item ai">
                  <div class="work-holder scale-animation" data-duration="2" data-delay=".7">
                    <figure class="portfolio-item">
                      <img src="{{ $p3['cover'] ?? asset('images/profile.png') }}"
                           alt="Findempro AI" loading="lazy">
                      <figcaption>
                        <div class="outer"><div class="inner">
                          <span>{{ __('portfolio.proj3_cat') }}</span>
                          <h3 class="title">{{ __('portfolio.proj3_title') }}</h3>
                        </div></div>
                      </figcaption>
                    </figure>
                    @if($p3['count'] > 0)
                    <div class="proj-thumb-strip">
                      @foreach(array_slice($p3['images'], 0, 3) as $ti => $thumb)
                        <div class="proj-thumb" onclick="portfolioLightbox.open({{ Js::from($p3['images']) }}, {{ $ti }})">
                          <img src="{{ $thumb }}" loading="lazy" alt="">
                        </div>
                      @endforeach
                      @if($p3['count'] > 3)
                        <div class="proj-thumb proj-thumb-more" onclick="portfolioLightbox.open({{ Js::from($p3['images']) }}, 3)">
                          +{{ $p3['count'] - 3 }}
                        </div>
                      @endif
                    </div>
                    @endif
                    <div class="project-meta">
                      <p class="project-impact">{{ __('portfolio.proj3_impact') }}</p>
                      <div class="tech-badges">
                        @foreach(__('portfolio.proj3_stack') as $tech)
                          <span class="tech-badge">{{ $tech }}</span>
                        @endforeach
                      </div>
                      <div class="proj-actions">
                        <a href="#" class="case-study-btn" data-open-modal="proj3">
                          {{ __('portfolio.proj_case_study') }} <span class="cs-arrow">→</span>
                        </a>
                        <a href="{{ env('FINDEMPROAI_URL', 'https://app.kapitalya.com.bo') }}"
                           target="_blank" rel="noopener" class="proj-live-btn">
                          <i class="fa-solid fa-arrow-up-right-from-square"></i>
                          {{ __('portfolio.proj_visit_live') }}
                        </a>
                        @if($p3['count'] > 0)
                        <button class="view-gallery-btn" onclick="portfolioLightbox.open({{ Js::from($p3['images']) }}, 0)">
                          <i class="fa-solid fa-images"></i> {{ $p3['count'] }} {{ __('portfolio.gallery_photos') ?? 'photos' }}
                        </button>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

                {{-- Project 4: CNI Bolivia --}}
                @php $p4 = $projectImages['proj4']; @endphp
                <div class="col-xl-4 col-lg-6 col-md-6 grid-item web">
                  <div class="work-holder scale-animation" data-duration="2" data-delay=".9">
                    <figure class="portfolio-item">
                      <img src="{{ $p4['cover'] ?? asset('images/profile.png') }}"
                           alt="CNI Bolivia" loading="lazy">
                      <figcaption>
                        <div class="outer"><div class="inner">
                          <span>{{ __('portfolio.proj4_cat') }}</span>
                          <h3 class="title">{{ __('portfolio.proj4_title') }}</h3>
                        </div></div>
                      </figcaption>
                    </figure>
                    @if($p4['count'] > 0)
                    <div class="proj-thumb-strip">
                      @foreach(array_slice($p4['images'], 0, 3) as $ti => $thumb)
                        <div class="proj-thumb" onclick="portfolioLightbox.open({{ Js::from($p4['images']) }}, {{ $ti }})">
                          <img src="{{ $thumb }}" loading="lazy" alt="">
                        </div>
                      @endforeach
                      @if($p4['count'] > 3)
                        <div class="proj-thumb proj-thumb-more" onclick="portfolioLightbox.open({{ Js::from($p4['images']) }}, 3)">
                          +{{ $p4['count'] - 3 }}
                        </div>
                      @endif
                    </div>
                    @endif
                    <div class="project-meta">
                      <p class="project-impact">{{ __('portfolio.proj4_impact') }}</p>
                      <div class="tech-badges">
                        @foreach(__('portfolio.proj4_stack') as $tech)
                          <span class="tech-badge">{{ $tech }}</span>
                        @endforeach
                      </div>
                      <div class="proj-actions">
                        <a href="#" class="case-study-btn" data-open-modal="proj4">
                          {{ __('portfolio.proj_case_study') }} <span class="cs-arrow">→</span>
                        </a>
                        <a href="{{ __('portfolio.proj4_url') }}" target="_blank" rel="noopener noreferrer" class="proj-live-btn">
                          <i class="fa-solid fa-arrow-up-right-from-square"></i>
                          {{ __('portfolio.proj_visit_live') }}
                        </a>
                        @if($p4['count'] > 0)
                        <button class="view-gallery-btn" onclick="portfolioLightbox.open({{ Js::from($p4['images']) }}, 0)">
                          <i class="fa-solid fa-images"></i> {{ $p4['count'] }} {{ __('portfolio.gallery_photos') ?? 'photos' }}
                        </button>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

                {{-- Project 5: IoT Irrigation --}}
                @php $p5 = $projectImages['proj5']; @endphp
                <div class="col-xl-4 col-lg-6 col-md-6 grid-item iot">
                  <div class="work-holder scale-animation" data-duration="2" data-delay="1.1">
                    <figure class="portfolio-item">
                      <img src="{{ $p5['cover'] ?? asset('images/profile.png') }}"
                           alt="Smart Irrigation" loading="lazy">
                      <figcaption>
                        <div class="outer"><div class="inner">
                          <span>{{ __('portfolio.proj5_cat') }}</span>
                          <h3 class="title">{{ __('portfolio.proj5_title') }}</h3>
                        </div></div>
                      </figcaption>
                    </figure>
                    @if($p5['count'] > 0)
                    <div class="proj-thumb-strip">
                      @foreach(array_slice($p5['images'], 0, 3) as $ti => $thumb)
                        <div class="proj-thumb" onclick="portfolioLightbox.open({{ Js::from($p5['images']) }}, {{ $ti }})">
                          <img src="{{ $thumb }}" loading="lazy" alt="">
                        </div>
                      @endforeach
                      @if($p5['count'] > 3)
                        <div class="proj-thumb proj-thumb-more" onclick="portfolioLightbox.open({{ Js::from($p5['images']) }}, 3)">
                          +{{ $p5['count'] - 3 }}
                        </div>
                      @endif
                    </div>
                    @endif
                    <div class="project-meta">
                      <p class="project-impact">{{ __('portfolio.proj5_impact') }}</p>
                      <div class="tech-badges">
                        @foreach(__('portfolio.proj5_stack') as $tech)
                          <span class="tech-badge">{{ $tech }}</span>
                        @endforeach
                      </div>
                      <div class="proj-actions">
                        <a href="#" class="case-study-btn" data-open-modal="proj5">
                          {{ __('portfolio.proj_case_study') }} <span class="cs-arrow">→</span>
                        </a>
                        <a href="{{ __('portfolio.proj5_url') }}" target="_blank" rel="noopener noreferrer" class="proj-github-badge">
                          <i class="fa-brands fa-github"></i> GitHub
                        </a>
                        @if($p5['count'] > 0)
                        <button class="view-gallery-btn" onclick="portfolioLightbox.open({{ Js::from($p5['images']) }}, 0)">
                          <i class="fa-solid fa-images"></i> {{ $p5['count'] }} {{ __('portfolio.gallery_photos') ?? 'photos' }}
                        </button>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

                {{-- Project 6: Findempro Dairy --}}
                @php $p6 = $projectImages['proj6']; @endphp
                <div class="col-xl-4 col-lg-6 col-md-6 grid-item ai">
                  <div class="work-holder scale-animation" data-duration="2" data-delay="1.3">
                    <figure class="portfolio-item">
                      <img src="{{ $p6['cover'] ?? asset('images/profile.png') }}"
                           alt="Findempro Dairy" loading="lazy">
                      <figcaption>
                        <div class="outer"><div class="inner">
                          <span>{{ __('portfolio.proj6_cat') }}</span>
                          <h3 class="title">{{ __('portfolio.proj6_title') }}</h3>
                        </div></div>
                      </figcaption>
                    </figure>
                    @if($p6['count'] > 0)
                    <div class="proj-thumb-strip">
                      @foreach(array_slice($p6['images'], 0, 3) as $ti => $thumb)
                        <div class="proj-thumb" onclick="portfolioLightbox.open({{ Js::from($p6['images']) }}, {{ $ti }})">
                          <img src="{{ $thumb }}" loading="lazy" alt="">
                        </div>
                      @endforeach
                      @if($p6['count'] > 3)
                        <div class="proj-thumb proj-thumb-more" onclick="portfolioLightbox.open({{ Js::from($p6['images']) }}, 3)">
                          +{{ $p6['count'] - 3 }}
                        </div>
                      @endif
                    </div>
                    @endif
                    <div class="project-meta">
                      <p class="project-impact">{{ __('portfolio.proj6_impact') }}</p>
                      <div class="tech-badges">
                        @foreach(__('portfolio.proj6_stack') as $tech)
                          <span class="tech-badge">{{ $tech }}</span>
                        @endforeach
                      </div>
                      <div class="proj-actions">
                        <a href="#" class="case-study-btn" data-open-modal="proj6">
                          {{ __('portfolio.proj_case_study') }} <span class="cs-arrow">→</span>
                        </a>
                        <a href="{{ env('FINDEMPROLAREOS_URL', 'https://lacteos.kapitalya.com.bo') }}"
                           target="_blank" rel="noopener" class="proj-live-btn">
                          <i class="fa-solid fa-arrow-up-right-from-square"></i>
                          {{ __('portfolio.proj_visit_live') }}
                        </a>
                        @if($p6['count'] > 0)
                        <button class="view-gallery-btn" onclick="portfolioLightbox.open({{ Js::from($p6['images']) }}, 0)">
                          <i class="fa-solid fa-images"></i> {{ $p6['count'] }} {{ __('portfolio.gallery_photos') ?? 'photos' }}
                        </button>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

                {{-- Project 7: ARIMA Dólar Paralelo Bolivia --}}
                @php $p7 = $projectImages['proj7']; @endphp
                <div class="col-xl-4 col-lg-6 col-md-6 grid-item ai fintech">
                  <div class="work-holder scale-animation" data-duration="2" data-delay=".3">
                    <figure class="portfolio-item">
                      <div class="proj-no-cover grad-ts">
                        <span class="proj-no-cover-icon">📈</span>
                        <span class="proj-no-cover-label">Time Series · ARIMA</span>
                      </div>
                      <figcaption>
                        <div class="outer"><div class="inner">
                          <span>{{ __('portfolio.proj7_cat') }}</span>
                          <h3 class="title">{{ __('portfolio.proj7_title') }}</h3>
                        </div></div>
                      </figcaption>
                    </figure>
                    <div class="project-meta">
                      <p class="project-impact">{{ __('portfolio.proj7_impact') }}</p>
                      <div class="tech-badges">
                        @foreach(__('portfolio.proj7_stack') as $tech)
                          <span class="tech-badge">{{ $tech }}</span>
                        @endforeach
                      </div>
                      <div class="proj-actions">
                        <a href="#" class="case-study-btn" data-open-modal="proj7">
                          {{ __('portfolio.proj_case_study') }} <span class="cs-arrow">→</span>
                        </a>
                        <a href="{{ __('portfolio.proj7_github') }}" target="_blank" rel="noopener" class="proj-github-badge">
                          <i class="fa-brands fa-github"></i> GitHub
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- Project 8: Scoring Crediticio LATAM --}}
                @php $p8 = $projectImages['proj8']; @endphp
                <div class="col-xl-4 col-lg-6 col-md-6 grid-item ai fintech">
                  <div class="work-holder scale-animation" data-duration="2" data-delay=".5">
                    <figure class="portfolio-item">
                      <img src="{{ $p8['cover'] ?? asset('images/profile.png') }}"
                           alt="{{ __('portfolio.proj8_title') }}" loading="lazy">
                      <figcaption>
                        <div class="outer"><div class="inner">
                          <span>{{ __('portfolio.proj8_cat') }}</span>
                          <h3 class="title">{{ __('portfolio.proj8_title') }}</h3>
                        </div></div>
                      </figcaption>
                    </figure>
                    @if($p8['count'] > 0)
                    <div class="proj-thumb-strip">
                      @foreach(array_slice($p8['images'], 0, 3) as $ti => $thumb)
                        <div class="proj-thumb" onclick="portfolioLightbox.open({{ Js::from($p8['images']) }}, {{ $ti }})">
                          <img src="{{ $thumb }}" loading="lazy" alt="">
                        </div>
                      @endforeach
                    </div>
                    @endif
                    <div class="project-meta">
                      <p class="project-impact">{{ __('portfolio.proj8_impact') }}</p>
                      <div class="tech-badges">
                        @foreach(__('portfolio.proj8_stack') as $tech)
                          <span class="tech-badge">{{ $tech }}</span>
                        @endforeach
                      </div>
                      <div class="proj-actions">
                        <a href="#" class="case-study-btn" data-open-modal="proj8">
                          {{ __('portfolio.proj_case_study') }} <span class="cs-arrow">→</span>
                        </a>
                        @if($p8['count'] > 0)
                        <button class="view-gallery-btn" onclick="portfolioLightbox.open({{ Js::from($p8['images']) }}, 0)">
                          <i class="fa-solid fa-images"></i> {{ $p8['count'] }} {{ __('portfolio.gallery_photos') ?? 'photos' }}
                        </button>
                        @endif
                        <a href="{{ __('portfolio.proj8_github') }}" target="_blank" rel="noopener" class="proj-github-badge">
                          <i class="fa-brands fa-github"></i> GitHub
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- Project 9: Portafolio de Acciones Bolivia --}}
                @php $p9 = $projectImages['proj9']; @endphp
                <div class="col-xl-4 col-lg-6 col-md-6 grid-item fintech">
                  <div class="work-holder scale-animation" data-duration="2" data-delay=".7">
                    <figure class="portfolio-item">
                      <img src="{{ $p9['cover'] ?? asset('images/profile.png') }}"
                           alt="{{ __('portfolio.proj9_title') }}" loading="lazy">
                      <figcaption>
                        <div class="outer"><div class="inner">
                          <span>{{ __('portfolio.proj9_cat') }}</span>
                          <h3 class="title">{{ __('portfolio.proj9_title') }}</h3>
                        </div></div>
                      </figcaption>
                    </figure>
                    <div class="project-meta">
                      <p class="project-impact">{{ __('portfolio.proj9_impact') }}</p>
                      <div class="tech-badges">
                        @foreach(__('portfolio.proj9_stack') as $tech)
                          <span class="tech-badge">{{ $tech }}</span>
                        @endforeach
                      </div>
                      <div class="proj-actions">
                        <a href="#" class="case-study-btn" data-open-modal="proj9">
                          {{ __('portfolio.proj_case_study') }} <span class="cs-arrow">→</span>
                        </a>
                        <a href="{{ __('portfolio.proj9_github') }}" target="_blank" rel="noopener" class="proj-github-badge">
                          <i class="fa-brands fa-github"></i> GitHub
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- Project 10: Microservicios Spring Boot --}}
                @php $p10 = $projectImages['proj10']; @endphp
                <div class="col-xl-4 col-lg-6 col-md-6 grid-item java">
                  <div class="work-holder scale-animation" data-duration="2" data-delay=".9">
                    <figure class="portfolio-item">
                      <div class="proj-no-cover grad-java">
                        <span class="proj-no-cover-icon">⚙️</span>
                        <span class="proj-no-cover-label">Java · Microservices</span>
                      </div>
                      <figcaption>
                        <div class="outer"><div class="inner">
                          <span>{{ __('portfolio.proj10_cat') }}</span>
                          <h3 class="title">{{ __('portfolio.proj10_title') }}</h3>
                        </div></div>
                      </figcaption>
                    </figure>
                    <div class="project-meta">
                      <p class="project-impact">{{ __('portfolio.proj10_impact') }}</p>
                      <div class="tech-badges">
                        @foreach(__('portfolio.proj10_stack') as $tech)
                          <span class="tech-badge">{{ $tech }}</span>
                        @endforeach
                      </div>
                      <div class="proj-actions">
                        <a href="#" class="case-study-btn" data-open-modal="proj10">
                          {{ __('portfolio.proj_case_study') }} <span class="cs-arrow">→</span>
                        </a>
                        <a href="{{ __('portfolio.proj10_github') }}" target="_blank" rel="noopener" class="proj-github-badge">
                          <i class="fa-brands fa-github"></i> GitHub
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- Project 11: Kiosko Verde Bolivia --}}
                @php $p11 = $projectImages['proj11']; @endphp
                <div class="col-xl-4 col-lg-6 col-md-6 grid-item web">
                  <div class="work-holder scale-animation" data-duration="2" data-delay="1.1">
                    <figure class="portfolio-item">
                      <img src="{{ $p11['cover'] ?? asset('images/profile.png') }}"
                           alt="Kiosko Verde Bolivia" loading="lazy">
                      <figcaption>
                        <div class="outer"><div class="inner">
                          <span>{{ __('portfolio.proj11_cat') }}</span>
                          <h3 class="title">{{ __('portfolio.proj11_title') }}</h3>
                        </div></div>
                      </figcaption>
                    </figure>
                    @if($p11['count'] > 0)
                    <div class="proj-thumb-strip">
                      @foreach(array_slice($p11['images'], 0, 3) as $ti => $thumb)
                        <div class="proj-thumb" onclick="portfolioLightbox.open({{ Js::from($p11['images']) }}, {{ $ti }})">
                          <img src="{{ $thumb }}" loading="lazy" alt="">
                        </div>
                      @endforeach
                      @if($p11['count'] > 3)
                        <div class="proj-thumb proj-thumb-more" onclick="portfolioLightbox.open({{ Js::from($p11['images']) }}, 3)">
                          +{{ $p11['count'] - 3 }}
                        </div>
                      @endif
                    </div>
                    @endif
                    <div class="project-meta">
                      <p class="project-impact">{{ __('portfolio.proj11_impact') }}</p>
                      <div class="tech-badges">
                        @foreach(__('portfolio.proj11_stack') as $tech)
                          <span class="tech-badge">{{ $tech }}</span>
                        @endforeach
                      </div>
                      <div class="proj-actions">
                        <a href="#" class="case-study-btn" data-open-modal="proj11">
                          {{ __('portfolio.proj_case_study') }} <span class="cs-arrow">→</span>
                        </a>
                        @if($p11['count'] > 0)
                        <button class="view-gallery-btn" onclick="portfolioLightbox.open({{ Js::from($p11['images']) }}, 0)">
                          <i class="fa-solid fa-images"></i> {{ $p11['count'] }} {{ __('portfolio.gallery_photos') ?? 'photos' }}
                        </button>
                        @endif
                        <a href="{{ __('portfolio.proj11_github') }}" target="_blank" rel="noopener" class="proj-github-badge">
                          <i class="fa-brands fa-github"></i> GitHub
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- Project 12: Tromay Exchange House Website --}}
                @php $p12 = $projectImages['proj12']; @endphp
                <div class="col-xl-4 col-lg-6 col-md-6 grid-item web fintech">
                  <div class="work-holder scale-animation" data-duration="2" data-delay="1.3">
                    <figure class="portfolio-item">
                      <img src="{{ $p12['cover'] ?? asset('images/profile.png') }}"
                           alt="Tromay Exchange House Website" loading="lazy">
                      <figcaption>
                        <div class="outer"><div class="inner">
                          <span>{{ __('portfolio.proj12_cat') }}</span>
                          <h3 class="title">{{ __('portfolio.proj12_title') }}</h3>
                        </div></div>
                      </figcaption>
                    </figure>
                    @if($p12['count'] > 0)
                    <div class="proj-thumb-strip">
                      @foreach(array_slice($p12['images'], 0, 3) as $ti => $thumb)
                        <div class="proj-thumb" onclick="portfolioLightbox.open({{ Js::from($p12['images']) }}, {{ $ti }})">
                          <img src="{{ $thumb }}" loading="lazy" alt="">
                        </div>
                      @endforeach
                      @if($p12['count'] > 3)
                        <div class="proj-thumb proj-thumb-more" onclick="portfolioLightbox.open({{ Js::from($p12['images']) }}, 3)">
                          +{{ $p12['count'] - 3 }}
                        </div>
                      @endif
                    </div>
                    @endif
                    <div class="project-meta">
                      <p class="project-impact">{{ __('portfolio.proj12_impact') }}</p>
                      <div class="tech-badges">
                        @foreach(__('portfolio.proj12_stack') as $tech)
                          <span class="tech-badge">{{ $tech }}</span>
                        @endforeach
                      </div>
                      <div class="proj-actions">
                        <a href="#" class="case-study-btn" data-open-modal="proj12">
                          {{ __('portfolio.proj_case_study') }} <span class="cs-arrow">→</span>
                        </a>
                        @if($p12['count'] > 0)
                        <button class="view-gallery-btn" onclick="portfolioLightbox.open({{ Js::from($p12['images']) }}, 0)">
                          <i class="fa-solid fa-images"></i> {{ $p12['count'] }} {{ __('portfolio.gallery_photos') ?? 'photos' }}
                        </button>
                        @endif
                        <a href="{{ __('portfolio.proj12_github') }}" target="_blank" rel="noopener" class="proj-github-badge">
                          <i class="fa-brands fa-github"></i> GitHub
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- Project 13: Kapitalya Multi-Tenant ERP --}}
                @php $p13 = $projectImages['proj13']; @endphp
                <div class="col-xl-4 col-lg-6 col-md-6 grid-item web fintech">
                  <div class="work-holder scale-animation" data-duration="2" data-delay=".3">
                    <figure class="portfolio-item">
                      <div class="proj-no-cover grad-java">
                        <span class="proj-no-cover-icon">🏦</span>
                        <span class="proj-no-cover-label">ERP · Django · React</span>
                      </div>
                      <figcaption>
                        <div class="outer"><div class="inner">
                          <span>{{ __('portfolio.proj13_cat') }}</span>
                          <h3 class="title">{{ __('portfolio.proj13_title') }}</h3>
                        </div></div>
                      </figcaption>
                    </figure>
                    <div class="project-meta">
                      <p class="project-impact">{{ __('portfolio.proj13_impact') }}</p>
                      <div class="tech-badges">
                        @foreach(__('portfolio.proj13_stack') as $tech)
                          <span class="tech-badge">{{ $tech }}</span>
                        @endforeach
                      </div>
                      <div class="proj-actions">
                        <a href="#" class="case-study-btn" data-open-modal="proj13">
                          {{ __('portfolio.proj_case_study') }} <span class="cs-arrow">→</span>
                        </a>
                        <a href="{{ __('portfolio.proj13_url') }}" target="_blank" rel="noopener noreferrer" class="proj-live-btn">
                          <i class="fa-solid fa-arrow-up-right-from-square"></i>
                          {{ __('portfolio.proj_visit_live') }}
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- Project 14: Alertas Bolivia --}}
                @php $p14 = $projectImages['proj14']; @endphp
                <div class="col-xl-4 col-lg-6 col-md-6 grid-item ai fintech">
                  <div class="work-holder scale-animation" data-duration="2" data-delay=".5">
                    <figure class="portfolio-item">
                      <div class="proj-no-cover grad-ts">
                        <span class="proj-no-cover-icon">🔔</span>
                        <span class="proj-no-cover-label">ARIMA · Twilio · WhatsApp</span>
                      </div>
                      <figcaption>
                        <div class="outer"><div class="inner">
                          <span>{{ __('portfolio.proj14_cat') }}</span>
                          <h3 class="title">{{ __('portfolio.proj14_title') }}</h3>
                        </div></div>
                      </figcaption>
                    </figure>
                    <div class="project-meta">
                      <p class="project-impact">{{ __('portfolio.proj14_impact') }}</p>
                      <div class="tech-badges">
                        @foreach(__('portfolio.proj14_stack') as $tech)
                          <span class="tech-badge">{{ $tech }}</span>
                        @endforeach
                      </div>
                      <div class="proj-actions">
                        <a href="#" class="case-study-btn" data-open-modal="proj14">
                          {{ __('portfolio.proj_case_study') }} <span class="cs-arrow">→</span>
                        </a>
                        <a href="{{ __('portfolio.proj14_url') }}" target="_blank" rel="noopener noreferrer" class="proj-live-btn">
                          <i class="fa-solid fa-arrow-up-right-from-square"></i>
                          {{ __('portfolio.proj_visit_live') }}
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- Project 15: Bolivian Forex Predictor --}}
                @php $p15 = $projectImages['proj15']; @endphp
                <div class="col-xl-4 col-lg-6 col-md-6 grid-item ai fintech">
                  <div class="work-holder scale-animation" data-duration="2" data-delay=".7">
                    <figure class="portfolio-item">
                      <div class="proj-no-cover grad-ml">
                        <span class="proj-no-cover-icon">🤖</span>
                        <span class="proj-no-cover-label">Django · Prophet + XGBoost</span>
                      </div>
                      <figcaption>
                        <div class="outer"><div class="inner">
                          <span>{{ __('portfolio.proj15_cat') }}</span>
                          <h3 class="title">{{ __('portfolio.proj15_title') }}</h3>
                        </div></div>
                      </figcaption>
                    </figure>
                    <div class="project-meta">
                      <p class="project-impact">{{ __('portfolio.proj15_impact') }}</p>
                      <div class="tech-badges">
                        @foreach(__('portfolio.proj15_stack') as $tech)
                          <span class="tech-badge">{{ $tech }}</span>
                        @endforeach
                      </div>
                      <div class="proj-actions">
                        <a href="#" class="case-study-btn" data-open-modal="proj15">
                          {{ __('portfolio.proj_case_study') }} <span class="cs-arrow">→</span>
                        </a>
                        <a href="{{ __('portfolio.proj15_url') }}" target="_blank" rel="noopener noreferrer" class="proj-live-btn">
                          <i class="fa-solid fa-arrow-up-right-from-square"></i>
                          {{ __('portfolio.proj_visit_live') }}
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- Project 16: Analytics Dashboard --}}
                @php $p16 = $projectImages['proj16']; @endphp
                <div class="col-xl-4 col-lg-6 col-md-6 grid-item bi">
                  <div class="work-holder scale-animation" data-duration="2" data-delay=".9">
                    <figure class="portfolio-item">
                      <div class="proj-no-cover grad-fin">
                        <span class="proj-no-cover-icon">📊</span>
                        <span class="proj-no-cover-label">Django · React · Recharts</span>
                      </div>
                      <figcaption>
                        <div class="outer"><div class="inner">
                          <span>{{ __('portfolio.proj16_cat') }}</span>
                          <h3 class="title">{{ __('portfolio.proj16_title') }}</h3>
                        </div></div>
                      </figcaption>
                    </figure>
                    <div class="project-meta">
                      <p class="project-impact">{{ __('portfolio.proj16_impact') }}</p>
                      <div class="tech-badges">
                        @foreach(__('portfolio.proj16_stack') as $tech)
                          <span class="tech-badge">{{ $tech }}</span>
                        @endforeach
                      </div>
                      <div class="proj-actions">
                        <a href="#" class="case-study-btn" data-open-modal="proj16">
                          {{ __('portfolio.proj_case_study') }} <span class="cs-arrow">→</span>
                        </a>
                        <a href="{{ __('portfolio.proj16_url') }}" target="_blank" rel="noopener noreferrer" class="proj-live-btn">
                          <i class="fa-solid fa-arrow-up-right-from-square"></i>
                          {{ __('portfolio.proj_visit_live') }}
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- Project 17: LLM Financial Analyst --}}
                @php $p17 = $projectImages['proj17']; @endphp
                <div class="col-xl-4 col-lg-6 col-md-6 grid-item ai fintech">
                  <div class="work-holder scale-animation" data-duration="2" data-delay="1.1">
                    <figure class="portfolio-item">
                      <div class="proj-no-cover grad-ml">
                        <span class="proj-no-cover-icon">💬</span>
                        <span class="proj-no-cover-label">LLM · LangChain · NLP</span>
                      </div>
                      <figcaption>
                        <div class="outer"><div class="inner">
                          <span>{{ __('portfolio.proj17_cat') }}</span>
                          <h3 class="title">{{ __('portfolio.proj17_title') }}</h3>
                        </div></div>
                      </figcaption>
                    </figure>
                    <div class="project-meta">
                      <p class="project-impact">{{ __('portfolio.proj17_impact') }}</p>
                      <div class="tech-badges">
                        @foreach(__('portfolio.proj17_stack') as $tech)
                          <span class="tech-badge">{{ $tech }}</span>
                        @endforeach
                      </div>
                      <div class="proj-actions">
                        <a href="#" class="case-study-btn" data-open-modal="proj17">
                          {{ __('portfolio.proj_case_study') }} <span class="cs-arrow">→</span>
                        </a>
                        <a href="{{ __('portfolio.proj17_url') }}" target="_blank" rel="noopener noreferrer" class="proj-live-btn">
                          <i class="fa-solid fa-arrow-up-right-from-square"></i>
                          {{ __('portfolio.proj_visit_live') }}
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- Project 18: Fraud Detection Engine --}}
                @php $p18 = $projectImages['proj18']; @endphp
                <div class="col-xl-4 col-lg-6 col-md-6 grid-item ai fintech">
                  <div class="work-holder scale-animation" data-duration="2" data-delay="1.3">
                    <figure class="portfolio-item">
                      <div class="proj-no-cover grad-ml">
                        <span class="proj-no-cover-icon">🛡️</span>
                        <span class="proj-no-cover-label">Fraud · Isolation Forest</span>
                      </div>
                      <figcaption>
                        <div class="outer"><div class="inner">
                          <span>{{ __('portfolio.proj18_cat') }}</span>
                          <h3 class="title">{{ __('portfolio.proj18_title') }}</h3>
                        </div></div>
                      </figcaption>
                    </figure>
                    <div class="project-meta">
                      <p class="project-impact">{{ __('portfolio.proj18_impact') }}</p>
                      <div class="tech-badges">
                        @foreach(__('portfolio.proj18_stack') as $tech)
                          <span class="tech-badge">{{ $tech }}</span>
                        @endforeach
                      </div>
                      <div class="proj-actions">
                        <a href="#" class="case-study-btn" data-open-modal="proj18">
                          {{ __('portfolio.proj_case_study') }} <span class="cs-arrow">→</span>
                        </a>
                        <a href="{{ __('portfolio.proj18_url') }}" target="_blank" rel="noopener noreferrer" class="proj-live-btn">
                          <i class="fa-solid fa-arrow-up-right-from-square"></i>
                          {{ __('portfolio.proj_visit_live') }}
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- Project 19: ML Time Series Explorer --}}
                @php $p19 = $projectImages['proj19']; @endphp
                <div class="col-xl-4 col-lg-6 col-md-6 grid-item ai">
                  <div class="work-holder scale-animation" data-duration="2" data-delay=".3">
                    <figure class="portfolio-item">
                      <div class="proj-no-cover grad-ts">
                        <span class="proj-no-cover-icon">📈</span>
                        <span class="proj-no-cover-label">Streamlit · Prophet · ARIMA</span>
                      </div>
                      <figcaption>
                        <div class="outer"><div class="inner">
                          <span>{{ __('portfolio.proj19_cat') }}</span>
                          <h3 class="title">{{ __('portfolio.proj19_title') }}</h3>
                        </div></div>
                      </figcaption>
                    </figure>
                    <div class="project-meta">
                      <p class="project-impact">{{ __('portfolio.proj19_impact') }}</p>
                      <div class="tech-badges">
                        @foreach(__('portfolio.proj19_stack') as $tech)
                          <span class="tech-badge">{{ $tech }}</span>
                        @endforeach
                      </div>
                      <div class="proj-actions">
                        <a href="#" class="case-study-btn" data-open-modal="proj19">
                          {{ __('portfolio.proj_case_study') }} <span class="cs-arrow">→</span>
                        </a>
                        <a href="{{ __('portfolio.proj19_url') }}" target="_blank" rel="noopener noreferrer" class="proj-live-btn">
                          <i class="fa-solid fa-arrow-up-right-from-square"></i>
                          {{ __('portfolio.proj_visit_live') }}
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- Project 20: Data Pipeline Airflow --}}
                @php $p20 = $projectImages['proj20']; @endphp
                <div class="col-xl-4 col-lg-6 col-md-6 grid-item ai">
                  <div class="work-holder scale-animation" data-duration="2" data-delay=".5">
                    <figure class="portfolio-item">
                      <div class="proj-no-cover grad-java">
                        <span class="proj-no-cover-icon">⚙️</span>
                        <span class="proj-no-cover-label">Airflow · MLOps · Docker</span>
                      </div>
                      <figcaption>
                        <div class="outer"><div class="inner">
                          <span>{{ __('portfolio.proj20_cat') }}</span>
                          <h3 class="title">{{ __('portfolio.proj20_title') }}</h3>
                        </div></div>
                      </figcaption>
                    </figure>
                    <div class="project-meta">
                      <p class="project-impact">{{ __('portfolio.proj20_impact') }}</p>
                      <div class="tech-badges">
                        @foreach(__('portfolio.proj20_stack') as $tech)
                          <span class="tech-badge">{{ $tech }}</span>
                        @endforeach
                      </div>
                      <div class="proj-actions">
                        <a href="#" class="case-study-btn" data-open-modal="proj20">
                          {{ __('portfolio.proj_case_study') }} <span class="cs-arrow">→</span>
                        </a>
                        <a href="{{ __('portfolio.proj20_url') }}" target="_blank" rel="noopener noreferrer" class="proj-live-btn">
                          <i class="fa-solid fa-arrow-up-right-from-square"></i>
                          {{ __('portfolio.proj_visit_live') }}
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- Project 21: FX Options Valuation (Garman-Kohlhagen / Monte Carlo) --}}
                @php $p21 = $projectImages['proj21'] ?? ['cover' => null, 'images' => [], 'count' => 0]; @endphp
                <div class="col-xl-4 col-lg-6 col-md-6 grid-item ai fintech">
                  <div class="work-holder scale-animation" data-duration="2" data-delay=".7">
                    <figure class="portfolio-item">
                      <img src="{{ $p21['cover'] ?? asset('images/profile.png') }}"
                           alt="{{ __('portfolio.proj21_title') }}" loading="lazy">
                      <figcaption>
                        <div class="outer"><div class="inner">
                          <span>{{ __('portfolio.proj21_cat') }}</span>
                          <h3 class="title">{{ __('portfolio.proj21_title') }}</h3>
                        </div></div>
                      </figcaption>
                    </figure>
                    @if($p21['count'] > 0)
                    <div class="proj-thumb-strip">
                      @foreach(array_slice($p21['images'], 0, 3) as $ti => $thumb)
                        <div class="proj-thumb" onclick="portfolioLightbox.open({{ Js::from($p21['images']) }}, {{ $ti }})">
                          <img src="{{ $thumb }}" loading="lazy" alt="">
                        </div>
                      @endforeach
                    </div>
                    @endif
                    <div class="project-meta">
                      <p class="project-impact">{{ __('portfolio.proj21_impact') }}</p>
                      <div class="tech-badges">
                        @foreach(__('portfolio.proj21_stack') as $tech)
                          <span class="tech-badge">{{ $tech }}</span>
                        @endforeach
                      </div>
                      <div class="proj-actions">
                        <a href="#" class="case-study-btn" data-open-modal="proj21">
                          {{ __('portfolio.proj_case_study') }} <span class="cs-arrow">→</span>
                        </a>
                        @if($p21['count'] > 0)
                        <button class="view-gallery-btn" onclick="portfolioLightbox.open({{ Js::from($p21['images']) }}, 0)">
                          <i class="fa-solid fa-images"></i> {{ $p21['count'] }} {{ __('portfolio.gallery_photos') ?? 'photos' }}
                        </button>
                        @endif
                        <a href="{{ __('portfolio.proj21_github') }}" target="_blank" rel="noopener" class="proj-github-badge">
                          <i class="fa-brands fa-github"></i> GitHub
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- Project 22: Kapitalya Insights --}}
                @php $p22 = $projectImages['proj22'] ?? ['cover' => null, 'images' => [], 'count' => 0]; @endphp
                <div class="col-xl-4 col-lg-6 col-md-6 grid-item web bi">
                  <div class="work-holder scale-animation" data-duration="2" data-delay=".3">
                    <figure class="portfolio-item">
                      <div class="proj-no-cover grad-fin">
                        <span class="proj-no-cover-icon">📈</span>
                        <span class="proj-no-cover-label">Insights · Django · React</span>
                      </div>
                      <figcaption>
                        <div class="outer"><div class="inner">
                          <span>{{ __('portfolio.proj22_cat') }}</span>
                          <h3 class="title">{{ __('portfolio.proj22_title') }}</h3>
                        </div></div>
                      </figcaption>
                    </figure>
                    <div class="project-meta">
                      <p class="project-impact">{{ __('portfolio.proj22_impact') }}</p>
                      <div class="tech-badges">
                        @foreach(__('portfolio.proj22_stack') as $tech)
                          <span class="tech-badge">{{ $tech }}</span>
                        @endforeach
                      </div>
                      <div class="proj-actions">
                        <a href="#" class="case-study-btn" data-open-modal="proj22">
                          {{ __('portfolio.proj_case_study') }} <span class="cs-arrow">→</span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- Project 24: Kapitalya Suite (30 verticals) --}}
                @php $p24 = $projectImages['proj24'] ?? ['cover' => null, 'images' => [], 'count' => 0]; @endphp
                <div class="col-xl-4 col-lg-6 col-md-6 grid-item fintech web">
                  <div class="work-holder scale-animation" data-duration="2" data-delay=".7">
                    <figure class="portfolio-item">
                      <div class="proj-no-cover grad-java">
                        <span class="proj-no-cover-icon">🧩</span>
                        <span class="proj-no-cover-label">Monorepo · 30 verticales</span>
                      </div>
                      <figcaption>
                        <div class="outer"><div class="inner">
                          <span>{{ __('portfolio.proj24_cat') }}</span>
                          <h3 class="title">{{ __('portfolio.proj24_title') }}</h3>
                        </div></div>
                      </figcaption>
                    </figure>
                    <div class="project-meta">
                      <p class="project-impact">{{ __('portfolio.proj24_impact') }}</p>
                      <div class="tech-badges">
                        @foreach(__('portfolio.proj24_stack') as $tech)
                          <span class="tech-badge">{{ $tech }}</span>
                        @endforeach
                      </div>
                      <div class="proj-actions">
                        <a href="#" class="case-study-btn" data-open-modal="proj24">
                          {{ __('portfolio.proj_case_study') }} <span class="cs-arrow">→</span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

              </div>{{-- .masonry --}}
            </section>
