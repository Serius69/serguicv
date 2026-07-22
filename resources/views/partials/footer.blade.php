        {{-- Footer --}}
        <footer>
          <div class="container">
            <div class="footer-inner">
              <div class="copyright">
                <p>{{ __('portfolio.footer_copy') }}</p>
              </div>

              {{-- Ecosystem quick links --}}
              <nav class="footer-ecosystem" aria-label="{{ __('portfolio.footer_ecosystem') }}">
                <span class="footer-ecosystem-label">{{ __('portfolio.footer_ecosystem') }}:</span>
                <a href="{{ env('TROMAY_URL', 'https://tromay.kapitalya.com.bo') }}"
                   target="_blank" rel="noopener">Tromay</a>
                <a href="{{ env('FINDEMPROAI_URL', 'https://app.kapitalya.com.bo') }}"
                   target="_blank" rel="noopener">Findempro AI</a>
                <a href="{{ env('FINDEMPROLAREOS_URL', 'https://lacteos.kapitalya.com.bo') }}"
                   target="_blank" rel="noopener">Findempro Lácteos</a>
              </nav>

              <ul class="social">
                <li>
                  <a target="_blank" rel="noopener"
                     href="https://www.linkedin.com/in/sergio-denis-troche-mayta">
                    LinkedIn
                  </a>
                </li>
                <li>
                  <a target="_blank" rel="noopener"
                     href="https://github.com/Serius69">
                    GitHub
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </footer>
