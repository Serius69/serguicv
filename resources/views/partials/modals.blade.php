{{-- ══════════════════════════════════════════════════════════════════════
     CASE STUDY MODALS
══════════════════════════════════════════════════════════════════════ --}}

{{-- Modal 1: Kapitalya Forex AI --}}
<div class="case-modal" id="modal-proj1" role="dialog" aria-modal="true">
  <div class="modal-header">
    <div class="modal-header-left">
      <span class="modal-cat-tag">Machine Learning · Fintech</span>
      <h3>Kapitalya Forex AI</h3>
    </div>
    <button type="button" class="modal-close-btn modal-close-btn" aria-label="Cerrar">✕</button>
  </div>

  <div class="modal-section-label">The Problem</div>
  <p class="modal-text">Manual FX pricing was slow, inconsistent, and left significant margin on the table. Rate updates required constant manual intervention, making real-time market arbitrage impossible.</p>

  <div class="modal-section-label">The Solution</div>
  <p class="modal-text">Built an end-to-end intelligent trading system: automated web scraping of BCB reference rates and parallel digital-dollar markets, fed into an ML ensemble (Prophet, LSTM, XGBoost, ARIMA) that predicts optimal spread levels, plus multi-source arbitrage detection (cross-source, triangular, BCB premium). A Django-powered dashboard gives operators real-time override control with full audit trail.</p>

  <div class="modal-section-label">Impact</div>
  <div class="modal-impact-grid">
    <div class="modal-metric"><span class="modal-metric-val">40%</span><span class="modal-metric-lbl">Manual ops reduced</span></div>
    <div class="modal-metric"><span class="modal-metric-val">5%</span><span class="modal-metric-lbl">Avg margin per transaction</span></div>
    <div class="modal-metric"><span class="modal-metric-val">Real-time</span><span class="modal-metric-lbl">Rate updates</span></div>
    <div class="modal-metric"><span class="modal-metric-val">100%</span><span class="modal-metric-lbl">Regulatory compliant</span></div>
  </div>

  <div class="modal-section-label">Stack</div>
  <div class="modal-tech-list">
    <span class="modal-tech-tag">Python</span>
    <span class="modal-tech-tag">Prophet / XGBoost / LSTM</span>
    <span class="modal-tech-tag">Django</span>
    <span class="modal-tech-tag">PostgreSQL</span>
    <span class="modal-tech-tag">BeautifulSoup</span>
    <span class="modal-tech-tag">Pandas</span>
    <span class="modal-tech-tag">Celery</span>
  </div>

  <div class="modal-links">
    <a href="{{ __('portfolio.proj1_url') }}" target="_blank" rel="noopener noreferrer" class="modal-link-btn primary">
      <i class="fa-solid fa-arrow-up-right-from-square"></i> Live System
    </a>
    <a href="https://github.com/Serius69" target="_blank" rel="noopener" class="modal-link-btn secondary">
      <i class="fa-brands fa-github"></i> GitHub
    </a>
  </div>
</div>

{{-- Modal 2: Kapitalya BI System --}}
<div class="case-modal" id="modal-proj2" role="dialog" aria-modal="true">
  <div class="modal-header">
    <div class="modal-header-left">
      <span class="modal-cat-tag">Business Intelligence · Power BI</span>
      <h3>Kapitalya BI System</h3>
    </div>
    <button class="modal-close-btn" aria-label="Close">✕</button>
  </div>

  <div class="modal-section-label">The Problem</div>
  <p class="modal-text">Financial data was fragmented across spreadsheets and the ERP. Executives had no real-time visibility into cash flow, spread performance, or operator productivity — reports took hours to compile manually.</p>

  <div class="modal-section-label">The Solution</div>
  <p class="modal-text">Designed a complete BI pipeline: ETL processes extract data from the internal ERP and external market sources, loaded into a star-schema data model with 40+ DAX measures. 15 interactive Power BI dashboards deliver live KPI monitoring with drill-through to transaction-level detail.</p>

  <div class="modal-impact-grid">
    <div class="modal-metric"><span class="modal-metric-val">15</span><span class="modal-metric-lbl">Dashboards built</span></div>
    <div class="modal-metric"><span class="modal-metric-val">40+</span><span class="modal-metric-lbl">DAX measures</span></div>
    <div class="modal-metric"><span class="modal-metric-val">50%</span><span class="modal-metric-lbl">Faster reporting</span></div>
    <div class="modal-metric"><span class="modal-metric-val">10+</span><span class="modal-metric-lbl">KPIs monitored</span></div>
  </div>

  <div class="modal-section-label">Stack</div>
  <div class="modal-tech-list">
    <span class="modal-tech-tag">Power BI</span>
    <span class="modal-tech-tag">DAX</span>
    <span class="modal-tech-tag">MySQL</span>
    <span class="modal-tech-tag">Python ETL</span>
    <span class="modal-tech-tag">ERP Integration</span>
  </div>

  <div class="modal-links">
    <a href="{{ __('portfolio.proj2_url') }}" target="_blank" rel="noopener noreferrer" class="modal-link-btn primary">
      <i class="fa-solid fa-arrow-up-right-from-square"></i> Visit Kapitalya
    </a>
    <a href="https://github.com/Serius69" target="_blank" rel="noopener" class="modal-link-btn secondary">
      <i class="fa-brands fa-github"></i> GitHub
    </a>
  </div>
</div>

{{-- Modal 3: Findempro AI --}}
<div class="case-modal" id="modal-proj3" role="dialog" aria-modal="true">
  <div class="modal-header">
    <div class="modal-header-left">
      <span class="modal-cat-tag">AI · Simulation · SME Platform</span>
      <h3>Findempro AI — Scalable SME Platform</h3>
    </div>
    <button class="modal-close-btn" aria-label="Close">✕</button>
  </div>

  <div class="modal-section-label">The Problem</div>
  <p class="modal-text">Small and medium enterprises in Bolivia make financial decisions based on intuition rather than data. Demand volatility and lack of forecasting tools lead to overstock, stockouts, and poor cash flow management.</p>

  <div class="modal-section-label">The Solution</div>
  <p class="modal-text">Designed a scalable simulation engine using probabilistic density functions and a custom discrete-event engine (topological equation solving, NumPy-vectorized with an optional CuPy GPU backend). SME operators input historical sales data; the platform generates multiple demand scenarios with confidence intervals, enabling data-driven inventory and financial decisions. Architecture supports horizontal expansion across sectors. Defended as an undergraduate thesis with a 97/100 grade.</p>

  <div class="modal-impact-grid">
    <div class="modal-metric"><span class="modal-metric-val">85%</span><span class="modal-metric-lbl">Simulation accuracy</span></div>
    <div class="modal-metric"><span class="modal-metric-val">97/100</span><span class="modal-metric-lbl">Thesis grade</span></div>
    <div class="modal-metric"><span class="modal-metric-val">N+1</span><span class="modal-metric-lbl">Sectors scalable</span></div>
  </div>

  <div class="modal-section-label">Stack</div>
  <div class="modal-tech-list">
    <span class="modal-tech-tag">Python</span>
    <span class="modal-tech-tag">Django</span>
    <span class="modal-tech-tag">NumPy / SciPy</span>
    <span class="modal-tech-tag">CuPy (GPU)</span>
    <span class="modal-tech-tag">PostgreSQL</span>
    <span class="modal-tech-tag">Chart.js</span>
  </div>

  <div class="modal-links">
    <a href="{{ env('FINDEMPROAI_URL', 'https://app.kapitalya.com.bo') }}" target="_blank" rel="noopener noreferrer" class="modal-link-btn primary">
      <i class="fa-solid fa-arrow-up-right-from-square"></i> Live App
    </a>
    <a href="https://github.com/Serius69" target="_blank" rel="noopener" class="modal-link-btn secondary">
      <i class="fa-brands fa-github"></i> GitHub
    </a>
  </div>
