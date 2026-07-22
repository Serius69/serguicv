            {{-- ══════════════════════════════════════════════════════════
                 CONTACT
            ══════════════════════════════════════════════════════════ --}}
            <section class="contact" id="contact">
              <div class="spacer-75"></div>
              <div class="section-title page-caption">
                <h5>{{ __('portfolio.contact_title') }}</h5>
                <div class="zigzag">
                  <hr class="left"><hr class="right">
                  @include('partials.zigzag')
                </div>
              </div>
              <div class="spacer-45"></div>

              <div class="row">

                {{-- Contact info column --}}
                <div class="col-xl-5 scale-animation" data-delay="0.5" data-duration="2">

                  {{-- Collaboration CTA card --}}
                  <div style="background:var(--kap-primary,#1a1f3a);color:#fff;border-radius:12px;padding:20px 24px;margin-bottom:24px;">
                    <h3 style="font-size:16px;font-weight:700;margin-bottom:8px;">¿Interesado en colaborar?</h3>
                    <p style="font-size:13px;opacity:0.85;margin-bottom:12px;line-height:1.6;">
                      Estoy disponible para proyectos de Data Science, Machine Learning y desarrollo de sistemas financieros.
                    </p>
                    <a href="mailto:sergio.denis.troche.mayta@gmail.com" style="display:inline-block;background:var(--kap-gold,#f59e0b);color:#1a1f3a;padding:8px 16px;border-radius:8px;font-weight:600;font-size:13px;text-decoration:none;">
                      Enviar mensaje
                    </a>
                  </div>

                  <div class="contact-avail">
                    <i class="fa-solid fa-circle contact-avail-dot"></i>
                    {{ __('portfolio.contact_avail_v') }}
                  </div>

                  <div class="contact-info email">
                    <p class="little-p info-title">{{ __('portfolio.contact_write') }}</p>
                    <a href="mailto:sergio.denis.troche.mayta@gmail.com">
                      sergio.denis.troche.mayta@gmail.com
                    </a>
                  </div>

                  <div class="contact-info contact-info--wa">
                    <p class="little-p info-title">WhatsApp</p>
                    <a href="https://wa.me/59178939071" target="_blank" rel="noopener"
                       class="contact-wa-link">
                      <i class="fa-brands fa-whatsapp contact-wa-icon"></i>
                      +591 78939071
                    </a>
                  </div>

                  <div class="contact-info address">
                    <p class="little-p info-title">{{ __('portfolio.contact_location') }}</p>
                    <p>{{ __('portfolio.contact_location_v') }}</p>
                  </div>

                  <div class="contact-info social">
                    <p class="little-p info-title">{{ __('portfolio.contact_follow') }}</p>
                    <div class="contact-social-row">
                      <a href="https://www.linkedin.com/in/sergio-denis-troche-mayta"
                         target="_blank" rel="noopener"
                         class="contact-social-btn btn-linkedin">
                        <i class="fa-brands fa-linkedin"></i> LinkedIn
                      </a>
                      <a href="https://github.com/Serius69"
                         target="_blank" rel="noopener"
                         class="contact-social-btn btn-github">
                        <i class="fa-brands fa-github"></i> GitHub
                      </a>
                      <a href="https://wa.me/59178939071"
                         target="_blank" rel="noopener"
                         class="contact-social-btn btn-whatsapp">
                        <i class="fa-brands fa-whatsapp"></i> WhatsApp
                      </a>
                      <a href="mailto:sergio.denis.troche.mayta@gmail.com"
                         class="contact-social-btn btn-email">
                        <i class="fa-solid fa-at"></i> Email
                      </a>
                    </div>
                  </div>
                </div>

                {{-- Contact form column --}}
                <div class="col-xl-6 offset-xl-1 scale-animation" data-delay="0.7" data-duration="2">
                  <div id="contact-formular">
                    <p class="little-p info-title contact-form-label">
                      {{ app()->getLocale() === 'en' ? 'Or fill this form' : 'O llena este formulario' }}
                    </p>

                    @if(session('success'))
                      <div class="alert-success" role="alert">
                        <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                        {{ session('success') }}
                      </div>
                    @endif
                    @if(session('error'))
                      <div class="alert-error" role="alert">
                        <i class="fa-solid fa-circle-exclamation" aria-hidden="true"></i>
                        {{ session('error') }}
                        <a href="mailto:sergio.denis.troche.mayta@gmail.com" class="alert-error-link">
                          sergio.denis.troche.mayta@gmail.com
                        </a>
                      </div>
                    @endif

                    <form method="POST" action="{{ route('contact.send') }}"
                          id="contactform" autocomplete="off">
                      {{-- Sin @csrf: la ruta está exenta (el page-cache serviría un
                           token de otra sesión → 419). Compensado con honeypot+throttle. --}}
                      <input type="hidden" name="lang" value="{{ app()->getLocale() }}">

                      {{-- Honeypot anti-spam: oculto para humanos, los bots lo llenan --}}
                      <div style="position:absolute;left:-9999px;opacity:0;height:0;overflow:hidden" aria-hidden="true">
                        <label for="f-website">Website</label>
                        <input id="f-website" name="website" type="text" tabindex="-1" autocomplete="off">
                      </div>

                      <div class="float-field">
                        <input class="inp @error('name') is-invalid @enderror"
                               id="f-name" name="name" type="text"
                               placeholder=" "
                               required aria-required="true"
                               @error('name') aria-invalid="true" aria-describedby="f-name-error" @enderror
                               value="{{ old('name') }}">
                        <label for="f-name">{{ __('portfolio.form_name') }}</label>
                        @error('name')<span id="f-name-error" class="field-error" role="alert">{{ $message }}</span>@enderror
                      </div>

                      <div class="float-field">
                        <input class="inp @error('email') is-invalid @enderror"
                               id="f-email" name="email" type="email"
                               placeholder=" "
                               required aria-required="true"
                               @error('email') aria-invalid="true" aria-describedby="f-email-error" @enderror
                               value="{{ old('email') }}">
                        <label for="f-email">{{ __('portfolio.form_email') }}</label>
                        @error('email')<span id="f-email-error" class="field-error" role="alert">{{ $message }}</span>@enderror
                      </div>

                      <div class="float-field">
                        <input class="inp"
                               id="f-company" name="company" type="text"
                               placeholder=" "
                               value="{{ old('company') }}">
                        <label for="f-company">{{ __('portfolio.form_company') }}</label>
                      </div>

                      <div class="float-field">
                        <textarea class="inp @error('message') is-invalid @enderror"
                                  id="f-message" name="message" rows="5"
                                  placeholder=" "
                                  required aria-required="true"
                                  @error('message') aria-invalid="true" aria-describedby="f-message-error" @enderror>{{ old('message') }}</textarea>
                        <label for="f-message">{{ __('portfolio.form_message') }}</label>
                        @error('message')<span id="f-message-error" class="field-error" role="alert">{{ $message }}</span>@enderror
                      </div>

                      <div class="form-btn">
                        <button class="site-btn" type="submit">
                          <i class="fa-solid fa-paper-plane form-submit-icon" aria-hidden="true"></i>
                          {{ __('portfolio.form_send') }}
                        </button>
                      </div>
                    </form>
                  </div>
                </div>

              </div>{{-- .row --}}
            </section>
