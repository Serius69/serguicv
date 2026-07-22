            {{-- ══════════════════════════════════════════════════════════
                 CERTIFICATIONS
            ══════════════════════════════════════════════════════════ --}}
            <section id="certifications">
              <div class="spacer-75"></div>
              <div class="section-title page-caption">
                <h5>{{ __('portfolio.certs_title') }}</h5>
                <div class="zigzag">
                  <hr class="left"><hr class="right">
                  @include('partials.zigzag')
                </div>
              </div>
              <div class="spacer-45"></div>

              @if(count($certImages) > 0)
                {{-- Category filter --}}
                <div class="cert-filter-bar clip-animation" data-duration="1.2">
                  <button class="cert-filter-btn active" data-cat="all">{{ __('portfolio.cert_filter_all') }}</button>
                  <button class="cert-filter-btn" data-cat="data-ai">{{ __('portfolio.cert_filter_ai') }}</button>
                  <button class="cert-filter-btn" data-cat="management">{{ __('portfolio.cert_filter_mgmt') }}</button>
                  <button class="cert-filter-btn" data-cat="cloud">{{ __('portfolio.cert_filter_cloud') }}</button>
                </div>

                {{-- Visual image grid — click any card to open lightbox --}}
                <div id="cert-img-grid"
                     class="cert-img-grid clip-animation from-left"
                     data-duration="1.5"
                     data-urls='@json(array_column($certImages, "src"))'>
                  @foreach($certImages as $ci => $cert)
                    <div class="cert-img-card fade-in-scroll"
                         data-category="{{ $cert['category'] }}"
                         onclick="portfolioLightbox.openCerts({{ $ci }})"
                         title="{{ $cert['title'] }}">
                      <div class="cert-img-wrap">
                        <img src="{{ $cert['src'] }}"
                             alt="{{ $cert['title'] }}"
                             loading="lazy">
                        <div class="cert-img-overlay">
                          <i class="fa-solid fa-magnifying-glass-plus"></i>
                        </div>
                      </div>
                      <div class="cert-img-title">{{ $cert['title'] }}</div>
                      @if($cert['year'])
                        <div class="cert-img-year">{{ $cert['year'] }}</div>
                      @endif
                    </div>
                  @endforeach
                </div>
              @else
                {{-- Fallback: text-based cert cards if no images found --}}
                @php
                  $textCerts = [
                    ['cert1_name','cert1_issuer','cert1_date','fa-brands fa-google'],
                    ['cert2_name','cert2_issuer','cert2_date','fa-brands fa-google'],
                    ['cert3_name','cert3_issuer','cert3_date','fa-solid fa-university'],
                    ['cert4_name','cert4_issuer','cert4_date','fa-solid fa-globe'],
                    ['cert5_name','cert5_issuer','cert5_date','fa-solid fa-users'],
                    ['cert6_name','cert6_issuer','cert6_date','fa-brands fa-google'],
                    ['cert7_name','cert7_issuer','cert7_date','fa-brands fa-ibm'],
                    ['cert8_name','cert8_issuer','cert8_date','fa-solid fa-language'],
                  ];
                @endphp
                <div class="cert-grid clip-animation from-left" data-duration="1.5">
                  @foreach($textCerts as $cert)
                    <div class="cert-card">
                      <div class="cert-icon"><i class="{{ $cert[3] }}"></i></div>
                      <div class="cert-info">
                        <h6>{{ __('portfolio.' . $cert[0]) }}</h6>
                        <span>{{ __('portfolio.' . $cert[1]) }}</span>
                        <span class="cert-date">{{ __('portfolio.' . $cert[2]) }}</span>
                      </div>
                    </div>
                  @endforeach
                </div>
              @endif
            </section>