</div>

{{-- Modal 4: CNI Bolivia --}}
<div class="case-modal" id="modal-proj4" role="dialog" aria-modal="true">
  <div class="modal-header">
    <div class="modal-header-left">
      <span class="modal-cat-tag">Full Stack · Web Platform</span>
      <h3>CNI Bolivia — Institutional Platform</h3>
    </div>
    <button class="modal-close-btn" aria-label="Close">✕</button>
  </div>

  <div class="modal-section-label">The Problem</div>
  <p class="modal-text">Bolivia's National Chamber of Industries (CNI) had no centralised web presence. Industrial sector information was scattered, inaccessible to members, and required costly manual distribution.</p>

  <div class="modal-section-label">The Solution</div>
  <p class="modal-text">Delivered a production Laravel web platform in 3 months: structured content architecture, search functionality, member-facing dashboards, and an admin CMS. Agile sprints with weekly stakeholder demos kept delivery on schedule and under budget.</p>

  <div class="modal-impact-grid">
    <div class="modal-metric"><span class="modal-metric-val">30%</span><span class="modal-metric-lbl">Faster info access</span></div>
    <div class="modal-metric"><span class="modal-metric-val">10%</span><span class="modal-metric-lbl">Operational cost cut</span></div>
    <div class="modal-metric"><span class="modal-metric-val">3mo</span><span class="modal-metric-lbl">Delivery time</span></div>
  </div>

  <div class="modal-section-label">Stack</div>
  <div class="modal-tech-list">
    <span class="modal-tech-tag">Laravel</span>
    <span class="modal-tech-tag">PHP</span>
    <span class="modal-tech-tag">MySQL</span>
    <span class="modal-tech-tag">Bootstrap</span>
    <span class="modal-tech-tag">JavaScript</span>
    <span class="modal-tech-tag">Agile / Scrum</span>
  </div>

  <div class="modal-links">
    <a href="{{ __('portfolio.proj4_url') }}" target="_blank" rel="noopener noreferrer" class="modal-link-btn primary">
      <i class="fa-solid fa-arrow-up-right-from-square"></i> Visit CNI Bolivia
    </a>
    <a href="https://github.com/Serius69" target="_blank" rel="noopener" class="modal-link-btn secondary">
      <i class="fa-brands fa-github"></i> GitHub
    </a>
  </div>
</div>

{{-- Modal 5: Smart Irrigation --}}
<div class="case-modal" id="modal-proj5" role="dialog" aria-modal="true">
  <div class="modal-header">
    <div class="modal-header-left">
      <span class="modal-cat-tag">IoT · Automation</span>
      <h3>PlantFire — Smart Irrigation System</h3>
    </div>
    <button class="modal-close-btn" aria-label="Close">✕</button>
  </div>

  <div class="modal-section-label">The Problem</div>
  <p class="modal-text">Traditional irrigation in high-altitude Bolivian agriculture wastes water through fixed schedules that ignore actual soil moisture, climate conditions, and plant needs — leading to both overwatering and crop stress.</p>

  <div class="modal-section-label">The Solution</div>
  <p class="modal-text">Built an end-to-end IoT system: Arduino-based sensor array (soil moisture, temperature, humidity) feeds real-time data to a Vue.js monitoring dashboard. Automated valve control triggers irrigation only when conditions require it. Remote override available via mobile web app.</p>

  <div class="modal-impact-grid">
    <div class="modal-metric"><span class="modal-metric-val">100%</span><span class="modal-metric-lbl">Automated control</span></div>
    <div class="modal-metric"><span class="modal-metric-val">Real-time</span><span class="modal-metric-lbl">Sensor monitoring</span></div>
    <div class="modal-metric"><span class="modal-metric-val">Remote</span><span class="modal-metric-lbl">Web dashboard</span></div>
  </div>

  <div class="modal-section-label">Stack</div>
  <div class="modal-tech-list">
    <span class="modal-tech-tag">Arduino</span>
    <span class="modal-tech-tag">Python</span>
    <span class="modal-tech-tag">Vue.js</span>
    <span class="modal-tech-tag">MQTT</span>
    <span class="modal-tech-tag">SQLite</span>
    <span class="modal-tech-tag">REST API</span>
  </div>

  <div class="modal-links">
    <a href="{{ __('portfolio.proj5_url') }}" target="_blank" rel="noopener noreferrer" class="modal-link-btn secondary">
      <i class="fa-brands fa-github"></i> GitHub
    </a>
  </div>
</div>

{{-- Modal 6: Findempro Dairy --}}
<div class="case-modal" id="modal-proj6" role="dialog" aria-modal="true">
  <div class="modal-header">
    <div class="modal-header-left">
      <span class="modal-cat-tag">AI · Dairy Industry · Thesis Project</span>
      <h3>Findempro — Dairy Sector Decision System</h3>
    </div>
    <button class="modal-close-btn" aria-label="Close">✕</button>
  </div>

  <div class="modal-section-label">The Problem</div>
  <p class="modal-text">Dairy SMEs in Bolivia face extreme demand volatility driven by seasonal factors, school calendars, and regional purchasing patterns. Without forecasting tools, businesses routinely over-produce perishable goods or miss peak demand windows.</p>

  <div class="modal-section-label">The Solution</div>
  <p class="modal-text">Undergraduate thesis project defended with a 97/100 grade and validated at 85% accuracy: models demand using Beta, Gamma, and Normal probability density functions fitted to historical sales data. Discrete-event Monte Carlo simulation generates 1,000+ scenarios per run, outputting optimal inventory levels and financial projections with confidence intervals.</p>

  <div class="modal-impact-grid">
    <div class="modal-metric"><span class="modal-metric-val">97/100</span><span class="modal-metric-lbl">Thesis grade</span></div>
    <div class="modal-metric"><span class="modal-metric-val">85%</span><span class="modal-metric-lbl">Model precision</span></div>
    <div class="modal-metric"><span class="modal-metric-val">1000+</span><span class="modal-metric-lbl">Scenarios per run</span></div>
    <div class="modal-metric"><span class="modal-metric-val">3</span><span class="modal-metric-lbl">PDF distributions</span></div>
  </div>

  <div class="modal-section-label">Stack</div>
  <div class="modal-tech-list">
    <span class="modal-tech-tag">Python</span>
    <span class="modal-tech-tag">Django</span>
    <span class="modal-tech-tag">SciPy</span>
    <span class="modal-tech-tag">NumPy</span>
    <span class="modal-tech-tag">Pandas</span>
    <span class="modal-tech-tag">MySQL</span>
    <span class="modal-tech-tag">JavaScript</span>
  </div>

  <div class="modal-links">
    <a href="{{ env('FINDEMPROLAREOS_URL', 'https://lacteos.kapitalya.com.bo') }}" target="_blank" rel="noopener noreferrer" class="modal-link-btn primary">
      <i class="fa-solid fa-arrow-up-right-from-square"></i> Live App
    </a>
    <a href="https://github.com/Serius69" target="_blank" rel="noopener" class="modal-link-btn secondary">
      <i class="fa-brands fa-github"></i> GitHub
    </a>
  </div>
