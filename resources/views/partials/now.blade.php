            {{-- ══════════════════════════════════════════════════════════
                 NOW
            ══════════════════════════════════════════════════════════ --}}
            <section id="now">
              <div class="spacer-75"></div>
              <div class="section-title page-caption">
                <h5>{{ __('portfolio.now_title') }}</h5>
                <div class="zigzag">
                  <hr class="left"><hr class="right">
                  @include('partials.zigzag')
                </div>
              </div>
              <div class="spacer-45"></div>

              <div class="now-live-badge clip-animation" data-duration="1.5">
                <span class="now-live-dot"></span>
                <span id="now-status-text"
                      data-statuses="{{ __('portfolio.now_statuses') }}">
                  {{ __('portfolio.now_status_default') }}
                </span>
              </div>

              <div class="now-grid clip-animation from-left" data-duration="1.5">
                <div class="now-card">
                  <span class="now-card-icon">🚀</span>
                  <div class="now-card-label">{{ __('portfolio.now_build_lbl') }}</div>
                  <div class="now-card-value">{{ __('portfolio.now_build_val') }}</div>
                </div>
                <div class="now-card">
                  <span class="now-card-icon">🎓</span>
                  <div class="now-card-label">{{ __('portfolio.now_study_lbl') }}</div>
                  <div class="now-card-value">{{ __('portfolio.now_study_val') }}</div>
                </div>
                <div class="now-card">
                  <span class="now-card-icon">💼</span>
                  <div class="now-card-label">{{ __('portfolio.now_avail_lbl') }}</div>
                  <div class="now-card-value">{{ __('portfolio.now_avail_val') }}</div>
                </div>
                <div class="now-card">
                  <span class="now-card-icon">📍</span>
                  <div class="now-card-label">{{ __('portfolio.now_loc_lbl') }}</div>
                  <div class="now-card-value">{{ __('portfolio.now_loc_val') }}</div>
                </div>
              </div>
            </section>
