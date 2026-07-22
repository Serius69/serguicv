            {{-- ══════════════════════════════════════════════════════════
                 HERO
            ══════════════════════════════════════════════════════════ --}}
            <section class="hero" id="home">
              {{-- Ambient gradient mesh background --}}
              <div class="hero-ambient" aria-hidden="true"></div>

              <div class="row">

                {{-- Profile Photo --}}
                <div class="col-xl-3 col-lg-4 col-md-6 profile-pic">
                  <div class="image clip-animation from-left"
                       style="background-image: url({{ asset('images/profile_formal.jpg') }});">
                    <img src="{{ asset('images/profile_formal.jpg') }}" alt="Sergio Troche">
                  </div>
                  <div class="social-links clip-animation">
                    <ul>
                      <li>
                        <a href="https://www.linkedin.com/in/sergio-denis-troche-mayta" target="_blank" rel="noopener" aria-label="LinkedIn (abre en pestaña nueva)" title="LinkedIn">
                          <i class="fa-brands fa-linkedin" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li>
                        <a href="https://github.com/Serius69" target="_blank" rel="noopener" aria-label="GitHub (abre en pestaña nueva)" title="GitHub">
                          <i class="fa-brands fa-github" aria-hidden="true"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>

                {{-- Hero content --}}
                <div class="col-xl-9 col-lg-8 col-md-6 right-content">
                  <h5 class="hi classic-animation" data-delay=".5">
                    {{ __('portfolio.hero_greeting') }} <span>👋</span>
                  </h5>
                  <div class="spacer-15"></div>
                  <h1 class="hero-big classic-animation" data-delay=".7">
                    {{ __('portfolio.hero_name') }}<br>
                    {{ __('portfolio.hero_iam') }}
                    <span class="element"
                          data-values="{{ __('portfolio.hero_typed') }}"
                          data-loop="true"
                          data-backdelay="2">
                      Data Scientist.
                    </span>
                  </h1>
                  <p class="hero-role-tagline classic-animation" data-delay=".85">
                    {{ __('portfolio.hero_role_tagline') }}
                  </p>
                  <div class="spacer-30"></div>
                  <hr class="clip-animation" data-delay="1">
                  <ul class="row profile-info clip-animation" data-delay="1">
                    <li class="col-xl-4 col-lg-6">
                      <i class="far fa-calendar-alt"></i>
                      <span>{{ __('portfolio.hero_birth') }}</span>
                    </li>
                    <li class="col-xl-4 col-lg-6">
                      <a target="_blank" href="https://wa.me/59178939071" rel="noopener">
                        <i class="fa-brands fa-whatsapp"></i>
                        <span>{{ __('portfolio.hero_phone') }}</span>
                      </a>
                    </li>
                    <li class="col-xl-4 col-lg-6">
                      <a target="_blank" href="mailto:{{ __('portfolio.hero_email') }}" rel="noopener">
                        <i class="fa-solid fa-at"></i>
                        <span>{{ __('portfolio.hero_email') }}</span>
                      </a>
                    </li>
                    <li class="col-xl-4 col-lg-6">
                      <i class="fa-solid fa-location-dot"></i>
                      <span>{{ __('portfolio.hero_location') }}</span>
                    </li>
                  </ul>

                  <div class="hero-cta-group clip-animation" data-delay="1.1">
                    <a href="#portfolio" class="site-btn">
                      {{ __('portfolio.hero_cta_work') }}
                    </a>
                    <a href="{{ route('cv.download') }}"
                       class="site-btn btn-outline">
                      <i class="fa-solid fa-download hero-dl-icon"></i>
                      {{ __('portfolio.hero_cta_cv') }}
                    </a>
                    <a href="https://www.linkedin.com/in/sergio-denis-troche-mayta"
                       target="_blank" rel="noopener"
                       class="hero-linkedin-icon"
                       aria-label="LinkedIn (abre en pestaña nueva)" title="LinkedIn">
                      <i class="fa-brands fa-linkedin" aria-hidden="true"></i>
                    </a>
                  </div>

                  @if($openToWork)
                  <div class="open-to-work-badge classic-animation" data-delay="1.6">
                    <span class="otw-dot" aria-hidden="true"></span>
                    <span>{{ __('portfolio.open_to_work_msg') }}</span>
                  </div>
                  @endif
                </div>
              </div>

              <div class="spacer-30"></div>
              <p class="clip-animation hero-tagline-text" data-delay="1.2">
                {{ __('portfolio.hero_tagline') }}
              </p>

              {{-- ── Stats Bar ──────────────────────────────────────────── --}}
              <div class="stats-bar clip-animation" data-delay="1.4">
                <div class="stat-item">
                  <span class="stat-number" data-target="20" data-suffix="+">20+</span>
                  <span class="stat-label">{{ __('portfolio.stat_solutions_lbl') }}</span>
                </div>
                <div class="stat-item">
                  <span class="stat-number" data-target="78" data-suffix="%">78%</span>
                  <span class="stat-label">{{ __('portfolio.stat_accuracy_lbl') }}</span>
                </div>
                <div class="stat-item">
                  <span class="stat-number" data-target="50" data-suffix="%">50%</span>
                  <span class="stat-label">{{ __('portfolio.stat_time_lbl') }}</span>
                </div>
                <div class="stat-item">
                  <span class="stat-number" data-target="15" data-suffix="">15</span>
                  <span class="stat-label">{{ __('portfolio.stat_dashboards_lbl') }}</span>
                </div>
              </div>

              {{-- ── Scroll indicator ──────────────────────────────────── --}}
              <div class="scroll-indicator" aria-hidden="true">
                <div class="scroll-indicator-mouse">
                  <div class="scroll-indicator-wheel"></div>
                </div>
                <span class="scroll-indicator-text">
                  {{ app()->getLocale() === 'en' ? 'Scroll' : 'Bajar' }}
                </span>
              </div>

              {{-- ── Services ───────────────────────────────────────────── --}}
              <div class="services scale-animation" data-delay="1.5">
                <div class="spacer-45"></div>
                <h5 class="underline-title">{{ __('portfolio.services_title') }}</h5>
                <div class="row services">
                  <div class="spacer-60"></div>

                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="service-item">
                      <i class="flaticon-analysis"></i>
                      <h5>{{ __('portfolio.svc1_title') }}</h5>
                      <p class="svc-desc">{{ __('portfolio.svc1_desc') }}</p>
                    </div>
                  </div>

                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="service-item">
                      <i class="flaticon-web-design"></i>
                      <h5>{{ __('portfolio.svc2_title') }}</h5>
                      <p class="svc-desc">{{ __('portfolio.svc2_desc') }}</p>
                    </div>
                  </div>

                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="service-item">
                      <i class="flaticon-artificial-intelligence"></i>
                      <h5>{{ __('portfolio.svc3_title') }}</h5>
                      <p class="svc-desc">{{ __('portfolio.svc3_desc') }}</p>
                    </div>
                  </div>

                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="service-item">
                      <i class="flaticon-ecommerce"></i>
                      <h5>{{ __('portfolio.svc4_title') }}</h5>
                      <p class="svc-desc">{{ __('portfolio.svc4_desc') }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </section>