</div>

{{-- Modal 7: ARIMA Dólar Paralelo --}}
<div class="case-modal" id="modal-proj7" role="dialog" aria-modal="true">
  <div class="modal-header">
    <div class="modal-header-left">
      <span class="modal-cat-tag">Time Series · Fintech · Python</span>
      <h3>ARIMA: Parallel Dollar Forecasting — Bolivia</h3>
    </div>
    <button class="modal-close-btn" aria-label="Close">✕</button>
  </div>

  <div class="modal-section-label">The Problem</div>
  <p class="modal-text">Bolivia's parallel FX market (dólar paralelo) operates with high volatility and limited transparency. Businesses and individuals had no data-driven way to anticipate rate movements, leading to poor conversion decisions and avoidable losses.</p>

  <div class="modal-section-label">The Solution</div>
  <p class="modal-text">Built a complete time-series forecasting pipeline using ARIMA models fitted to 64,717+ historical parallel-rate quotes. The system automatically identifies optimal ARIMA parameters (p,d,q), validates with AIC/BIC criteria, and generates 14-day forward predictions with confidence intervals. Integrated with a Django API for real-time consumption and an automated alert system for threshold breaches.</p>

  <div class="modal-impact-grid">
    <div class="modal-metric"><span class="modal-metric-val">14d</span><span class="modal-metric-lbl">Forecast horizon</span></div>
    <div class="modal-metric"><span class="modal-metric-val">64.7k+</span><span class="modal-metric-lbl">Historical quotes</span></div>
    <div class="modal-metric"><span class="modal-metric-val">REST</span><span class="modal-metric-lbl">Django API</span></div>
    <div class="modal-metric"><span class="modal-metric-val">Alert</span><span class="modal-metric-lbl">Threshold system</span></div>
  </div>

  <div class="modal-section-label">Stack</div>
  <div class="modal-tech-list">
    <span class="modal-tech-tag">Python</span>
    <span class="modal-tech-tag">statsmodels ARIMA</span>
    <span class="modal-tech-tag">pandas</span>
    <span class="modal-tech-tag">Django REST</span>
    <span class="modal-tech-tag">Jupyter Notebook</span>
    <span class="modal-tech-tag">matplotlib</span>
  </div>

  <div class="modal-links">
    <a href="https://github.com/Serius69/dolar-paralelo-bolivia-arima" target="_blank" rel="noopener" class="modal-link-btn primary">
      <i class="fa-brands fa-github"></i> View on GitHub
    </a>
  </div>
</div>

{{-- Modal 8: Scoring Crediticio --}}
<div class="case-modal" id="modal-proj8" role="dialog" aria-modal="true">
  <div class="modal-header">
    <div class="modal-header-left">
      <span class="modal-cat-tag">Machine Learning · Credit Risk · LATAM</span>
      <h3>Credit Scoring Model — LATAM Fintech</h3>
    </div>
    <button class="modal-close-btn" aria-label="Close">✕</button>
  </div>

  <div class="modal-section-label">The Problem</div>
  <p class="modal-text">Traditional credit scoring in LATAM relies on limited bureau data and subjective human judgment. Fintech lenders need automated, data-driven risk classification that works with thin-file borrowers typical in emerging markets.</p>

  <div class="modal-section-label">The Solution</div>
  <p class="modal-text">Full ML pipeline for credit risk: extensive EDA revealing key risk features, feature engineering for behavioral and financial indicators, class-imbalance handling, and a head-to-head comparison of Random Forest vs Logistic Regression. On the real UCI German Credit proxy (1,000 real labeled applications mapped to a Bolivian schema) the Random Forest reaches AUC 0.78 (68.5% accuracy); on balanced/synthetic data it climbs to ~0.93 AUC. Evaluated with ROC-AUC and a confusion matrix, plus feature-importance explainability for regulatory compliance.</p>

  <div class="modal-impact-grid">
    <div class="modal-metric"><span class="modal-metric-val">0.78</span><span class="modal-metric-lbl">AUC (real data)</span></div>
    <div class="modal-metric"><span class="modal-metric-val">ROC</span><span class="modal-metric-lbl">+ confusion matrix</span></div>
    <div class="modal-metric"><span class="modal-metric-val">RF vs LR</span><span class="modal-metric-lbl">Model comparison</span></div>
    <div class="modal-metric"><span class="modal-metric-val">XAI</span><span class="modal-metric-lbl">Feature importance</span></div>
  </div>

  <div class="modal-section-label">Stack</div>
  <div class="modal-tech-list">
    <span class="modal-tech-tag">Python</span>
    <span class="modal-tech-tag">scikit-learn</span>
    <span class="modal-tech-tag">pandas</span>
    <span class="modal-tech-tag">Random Forest</span>
    <span class="modal-tech-tag">Logistic Regression</span>
    <span class="modal-tech-tag">SMOTE</span>
    <span class="modal-tech-tag">Matplotlib / Seaborn</span>
  </div>

  <div class="modal-links">
    <a href="https://github.com/Serius69" target="_blank" rel="noopener" class="modal-link-btn primary">
      <i class="fa-brands fa-github"></i> View on GitHub
    </a>
  </div>
</div>

{{-- Modal 9: Portafolio Acciones --}}
<div class="case-modal" id="modal-proj9" role="dialog" aria-modal="true">
  <div class="modal-header">
    <div class="modal-header-left">
      <span class="modal-cat-tag">Quantitative Finance · Portfolio Optimization</span>
      <h3>Stock Portfolio Analysis — Bolivia &amp; LATAM</h3>
    </div>
    <button class="modal-close-btn" aria-label="Close">✕</button>
  </div>

  <div class="modal-section-label">The Problem</div>
  <p class="modal-text">Retail investors in Bolivia lack accessible quantitative tools for portfolio construction. Traditional advisors rely on qualitative judgement rather than mathematical risk-return optimization — leaving significant alpha on the table.</p>

  <div class="modal-section-label">The Solution</div>
  <p class="modal-text">Python-based quantitative analysis framework: calculates historical returns, covariance matrix, and applies Modern Portfolio Theory. Implements Sharpe ratio maximization, Historical VaR at multiple confidence levels, and plots the Efficient Frontier via Monte Carlo portfolio simulation. Fully reproducible Jupyter Notebook with public LATAM stock data.</p>

  <div class="modal-impact-grid">
    <div class="modal-metric"><span class="modal-metric-val">Sharpe</span><span class="modal-metric-lbl">Ratio optimization</span></div>
    <div class="modal-metric"><span class="modal-metric-val">VaR</span><span class="modal-metric-lbl">95% & 99% CI</span></div>
    <div class="modal-metric"><span class="modal-metric-val">MPT</span><span class="modal-metric-lbl">Efficient Frontier</span></div>
    <div class="modal-metric"><span class="modal-metric-val">Monte</span><span class="modal-metric-lbl">Carlo simulation</span></div>
  </div>

  <div class="modal-section-label">Stack</div>
  <div class="modal-tech-list">
    <span class="modal-tech-tag">Python</span>
    <span class="modal-tech-tag">pandas</span>
    <span class="modal-tech-tag">NumPy</span>
    <span class="modal-tech-tag">scipy</span>
    <span class="modal-tech-tag">matplotlib</span>
    <span class="modal-tech-tag">yfinance</span>
    <span class="modal-tech-tag">Jupyter</span>
  </div>

  <div class="modal-links">
    <a href="https://github.com/Serius69/portafolio-acciones-bolivia" target="_blank" rel="noopener" class="modal-link-btn primary">
      <i class="fa-brands fa-github"></i> View on GitHub
    </a>
  </div>
