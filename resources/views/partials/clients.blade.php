            {{-- ══════════════════════════════════════════════════════════
                 CLIENTS WORKED WITH
            ══════════════════════════════════════════════════════════ --}}
            @php
              $clientLogos = [
                ['Balance Pro Logo.png',   'Balance Pro'],
                ['Logo Tromay.png',        'Tromay'],
                ['cni logo-04.png',        'CNI Bolivia'],
                ['asfilogo.png',           'ASFI'],
                ['upblogofullhd.png',      'UPB'],
                ['uiflogo.png',            'UIF Bolivia'],
              ];
            @endphp
            <section id="clients" class="clients-section">
              <div class="spacer-75"></div>
              <p class="clients-label">
                {{ app()->getLocale() === 'en' ? 'Worked with & built for' : 'Trabajé con y construí para' }}
              </p>
              <div class="clients-strip clip-animation from-left" data-duration="1.5">
                @foreach($clientLogos as $logo)
                  @php $lPath = public_path('images/clients/' . $logo[0]); @endphp
                  @if(file_exists($lPath))
                    <img class="client-logo"
                         src="{{ asset('images/clients/' . $logo[0]) }}"
                         alt="{{ $logo[1] }}"
                         title="{{ $logo[1] }}"
                         loading="lazy">
                  @endif
                @endforeach
              </div>
            </section>
