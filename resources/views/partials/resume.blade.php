            {{-- ══════════════════════════════════════════════════════════
                 EXPERIENCE + EDUCATION
            ══════════════════════════════════════════════════════════ --}}
            <section id="resume">
              <div class="spacer-75"></div>
              <div class="section-title page-caption">
                <h5>{{ __('portfolio.experience_title') }}</h5>
                <div class="zigzag">
                  <hr class="left"><hr class="right">
                  @include('partials.zigzag')
                </div>
              </div>
              <div class="spacer-45"></div>

              {{-- Work Experience Timeline --}}
              <div class="timeline-caption-outer">
                <div class="timeline-caption">💼 <span>{{ __('portfolio.experience_title') }}</span></div>
              </div>
              <div class="timeline row">

                {{-- Kapitalya --}}
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 timeline-item clip-animation from-top" data-duration="1.5">
                  <div class="timeline-outer">
                    <span class="mini-text">{{ __('portfolio.job1_date') }}</span>
                    <h5>{{ __('portfolio.job1_company') }}</h5>
                    <h6>{{ __('portfolio.job1_role') }}</h6>
                    <ul class="exp-bullets">
                      <li>{{ __('portfolio.job1_b1') }}</li>
                      <li>{{ __('portfolio.job1_b2') }}</li>
                      <li>{{ __('portfolio.job1_b3') }}</li>
                      <li>{{ __('portfolio.job1_b4') }}</li>
                    </ul>
                  </div>
                </div>

                {{-- CNI Bolivia --}}
                <div class="col-xl-6 offset-xl-6 col-lg-6 offset-lg-6 col-md-6 offset-md-6 col-sm-12 timeline-item clip-animation from-top" data-duration="1.5" data-delay=".4">
                  <div class="timeline-outer">
                    <span class="mini-text">{{ __('portfolio.job2_date') }}</span>
                    <h5>{{ __('portfolio.job2_company') }}</h5>
                    <h6>{{ __('portfolio.job2_role') }}</h6>
                    <ul class="exp-bullets">
                      <li>{{ __('portfolio.job2_b1') }}</li>
                      <li>{{ __('portfolio.job2_b2') }}</li>
                      <li>{{ __('portfolio.job2_b3') }}</li>
                    </ul>
                  </div>
                </div>

                {{-- Tromay --}}
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 timeline-item clip-animation from-top" data-duration="1.5" data-delay=".8">
                  <div class="timeline-outer">
                    <span class="mini-text">{{ __('portfolio.job3_date') }}</span>
                    <h5>{{ __('portfolio.job3_company') }}</h5>
                    <h6>{{ __('portfolio.job3_role') }}</h6>
                    <ul class="exp-bullets">
                      <li>{{ __('portfolio.job3_b1') }}</li>
                      <li>{{ __('portfolio.job3_b2') }}</li>
                    </ul>
                  </div>
                </div>

              </div>{{-- .timeline --}}

              {{-- Education Timeline --}}
              <div class="spacer-120"></div>
              <div class="timeline-caption-outer">
                <div class="timeline-caption">🎓 <span>{{ __('portfolio.education_title') }}</span></div>
              </div>
              <div class="timeline row">

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 timeline-item clip-animation from-top" data-duration="1.5">
                  <div class="timeline-outer">
                    <span class="mini-text">{{ __('portfolio.edu1_date') }}</span>
                    <h5>{{ __('portfolio.edu1_degree') }}</h5>
                    <h6>{{ __('portfolio.edu1_inst') }}</h6>
                    <p class="little-p">{{ __('portfolio.edu1_desc') }}</p>
                  </div>
                </div>

                <div class="col-xl-6 offset-xl-6 col-lg-6 offset-lg-6 col-md-6 offset-md-6 col-sm-12 timeline-item clip-animation from-top" data-duration="1.5" data-delay=".4">
                  <div class="timeline-outer">
                    <span class="mini-text">{{ __('portfolio.edu2_date') }}</span>
                    <h5>{{ __('portfolio.edu2_degree') }}</h5>
                    <h6>{{ __('portfolio.edu2_inst') }}</h6>
                    <p class="little-p">{{ __('portfolio.edu2_desc') }}</p>
                  </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 timeline-item clip-animation from-top" data-duration="1.5" data-delay=".8">
                  <div class="timeline-outer">
                    <span class="mini-text">{{ __('portfolio.edu3_date') }}</span>
                    <h5>{{ __('portfolio.edu3_degree') }}</h5>
                    <h6>{{ __('portfolio.edu3_inst') }}</h6>
                    <p class="little-p">{{ __('portfolio.edu3_desc') }}</p>
                  </div>
                </div>

              </div>{{-- .timeline --}}
            </section>