</div>

{{-- Modal 10: Microservicios Spring Boot --}}
<div class="case-modal" id="modal-proj10" role="dialog" aria-modal="true">
  <div class="modal-header">
    <div class="modal-header-left">
      <span class="modal-cat-tag">Java · Spring Boot · Microservices Architecture</span>
      <h3>Distributed Microservices — Spring Cloud</h3>
    </div>
    <button class="modal-close-btn" aria-label="Close">✕</button>
  </div>

  <div class="modal-section-label">Architecture Overview</div>
  <p class="modal-text">Production-grade distributed microservices system built with Spring Boot and Spring Cloud. The architecture demonstrates enterprise patterns: service discovery, centralized configuration, API gateway routing, async messaging, and distributed tracing — all containerized with Docker.</p>

  <div class="modal-section-label">Components Built</div>
  <p class="modal-text">8 independent services: API Gateway (routing + load balancing), Eureka Discovery Server, Config Server (centralized properties), individual domain microservices (checkout, product, dashboard), RabbitMQ message consumer, Zipkin tracing, and a high-availability Twitter-like demo with failover.</p>

  <div class="modal-impact-grid">
    <div class="modal-metric"><span class="modal-metric-val">8</span><span class="modal-metric-lbl">Microservices</span></div>
    <div class="modal-metric"><span class="modal-metric-val">HA</span><span class="modal-metric-lbl">High Availability</span></div>
    <div class="modal-metric"><span class="modal-metric-val">MQ</span><span class="modal-metric-lbl">Async messaging</span></div>
    <div class="modal-metric"><span class="modal-metric-val">Zipkin</span><span class="modal-metric-lbl">Distributed tracing</span></div>
  </div>

  <div class="modal-section-label">Stack</div>
  <div class="modal-tech-list">
    <span class="modal-tech-tag">Java 17</span>
    <span class="modal-tech-tag">Spring Boot</span>
    <span class="modal-tech-tag">Spring Cloud</span>
    <span class="modal-tech-tag">Eureka</span>
    <span class="modal-tech-tag">RabbitMQ</span>
    <span class="modal-tech-tag">Docker</span>
    <span class="modal-tech-tag">Zipkin</span>
    <span class="modal-tech-tag">PostgreSQL</span>
    <span class="modal-tech-tag">Redis</span>
  </div>

  <div class="modal-links">
    <a href="https://github.com/Serius69" target="_blank" rel="noopener" class="modal-link-btn primary">
      <i class="fa-brands fa-github"></i> View on GitHub
    </a>
  </div>
</div>

{{-- Modal 11: Kiosko Verde Bolivia --}}
<div class="case-modal" id="modal-proj11" role="dialog" aria-modal="true">
  <div class="modal-header">
    <div class="modal-header-left">
      <span class="modal-cat-tag">Full Stack · Laravel · E-Commerce</span>
      <h3>Kiosko Verde Bolivia — Organic E-Commerce</h3>
    </div>
    <button class="modal-close-btn" aria-label="Close">✕</button>
  </div>

  <div class="modal-section-label">The Project</div>
  <p class="modal-text">Full-featured e-commerce platform for organic and natural products in the Bolivian market. Built end-to-end with Laravel and Blade templating, featuring a product catalog, shopping cart, order management system, and an admin dashboard for inventory and sales tracking.</p>

  <div class="modal-section-label">Features Built</div>
  <p class="modal-text">Product catalog with categories and search, user authentication and profiles, shopping cart with session persistence, order processing and status tracking, admin panel for product/inventory management, and responsive mobile-first UI designed for the local market.</p>

  <div class="modal-impact-grid">
    <div class="modal-metric"><span class="modal-metric-val">Full</span><span class="modal-metric-lbl">E-Commerce platform</span></div>
    <div class="modal-metric"><span class="modal-metric-val">CMS</span><span class="modal-metric-lbl">Admin dashboard</span></div>
    <div class="modal-metric"><span class="modal-metric-val">Auth</span><span class="modal-metric-lbl">User system</span></div>
    <div class="modal-metric"><span class="modal-metric-val">100%</span><span class="modal-metric-lbl">Mobile responsive</span></div>
  </div>

  <div class="modal-section-label">Stack</div>
  <div class="modal-tech-list">
    <span class="modal-tech-tag">PHP</span>
    <span class="modal-tech-tag">Laravel</span>
    <span class="modal-tech-tag">Blade</span>
    <span class="modal-tech-tag">MySQL</span>
    <span class="modal-tech-tag">Bootstrap</span>
    <span class="modal-tech-tag">JavaScript</span>
  </div>

  <div class="modal-links">
    <a href="https://github.com/Serius69/kioscoverdebo" target="_blank" rel="noopener" class="modal-link-btn primary">
      <i class="fa-brands fa-github"></i> View on GitHub
    </a>
  </div>
</div>

{{-- Modal 12: Tromay BI --}}
<div class="case-modal" id="modal-proj12" role="dialog" aria-modal="true">
  <div class="modal-header">
    <div class="modal-header-left">
      <span class="modal-cat-tag">Full Stack · Web · Fintech</span>
      <h3>Tromay — Exchange House Website</h3>
    </div>
    <button class="modal-close-btn" aria-label="Close">✕</button>
  </div>

  <div class="modal-section-label">Context</div>
  <p class="modal-text">Tromay Casa de Cambio needed a public web presence that shows its live exchange rates and channels customers toward the rest of the Kapitalya ecosystem — without exposing any internal admin tooling.</p>

  <div class="modal-section-label">The Solution</div>
  <p class="modal-text">A public Laravel website that pulls live USD/BOB and EUR rates from the exchange's ERP, offers a quote simulator, and exposes a rate-limited public API (<code>/api/rates</code>) consumed by other ecosystem services (the portfolio's live FX widget and the rate-alert bot). Blade + Vite frontend, MySQL for rate/news fallback, Redis caching, running on Nginx + PHP-FPM under Docker.</p>

  <div class="modal-impact-grid">
    <div class="modal-metric"><span class="modal-metric-val">Live</span><span class="modal-metric-lbl">USD/BOB &amp; EUR rates</span></div>
    <div class="modal-metric"><span class="modal-metric-val">API</span><span class="modal-metric-lbl">Public /api/rates</span></div>
    <div class="modal-metric"><span class="modal-metric-val">Redis</span><span class="modal-metric-lbl">Rate caching</span></div>
    <div class="modal-metric"><span class="modal-metric-val">Docker</span><span class="modal-metric-lbl">Nginx + PHP-FPM</span></div>
  </div>

  <div class="modal-section-label">Stack</div>
  <div class="modal-tech-list">
    <span class="modal-tech-tag">Laravel</span>
    <span class="modal-tech-tag">PHP</span>
    <span class="modal-tech-tag">MySQL</span>
    <span class="modal-tech-tag">Redis</span>
    <span class="modal-tech-tag">Blade</span>
    <span class="modal-tech-tag">Docker</span>
  </div>

  <div class="modal-links">
    <a href="https://github.com/Serius69/tromay" target="_blank" rel="noopener" class="modal-link-btn primary">
      <i class="fa-brands fa-github"></i> View on GitHub
    </a>
  </div>
