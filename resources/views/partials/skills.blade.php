            {{-- ══════════════════════════════════════════════════════════
                 SKILLS
            ══════════════════════════════════════════════════════════ --}}
            <section id="skills">
              <div class="spacer-75"></div>
              <div class="section-title page-caption">
                <h5>{{ __('portfolio.skills_title') }}</h5>
                <div class="zigzag">
                  <hr class="left"><hr class="right">
                  @include('partials.zigzag')
                </div>
              </div>
              <div class="spacer-45"></div>

              <div class="skills">

                {{-- ── 1. RESUMEN DE HABILIDADES — Radar + Tech Stack ──── --}}
                <div class="skills-chart-row classic-animation" data-delay=".2">
                  <p class="radar-caption">{{ __('portfolio.skills_overview') }}</p>
                  <div class="skills-chart-inner">
                    <div class="radar-wrap">
                      @php
                        $radarLabels = app()->getLocale() === 'en'
                          ? 'Python / ML|Power BI / DAX|Django / Laravel|SQL / Databases|Financial Systems|Data Analytics'
                          : 'Python / ML|Power BI / DAX|Django / Laravel|SQL / Bases de Datos|Sistemas Financieros|Analítica de Datos';
                      @endphp
                      <canvas id="skillsRadar"
                              aria-label="Skills radar chart"
                              data-labels="{{ $radarLabels }}"></canvas>
                    </div>
                    <ul class="radar-stats-list">
                      @foreach([
                        ['Python / ML',          85],
                        ['Power BI / DAX',        90],
                        ['Django / Laravel',      85],
                        ['SQL / Databases',       85],
                        ['Financial Systems',     88],
                        ['Data Analytics',        87],
                      ] as [$skill, $pct])
                        <li class="radar-stat-item">
                          <span class="radar-stat-name">{{ $skill }}</span>
                          <div class="radar-stat-bar">
                            <div class="radar-stat-fill" style="width:{{ $pct }}%"></div>
                          </div>
                          <span class="radar-stat-pct">{{ $pct }}%</span>
                        </li>
                      @endforeach
                    </ul>
                  </div>
                </div>

                <div class="spacer-45"></div>

                <div class="skills-tech-section fade-in-scroll">
                  <p class="skills-tech-title">Technology Stack</p>
                  <div class="skill-groups-grid">

                    <div class="skill-group-card">
                      <div class="skill-group-header">
                        <span class="skill-group-icon">🤖</span>
                        {{ app()->getLocale() === 'en' ? 'AI & Data Science' : 'IA & Ciencia de Datos' }}
                      </div>
                      <div class="skill-chips">
                        <span class="skill-chip" title="Lenguaje de programación principal para Machine Learning, Data Science y automatización"><i class="di devicon-python-plain colored"></i> Python</span>
                        <span class="skill-chip" title="Librería de deep learning para construir y entrenar redes neuronales"><i class="di devicon-pytorch-plain colored"></i> PyTorch</span>
                        <span class="skill-chip" title="Librería de Machine Learning con algoritmos de clasificación, regresión y clustering"><span class="chip-emoji">📊</span> scikit-learn</span>
                        <span class="skill-chip" title="Librería estadística para modelos de series de tiempo como ARIMA y análisis econométrico"><span class="chip-emoji">📈</span> statsmodels</span>
                        <span class="skill-chip" title="Librería para manipulación y análisis de datos tabulares (como Excel pero programático)"><i class="di devicon-pandas-plain colored"></i> pandas</span>
                        <span class="skill-chip" title="Librería para cálculo numérico de alta performance, base de todo el ecosistema científico Python"><span class="chip-emoji">🔢</span> NumPy</span>
                        <span class="skill-chip" title="Herramienta de Microsoft para crear dashboards e informes de inteligencia de negocios interactivos"><span class="chip-emoji">📉</span> Power BI</span>
                        <span class="skill-chip" title="Técnica estadística que simula miles de escenarios aleatorios para estimar riesgos y probabilidades"><span class="chip-emoji">🎲</span> Monte Carlo</span>
                      </div>
                    </div>

                    <div class="skill-group-card">
                      <div class="skill-group-header">
                        <span class="skill-group-icon">⚙️</span>
                        {{ app()->getLocale() === 'en' ? 'Backend & Web' : 'Backend & Web' }}
                      </div>
                      <div class="skill-chips">
                        <span class="skill-chip" title="Framework web Python (con Django REST Framework / DRF) para construir APIs y backends robustos con panel admin incluido"><i class="di devicon-django-plain colored"></i> Django / DRF</span>
                        <span class="skill-chip" title="Librería JavaScript component-based para construir interfaces de usuario; frontend del ERP Kapitalya"><i class="di devicon-react-original colored"></i> React</span>
                        <span class="skill-chip" title="Framework PHP para desarrollo web rápido con sintaxis elegante y ecosistema maduro"><i class="di devicon-laravel-plain colored"></i> Laravel</span>
                        <span class="skill-chip" title="Lenguaje de programación orientado a objetos ampliamente usado en sistemas empresariales"><i class="di devicon-java-plain colored"></i> Java</span>
                        <span class="skill-chip" title="Framework Java para construir microservicios y APIs REST de alto rendimiento"><i class="di devicon-spring-plain colored"></i> Spring Boot</span>
                        <span class="skill-chip" title="Lenguaje de scripting del lado del servidor, base de Laravel y muchos CMS como WordPress"><i class="di devicon-php-plain colored"></i> PHP</span>
                        <span class="skill-chip" title="Framework frontend JavaScript de Google para construir aplicaciones web de una sola página"><i class="di devicon-angularjs-plain colored"></i> Angular</span>
                        <span class="skill-chip" title="Sistema de bases de datos relacionales, ideal para aplicaciones web y reportes transaccionales"><i class="di devicon-mysql-plain colored"></i> MySQL</span>
                        <span class="skill-chip" title="Base de datos relacional avanzada con soporte para JSON, análisis estadístico y alta concurrencia"><i class="di devicon-postgresql-plain colored"></i> PostgreSQL</span>
                        <span class="skill-chip" title="Almacén de datos en memoria para caché, colas y actualizaciones en tiempo real (WebSocket / Celery)"><i class="di devicon-redis-plain colored"></i> Redis</span>
                      </div>
                    </div>

                    <div class="skill-group-card">
                      <div class="skill-group-header">
                        <span class="skill-group-icon">🛠️</span>
                        {{ app()->getLocale() === 'en' ? 'Tools & Infrastructure' : 'Herramientas & Infra' }}
                      </div>
                      <div class="skill-chips">
                        <span class="skill-chip" title="Plataforma de contenedores que empaqueta aplicaciones con todas sus dependencias para despliegue consistente en cualquier entorno"><i class="di devicon-docker-plain colored"></i> Docker</span>
                        <span class="skill-chip" title="Sistema de control de versiones que registra el historial de cambios en el código y permite colaboración en equipo"><i class="di devicon-git-plain colored"></i> Git</span>
                        <span class="skill-chip" title="Plataforma de alojamiento de código con herramientas de colaboración, CI/CD y gestión de proyectos"><i class="di devicon-github-original"></i> GitHub</span>
                        <span class="skill-chip" title="Entorno interactivo de programación Python ideal para análisis de datos, visualizaciones y experimentos de ML"><i class="di devicon-jupyter-plain colored"></i> Jupyter</span>
                        <span class="skill-chip" title="Herramienta de gestión de proyectos ágiles con tableros Kanban, sprints y seguimiento de tareas"><span class="chip-emoji">📋</span> Jira</span>
                        <span class="skill-chip" title="Interfaces de programación que permiten que diferentes sistemas se comuniquen e intercambien datos a través de internet"><span class="chip-emoji">🌐</span> REST APIs</span>
                      </div>
                    </div>

                    <div class="skill-group-card">
                      <div class="skill-group-header">
                        <span class="skill-group-icon">🗣️</span>
                        {{ app()->getLocale() === 'en' ? 'Human Languages' : 'Idiomas' }}
                      </div>
                      <div class="skill-chips">
                        <span class="skill-chip">🇧🇴 {{ __('portfolio.lang_es') }} — {{ __('portfolio.lang_es_level') }}</span>
                        <span class="skill-chip">🇺🇸 {{ __('portfolio.lang_en') }} — {{ __('portfolio.lang_en_level') }}</span>
                        <span class="skill-chip">🇯🇵 {{ __('portfolio.lang_ja') }} — {{ __('portfolio.lang_ja_level') }}</span>
                      </div>
                    </div>

                  </div>
                </div>


            </section>
