            <header id="fixed">
              <button
                type="button"
                class="hamburger hamburger--elastic"
                aria-label="{{ __('portfolio.nav_open_menu') }}"
                aria-expanded="false"
                aria-controls="main-nav-list"
              >
                <span class="hamburger-box" aria-hidden="true"><span class="hamburger-inner"></span></span>
              </button>
              <nav aria-label="{{ __('portfolio.nav_label') }}">
                <ul id="main-nav-list">
                  <li><a class="active" href="#home">{{ __('portfolio.nav_home') }}</a></li>
                  <li><a href="#about">{{ __('portfolio.nav_about') }}</a></li>
                  <li><a href="#portfolio">{{ __('portfolio.nav_projects') }}</a></li>
                  <li><a href="#skills">{{ __('portfolio.nav_skills') }}</a></li>
                  <li><a href="#resume">{{ __('portfolio.nav_experience') }}</a></li>
                  <li><a href="#ecosystem">{{ __('portfolio.nav_ecosystem') }}</a></li>
                  <li><a href="#contact">{{ __('portfolio.nav_contact') }}</a></li>
                </ul>
              </nav>
              <div class="nav-extras">
                <a href="https://kapitalya.com.bo" class="btn-hub" title="Ecosistema Kapitalya" aria-label="Ir al Hub Kapitalya">
                  <i class="fa-solid fa-globe nav-dl-icon"></i>Hub
                </a>
                <button id="theme-toggle-btn" class="theme-toggle" aria-label="Switch to light mode" title="Toggle theme">
                  <i class="fa-solid fa-sun"></i>
                </button>
                <a href="{{ __('portfolio.nav_lang_url') }}" class="lang-toggle">
                  {{ __('portfolio.nav_lang') }}
                </a>
                <a href="{{ route('cv.download') }}" class="btn-cv">
                  <i class="fa-solid fa-download nav-dl-icon"></i>{{ __('portfolio.nav_download_cv') }}
                </a>
              </div>
            </header>