</div>

{{-- Modal 13: Kapitalya Multi-Tenant ERP --}}
<div class="case-modal" id="modal-proj13" role="dialog" aria-modal="true">
  <div class="modal-header">
    <div class="modal-header-left">
      <span class="modal-cat-tag">Full Stack · ERP · Fintech</span>
      <h3>Kapitalya Multi-Tenant ERP</h3>
    </div>
    <button class="modal-close-btn" aria-label="Close">✕</button>
  </div>

  <div class="modal-section-label">The Problem</div>
  <p class="modal-text">FX exchange houses in Bolivia operated on spreadsheets and disconnected tools. There was no unified system for real-time rate management, transaction logging, operator control, or ASFI regulatory reporting — creating operational risk and manual overhead.</p>

  <div class="modal-section-label">The Solution</div>
  <p class="modal-text">Built a full multi-tenant ERP from scratch: aggregates live FX rates from 8 parallel-market sources (P2P and exchanges) via web scrapers, an ML ensemble forecasts optimal spread levels, WebSocket (Django Channels) pushes live updates to operator dashboards, and automated report generation satisfies ASFI regulatory requirements. Built with Django + React + TypeScript, in real use with production data.</p>

  <div class="modal-impact-grid">
    <div class="modal-metric"><span class="modal-metric-val">8</span><span class="modal-metric-lbl">Parallel-market sources</span></div>
    <div class="modal-metric"><span class="modal-metric-val">ML</span><span class="modal-metric-lbl">Price forecasting</span></div>
    <div class="modal-metric"><span class="modal-metric-val">WS</span><span class="modal-metric-lbl">Live updates</span></div>
    <div class="modal-metric"><span class="modal-metric-val">ASFI</span><span class="modal-metric-lbl">Regulatory compliant</span></div>
  </div>

  <div class="modal-section-label">Stack</div>
  <div class="modal-tech-list">
    <span class="modal-tech-tag">Django</span>
    <span class="modal-tech-tag">React</span>
    <span class="modal-tech-tag">TypeScript</span>
    <span class="modal-tech-tag">Celery</span>
    <span class="modal-tech-tag">PostgreSQL</span>
    <span class="modal-tech-tag">Redis</span>
    <span class="modal-tech-tag">WebSocket</span>
    <span class="modal-tech-tag">Docker</span>
  </div>

  <div class="modal-links">
    <a href="{{ __('portfolio.proj13_url') }}" target="_blank" rel="noopener noreferrer" class="modal-link-btn primary">
      <i class="fa-solid fa-arrow-up-right-from-square"></i> Live System
    </a>
  </div>
</div>

{{-- Modal 14: Alertas Bolivia --}}
<div class="case-modal" id="modal-proj14" role="dialog" aria-modal="true">
  <div class="modal-header">
    <div class="modal-header-left">
      <span class="modal-cat-tag">Python · Fintech · Automation</span>
      <h3>Alertas Bolivia — Exchange Rate Monitor</h3>
    </div>
    <button class="modal-close-btn" aria-label="Close">✕</button>
  </div>

  <div class="modal-section-label">The Problem</div>
  <p class="modal-text">Businesses and traders using Bolivia's parallel dollar market had no automated way to react to rate movements. Manually checking rates throughout the day meant missing optimal conversion windows — a costly gap for high-volume operators.</p>

  <div class="modal-section-label">The Solution</div>
  <p class="modal-text">An automated monitoring system: an ARIMA model (AIC grid search, ADF stationarity test) tracks the parallel dollar rate trend, APScheduler runs checks on Bolivian business hours (Mon–Fri, America/La_Paz), and notifications fire by WhatsApp (Twilio, optional), SMS, and email the moment rates breach user-defined thresholds — no need to watch the screen.</p>

  <div class="modal-impact-grid">
    <div class="modal-metric"><span class="modal-metric-val">Mon–Fri</span><span class="modal-metric-lbl">Scheduled monitoring</span></div>
    <div class="modal-metric"><span class="modal-metric-val">3</span><span class="modal-metric-lbl">Channels: WA/SMS/email</span></div>
    <div class="modal-metric"><span class="modal-metric-val">ARIMA</span><span class="modal-metric-lbl">Trend forecasting</span></div>
    <div class="modal-metric"><span class="modal-metric-val">Auto</span><span class="modal-metric-lbl">Threshold triggers</span></div>
  </div>

  <div class="modal-section-label">Stack</div>
  <div class="modal-tech-list">
    <span class="modal-tech-tag">Python</span>
    <span class="modal-tech-tag">Django</span>
    <span class="modal-tech-tag">ARIMA / statsmodels</span>
    <span class="modal-tech-tag">Twilio</span>
    <span class="modal-tech-tag">APScheduler</span>
    <span class="modal-tech-tag">MySQL</span>
    <span class="modal-tech-tag">Docker</span>
  </div>

  <div class="modal-links">
    <a href="{{ __('portfolio.proj14_url') }}" target="_blank" rel="noopener noreferrer" class="modal-link-btn primary">
      <i class="fa-solid fa-arrow-up-right-from-square"></i> Live System
    </a>
  </div>
</div>

