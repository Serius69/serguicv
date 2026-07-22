            {{-- ══════════════════════════════════════════════════════════
                 ABOUT
            ══════════════════════════════════════════════════════════ --}}
            <section id="about">
              <div class="spacer-75"></div>
              <div class="section-title page-caption">
                <h5>{{ __('portfolio.about_title') }}</h5>
                <div class="zigzag">
                  <hr class="left"><hr class="right">
                  @include('partials.zigzag')
                </div>
              </div>
              <div class="spacer-45"></div>
              <div class="row">
                <div class="col-xl-7 col-lg-8 about-text clip-animation from-left" data-duration="1.5">
                  <p>{!! __('portfolio.about_p1') !!}</p>
                  <p>{!! __('portfolio.about_p2') !!}</p>
                  <p>{!! __('portfolio.about_p3') !!}</p>

                  {{-- Kapitalya role card ────────────────────────────── --}}
                  <div class="kapitalya-card fade-in-scroll">
                    <div class="kapitalya-card-icon" aria-hidden="true">🏢</div>
                    <div class="kapitalya-card-body">
                      <span class="kapitalya-badge">{{ __('portfolio.about_kapitalya_badge') }}</span>
                      <strong class="kapitalya-card-name">Kapitalya Servicios Integrales</strong>
                      <p class="kapitalya-card-desc">{{ __('portfolio.about_kapitalya_desc') }}</p>
                      <a href="https://kapitalya.com.bo" target="_blank" rel="noopener"
                         class="kapitalya-card-link">
                        {{ __('portfolio.about_kapitalya_link') }}
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </section>
