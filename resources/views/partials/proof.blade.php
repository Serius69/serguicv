            {{-- ══════════════════════════════════════════════════════════
                 VISUAL PROOF — BI Dashboards & Data Outputs
            ══════════════════════════════════════════════════════════ --}}
            @php
              $biKap   = $projectImages['proj2'];
              $biTrom  = $projectImages['proj12'];
              $proofImgs = array_merge($biKap['images'], $biTrom['images']);
            @endphp
            @if(count($proofImgs) > 0)
            <section id="proof">
              <div class="spacer-75"></div>
              <div class="section-title page-caption">
                <h5>{{ app()->getLocale() === 'en' ? 'Visual Proof' : 'Resultados Visuales' }}</h5>
                <div class="zigzag">
                  <hr class="left"><hr class="right">
                  @include('partials.zigzag')
                </div>
              </div>
              <div class="spacer-15"></div>
              <p class="proof-subtitle">
                {{ app()->getLocale() === 'en'
                   ? 'Real outputs from production systems. Power BI dashboards and data pipelines built for Kapitalya and Tromay — not mockups.'
                   : 'Salidas reales de sistemas en producción. Dashboards de Power BI y pipelines de datos construidos para Kapitalya y Tromay — no son maquetas.' }}
              </p>
              <div class="spacer-45"></div>

              <div class="proof-gallery clip-animation from-left" data-duration="1.5">
                @foreach(array_slice($proofImgs, 0, 9) as $pi => $pImg)
                  @php $srcLabel = $pi < count($biKap['images']) ? 'Kapitalya BI' : 'Tromay BI'; @endphp
                  <div class="proof-item fade-in-scroll"
                       onclick="portfolioLightbox.open({{ Js::from($proofImgs) }}, {{ $pi }})">
                    <img src="{{ $pImg }}" loading="lazy" alt="{{ $srcLabel }} dashboard">
                    <div class="proof-item-overlay">
                      <div>
                        <span class="proof-item-tag">{{ $srcLabel }}</span>
                        <span class="proof-item-label">
                          {{ app()->getLocale() === 'en' ? 'Click to zoom' : 'Clic para ampliar' }}
                        </span>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>

              @if(count($proofImgs) > 9)
                <div class="proof-view-all">
                  <button class="view-gallery-btn"
                          onclick="portfolioLightbox.open({{ Js::from($proofImgs) }}, 9)">
                    <i class="fa-solid fa-images"></i>
                    {{ app()->getLocale() === 'en'
                       ? 'View all ' . count($proofImgs) . ' outputs'
                       : 'Ver todos los ' . count($proofImgs) . ' outputs' }}
                  </button>
                </div>
              @endif
            </section>
            @endif