{{-- Modal 15: Bolivian Forex Predictor --}}
<div class="case-modal" id="modal-proj15" role="dialog" aria-modal="true">
  <div class="modal-header">
    <div class="modal-header-left">
      <span class="modal-cat-tag">Machine Learning · Django · Fintech</span>
      <h3>Bolivian Forex Predictor — ML API</h3>
    </div>
    <button class="modal-close-btn" aria-label="Close">✕</button>
  </div>

  <div class="modal-section-label">The Problem</div>
  <p class="modal-text">The Kapitalya ERP needed a dedicated, low-latency ML inference service decoupled from the main application. Monolithic prediction logic was causing API response delays and couldn't be independently scaled during market volatility spikes.</p>

  <div class="modal-section-label">The Solution</div>
  <p class="modal-text">Built a standalone Django REST Framework service wrapping a Prophet + XGBoost ensemble with dynamic weighting (recalibrated by rolling MAPE). The service ingests real market data (dolarapi + Binance P2P), runs ensemble prediction, and returns forecasts with confidence bounds. Containerized with Docker as an independent, deploy-ready microservice.</p>

  <div class="modal-impact-grid">
    <div class="modal-metric"><span class="modal-metric-val">2</span><span class="modal-metric-lbl">Model ensemble</span></div>
    <div class="modal-metric"><span class="modal-metric-val">Dyn</span><span class="modal-metric-lbl">Dynamic weighting</span></div>
    <div class="modal-metric"><span class="modal-metric-val">REST</span><span class="modal-metric-lbl">Django DRF</span></div>
    <div class="modal-metric"><span class="modal-metric-val">±CI</span><span class="modal-metric-lbl">Confidence bounds</span></div>
  </div>

  <div class="modal-section-label">Stack</div>
  <div class="modal-tech-list">
    <span class="modal-tech-tag">Python</span>
    <span class="modal-tech-tag">Django</span>
    <span class="modal-tech-tag">DRF</span>
    <span class="modal-tech-tag">Prophet</span>
    <span class="modal-tech-tag">XGBoost</span>
    <span class="modal-tech-tag">Docker</span>
    <span class="modal-tech-tag">pandas</span>
  </div>

  <div class="modal-links">
    <a href="{{ __('portfolio.proj15_url') }}" target="_blank" rel="noopener noreferrer" class="modal-link-btn primary">
      <i class="fa-solid fa-arrow-up-right-from-square"></i> Live API
    </a>
  </div>
</div>

{{-- Modal 16: Analytics Dashboard --}}
<div class="case-modal" id="modal-proj16" role="dialog" aria-modal="true">
  <div class="modal-header">
    <div class="modal-header-left">
      <span class="modal-cat-tag">Business Intelligence · Django + React</span>
      <h3>Analytics Dashboard — Kapitalya Suite</h3>
    </div>
    <button class="modal-close-btn" aria-label="Close">✕</button>
  </div>

  <div class="modal-section-label">The Problem</div>
  <p class="modal-text">The exchange business needed a single, self-hosted view of its FX KPIs — transaction volume, P&amp;L, spread performance, top clients — instead of scattered spreadsheets, and without depending on an external BI license.</p>

  <div class="modal-section-label">The Solution</div>
  <p class="modal-text">A dashboard with a Django/DRF API backend and a React + Recharts frontend that renders FX KPIs with date-range filtering and CSV export. It runs on a deterministic demo dataset today, built as the presentation layer to wire into the ecosystem's production systems (ERP, forex-predictor) as they come online.</p>

  <div class="modal-impact-grid">
    <div class="modal-metric"><span class="modal-metric-val">DRF</span><span class="modal-metric-lbl">Django API backend</span></div>
    <div class="modal-metric"><span class="modal-metric-val">React</span><span class="modal-metric-lbl">Recharts frontend</span></div>
    <div class="modal-metric"><span class="modal-metric-val">KPI</span><span class="modal-metric-lbl">Volume / P&amp;L / spread</span></div>
    <div class="modal-metric"><span class="modal-metric-val">CSV</span><span class="modal-metric-lbl">Export ready</span></div>
  </div>

  <div class="modal-section-label">Stack</div>
  <div class="modal-tech-list">
    <span class="modal-tech-tag">Python</span>
    <span class="modal-tech-tag">Django</span>
    <span class="modal-tech-tag">DRF</span>
    <span class="modal-tech-tag">React</span>
    <span class="modal-tech-tag">Recharts</span>
    <span class="modal-tech-tag">pandas</span>
  </div>

  <div class="modal-links">
    <a href="{{ __('portfolio.proj16_url') }}" target="_blank" rel="noopener noreferrer" class="modal-link-btn primary">
      <i class="fa-solid fa-arrow-up-right-from-square"></i> Live Dashboard
    </a>
  </div>
</div>

{{-- Modal 17: LLM Financial Analyst --}}
<div class="case-modal" id="modal-proj17" role="dialog" aria-modal="true">
  <div class="modal-header">
    <div class="modal-header-left">
      <span class="modal-cat-tag">AI · LLM · NLP · Fintech</span>
      <h3>LLM Financial Analyst</h3>
    </div>
    <button class="modal-close-btn" aria-label="Close">✕</button>
  </div>

  <div class="modal-section-label">The Problem</div>
  <p class="modal-text">Analysts at Kapitalya spent hours manually scanning ASFI/BCB regulatory documents for compliance checks — a slow, error-prone process. They needed to ask questions in plain language and get answers grounded in the source documents.</p>

  <div class="modal-section-label">The Solution</div>
  <p class="modal-text">A RAG (retrieval-augmented generation) assistant that ingests ASFI/BCB regulatory PDFs (pdfplumber → multilingual embeddings → ChromaDB, cross-encoder reranking) and answers natural-language compliance questions with mandatory citations to the source document. A LangChain tool-calling agent (search, ratio calc, risk lookup) powered by Claude (Anthropic), served as a FastAPI service — one document per conversation.</p>

  <div class="modal-impact-grid">
    <div class="modal-metric"><span class="modal-metric-val">RAG</span><span class="modal-metric-lbl">Retrieval-augmented</span></div>
    <div class="modal-metric"><span class="modal-metric-val">Claude</span><span class="modal-metric-lbl">Anthropic LLM</span></div>
    <div class="modal-metric"><span class="modal-metric-val">3</span><span class="modal-metric-lbl">Agent tools</span></div>
    <div class="modal-metric"><span class="modal-metric-val">Cited</span><span class="modal-metric-lbl">Source attribution</span></div>
  </div>

  <div class="modal-section-label">Stack</div>
  <div class="modal-tech-list">
    <span class="modal-tech-tag">Python</span>
    <span class="modal-tech-tag">LangChain</span>
    <span class="modal-tech-tag">Claude (Anthropic)</span>
    <span class="modal-tech-tag">FastAPI</span>
    <span class="modal-tech-tag">ChromaDB</span>
    <span class="modal-tech-tag">Docker</span>
  </div>

  <div class="modal-links">
    <a href="{{ __('portfolio.proj17_url') }}" target="_blank" rel="noopener noreferrer" class="modal-link-btn primary">
      <i class="fa-solid fa-arrow-up-right-from-square"></i> Live System
    </a>
  </div>
</div>

{{-- Modal 18: Fraud Detection Engine --}}
<div class="case-modal" id="modal-proj18" role="dialog" aria-modal="true">
  <div class="modal-header">
    <div class="modal-header-left">
      <span class="modal-cat-tag">Machine Learning · Security · Fintech</span>
      <h3>Real-Time Fraud Detection Engine</h3>
    </div>
    <button class="modal-close-btn" aria-label="Close">✕</button>
  </div>

  <div class="modal-section-label">The Problem</div>
  <p class="modal-text">FX operations are high-value targets for fraudulent transactions — forged IDs, structured splitting to evade reporting thresholds, and anomalous operator behavior. Manual review of suspicious transactions after the fact was too slow and created regulatory risk.</p>

  <div class="modal-section-label">The Solution</div>
  <p class="modal-text">Real-time scoring API: every incoming transaction is scored by an ensemble — XGBoost as the primary classifier (trained on historical flagged transactions) plus an Isolation Forest anomaly detector. Redis velocity counters and feature engineering capture FX-specific signals: transaction velocity, amount distribution, time-of-day patterns, and operator behavior deviations. Results are returned in under 100ms (P99 ~45ms) with a risk score.</p>

  <div class="modal-impact-grid">
    <div class="modal-metric"><span class="modal-metric-val">&lt;100ms</span><span class="modal-metric-lbl">Scoring latency (P99 ~45ms)</span></div>
    <div class="modal-metric"><span class="modal-metric-val">XGB+IF</span><span class="modal-metric-lbl">Ensemble models</span></div>
    <div class="modal-metric"><span class="modal-metric-val">Redis</span><span class="modal-metric-lbl">Velocity counters</span></div>
    <div class="modal-metric"><span class="modal-metric-val">Live</span><span class="modal-metric-lbl">Per-transaction scoring</span></div>
  </div>

  <div class="modal-section-label">Stack</div>
  <div class="modal-tech-list">
    <span class="modal-tech-tag">Python</span>
    <span class="modal-tech-tag">XGBoost</span>
    <span class="modal-tech-tag">scikit-learn</span>
    <span class="modal-tech-tag">Isolation Forest</span>
    <span class="modal-tech-tag">FastAPI</span>
    <span class="modal-tech-tag">Redis</span>
    <span class="modal-tech-tag">Docker</span>
  </div>

  <div class="modal-links">
    <a href="{{ __('portfolio.proj18_url') }}" target="_blank" rel="noopener noreferrer" class="modal-link-btn primary">
      <i class="fa-solid fa-arrow-up-right-from-square"></i> Live API
    </a>
  </div>
</div>

{{-- Modal 19: ML Time Series Explorer --}}
<div class="case-modal" id="modal-proj19" role="dialog" aria-modal="true">
  <div class="modal-header">
    <div class="modal-header-left">
      <span class="modal-cat-tag">Machine Learning · Time Series · Visualization</span>
      <h3>ML Time Series Explorer</h3>
    </div>
    <button class="modal-close-btn" aria-label="Close">✕</button>
  </div>

  <div class="modal-section-label">The Project</div>
  <p class="modal-text">An internal Streamlit prototype for comparing time-series forecasting approaches, built to support model-selection decisions at Kapitalya: pick a model (Prophet, ARIMA, or a Seasonal-Naive baseline), tune hyperparameters, and compare accuracy metrics side by side. A working sandbox rather than a finished product.</p>

  <div class="modal-section-label">Models Implemented</div>
  <p class="modal-text">The core the prototype is built on: Facebook Prophet (trend + seasonality decomposition), ARIMA (auto-parameter selection via pmdarima), and a Seasonal-Naive baseline for reference — each implemented and covered by tests. Side-by-side accuracy comparison using MAE, RMSE, and MAPE.</p>

  <div class="modal-impact-grid">
    <div class="modal-metric"><span class="modal-metric-val">3</span><span class="modal-metric-lbl">Models compared</span></div>
    <div class="modal-metric"><span class="modal-metric-val">No</span><span class="modal-metric-lbl">Code required</span></div>
    <div class="modal-metric"><span class="modal-metric-val">±CI</span><span class="modal-metric-lbl">Confidence intervals</span></div>
    <div class="modal-metric"><span class="modal-metric-val">CSV</span><span class="modal-metric-lbl">Export predictions</span></div>
  </div>

  <div class="modal-section-label">Stack</div>
  <div class="modal-tech-list">
    <span class="modal-tech-tag">Python</span>
    <span class="modal-tech-tag">Streamlit</span>
    <span class="modal-tech-tag">Prophet</span>
    <span class="modal-tech-tag">pmdarima</span>
    <span class="modal-tech-tag">scikit-learn</span>
    <span class="modal-tech-tag">pandas</span>
    <span class="modal-tech-tag">Plotly</span>
  </div>

  <div class="modal-links">
    <a href="{{ __('portfolio.proj19_url') }}" target="_blank" rel="noopener noreferrer" class="modal-link-btn primary">
      <i class="fa-solid fa-arrow-up-right-from-square"></i> Live App
    </a>
  </div>
</div>

{{-- Modal 20: Data Pipeline Airflow --}}
<div class="case-modal" id="modal-proj20" role="dialog" aria-modal="true">
  <div class="modal-header">
    <div class="modal-header-left">
      <span class="modal-cat-tag">Data Engineering · MLOps · Apache Airflow</span>
      <h3>Data Pipeline Orchestration — Apache Airflow</h3>
    </div>
    <button class="modal-close-btn" aria-label="Close">✕</button>
  </div>

  <div class="modal-section-label">The Problem</div>
  <p class="modal-text">As the Kapitalya ecosystem grew to 5+ production services, data dependencies between them became complex: the BI dashboard needed fresh ERP data, the ML models needed updated training sets, and alert thresholds needed recalibration based on recent market volatility — all on different schedules.</p>

  <div class="modal-section-label">The Solution</div>
  <p class="modal-text">Apache Airflow (LocalExecutor) deployment orchestrating inter-service data flows via DAGs: FX data ingestion from real sources (BCB, Binance P2P), data-warehouse refresh with dbt transforms, and data-quality checks with Slack alerts on failures. Full observability via the Airflow UI with task-level logs.</p>

  <div class="modal-impact-grid">
    <div class="modal-metric"><span class="modal-metric-val">DAG</span><span class="modal-metric-lbl">Declarative pipelines</span></div>
    <div class="modal-metric"><span class="modal-metric-val">dbt</span><span class="modal-metric-lbl">SQL transforms</span></div>
    <div class="modal-metric"><span class="modal-metric-val">ELT</span><span class="modal-metric-lbl">BCB + Binance P2P</span></div>
    <div class="modal-metric"><span class="modal-metric-val">SLA</span><span class="modal-metric-lbl">Monitoring + alerts</span></div>
  </div>

  <div class="modal-section-label">Stack</div>
  <div class="modal-tech-list">
    <span class="modal-tech-tag">Apache Airflow</span>
    <span class="modal-tech-tag">Python</span>
    <span class="modal-tech-tag">PostgreSQL</span>
    <span class="modal-tech-tag">dbt</span>
    <span class="modal-tech-tag">Docker Compose</span>
    <span class="modal-tech-tag">Slack API</span>
  </div>

  <div class="modal-links">
    <a href="{{ __('portfolio.proj20_url') }}" target="_blank" rel="noopener noreferrer" class="modal-link-btn primary">
      <i class="fa-solid fa-arrow-up-right-from-square"></i> Live System
    </a>
  </div>
</div>

{{-- Modal 21: FX Options Valuation (Garman-Kohlhagen / Monte Carlo) --}}
<div class="case-modal" id="modal-proj21" role="dialog" aria-modal="true">
  <div class="modal-header">
    <div class="modal-header-left">
      <span class="modal-cat-tag">Quantitative Finance · Derivatives · Python</span>
      <h3>FX Options Valuation — Garman-Kohlhagen</h3>
    </div>
    <button class="modal-close-btn" aria-label="Close">✕</button>
  </div>

  <div class="modal-section-label">The Problem</div>
  <p class="modal-text">Bolivian firms exposed to USD/BOB have no accessible way to price and hedge currency-option risk. Off-the-shelf equity-option tools ignore the two interest rates (domestic and foreign) that drive FX option value, leaving treasury decisions to guesswork.</p>

  <div class="modal-section-label">The Solution</div>
  <p class="modal-text">A Python valuation engine that prices FX options with the closed-form Garman-Kohlhagen model and cross-checks every price against a Monte Carlo simulation of price paths under geometric Brownian motion. Computes the Greeks (Delta, Gamma, Vega) so a treasury desk can size hedges. Wired into the market-maker service as a live <code>POST /api/option</code> endpoint.</p>

  <div class="modal-impact-grid">
    <div class="modal-metric"><span class="modal-metric-val">GK</span><span class="modal-metric-lbl">Garman-Kohlhagen</span></div>
    <div class="modal-metric"><span class="modal-metric-val">MC</span><span class="modal-metric-lbl">Monte Carlo cross-check</span></div>
    <div class="modal-metric"><span class="modal-metric-val">3</span><span class="modal-metric-lbl">Greeks computed</span></div>
    <div class="modal-metric"><span class="modal-metric-val">USD/BOB</span><span class="modal-metric-lbl">Target pair</span></div>
  </div>

  <div class="modal-section-label">Stack</div>
  <div class="modal-tech-list">
    <span class="modal-tech-tag">Python</span>
    <span class="modal-tech-tag">NumPy</span>
    <span class="modal-tech-tag">Monte Carlo</span>
    <span class="modal-tech-tag">Garman-Kohlhagen</span>
    <span class="modal-tech-tag">FastAPI</span>
  </div>

  <div class="modal-links">
    <a href="{{ __('portfolio.proj21_github') }}" target="_blank" rel="noopener" class="modal-link-btn primary">
      <i class="fa-brands fa-github"></i> View on GitHub
    </a>
  </div>
</div>

{{-- Modal 22: Kapitalya Insights --}}
<div class="case-modal" id="modal-proj22" role="dialog" aria-modal="true">
  <div class="modal-header">
    <div class="modal-header-left">
      <span class="modal-cat-tag">Full Stack · SEO · Data · A11y</span>
      <h3>Kapitalya Insights</h3>
    </div>
    <button type="button" class="modal-close-btn" aria-label="Close">✕</button>
  </div>

  <div class="modal-section-label">The Problem</div>
  <p class="modal-text">Bolivia lacks an accessible, well-indexed public source of economic analysis — exchange-rate history, commodity indicators, and sector research sit scattered across PDFs and paywalls, invisible to search engines and hard to use for people relying on assistive technology.</p>

  <div class="modal-section-label">The Solution</div>
  <p class="modal-text">A public economic-analysis portal: editorial research articles, econometric projections, and real-time indicators (USD/BOB, WTI oil, gold, BTC). A Django/DRF backend (9 apps) feeds a React + Vite SPA, with programmatic SEO (long-tail pages like <code>/tipo-de-cambio/{year}/{month}/</code>, sitemap, structured data) and WCAG 2.1 AA accessibility enforced by a Lighthouse gate in CI. It is the accessibility and SEO reference implementation of the whole ecosystem.</p>

  <div class="modal-impact-grid">
    <div class="modal-metric"><span class="modal-metric-val">9</span><span class="modal-metric-lbl">Django apps</span></div>
    <div class="modal-metric"><span class="modal-metric-val">WCAG 2.1 AA</span><span class="modal-metric-lbl">CI-gated a11y</span></div>
    <div class="modal-metric"><span class="modal-metric-val">SEO</span><span class="modal-metric-lbl">Programmatic pages</span></div>
    <div class="modal-metric"><span class="modal-metric-val">Real-time</span><span class="modal-metric-lbl">Economic indicators</span></div>
  </div>

  <div class="modal-section-label">Stack</div>
  <div class="modal-tech-list">
    <span class="modal-tech-tag">Django / DRF</span>
    <span class="modal-tech-tag">React / Vite</span>
    <span class="modal-tech-tag">PostgreSQL</span>
    <span class="modal-tech-tag">Redis</span>
    <span class="modal-tech-tag">Recharts</span>
    <span class="modal-tech-tag">Celery / Airflow</span>
  </div>

  <p class="modal-text"><em>Production-ready code + K8s manifests; deployment pending the ecosystem's cluster migration.</em></p>
</div>

{{-- Modal 24: Kapitalya Suite (30 verticals) --}}
<div class="case-modal" id="modal-proj24" role="dialog" aria-modal="true">
  <div class="modal-header">
    <div class="modal-header-left">
      <span class="modal-cat-tag">Fintech · Enterprise · Micro-SaaS · Architecture</span>
      <h3>Kapitalya Suite — 30 Verticals</h3>
    </div>
    <button type="button" class="modal-close-btn" aria-label="Close">✕</button>
  </div>

  <div class="modal-section-label">The Problem</div>
  <p class="modal-text">Bolivian businesses — from banks to corner shops — need billing, payroll, tax, lending, CRM, and point-of-sale software built for local rules (RC-IVA, ASFI, BCB), but each vertical is usually a separate vendor with its own login and no shared data.</p>

  <div class="modal-section-label">The Solution</div>
  <p class="modal-text">A single monorepo of 30 business verticals for the Bolivian market: 14 fintech products (billing, payroll, tax, remittances, pensions, a rate comparator…), 5 B2B enterprise verticals (CRM, telecom, government, POS, maintenance), and 11 SME micro-SaaS. They share a stack (FastAPI/Django + React, async SQLAlchemy 2.0, PostgreSQL, Redis), a single sign-on via Kapitalya Hub SSO (JWT — one login across every project), Bolivian demo seeds, reusable CI, and security hardening (multi-stage non-root Docker images, NetworkPolicies, security headers, secret fail-fast).</p>

  <div class="modal-impact-grid">
    <div class="modal-metric"><span class="modal-metric-val">30</span><span class="modal-metric-lbl">Business verticals</span></div>
    <div class="modal-metric"><span class="modal-metric-val">Hub SSO</span><span class="modal-metric-lbl">One login for all</span></div>
    <div class="modal-metric"><span class="modal-metric-val">CI + Hardened</span><span class="modal-metric-lbl">Non-root, scanned</span></div>
    <div class="modal-metric"><span class="modal-metric-val">Bolivia</span><span class="modal-metric-lbl">Local-rule demo seeds</span></div>
  </div>

  <div class="modal-section-label">Stack</div>
  <div class="modal-tech-list">
    <span class="modal-tech-tag">FastAPI</span>
    <span class="modal-tech-tag">Django</span>
    <span class="modal-tech-tag">React</span>
    <span class="modal-tech-tag">PostgreSQL</span>
    <span class="modal-tech-tag">Redis</span>
    <span class="modal-tech-tag">Kubernetes</span>
  </div>

  <p class="modal-text"><em>Production-ready code + K8s manifests + CI; deployment pending the ecosystem's cluster migration.</em></p>
</div>

