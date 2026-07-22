<!doctype html>
<html lang="es" data-theme="">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title>Sergio Troche — Data Scientist &amp; AI Engineer (rediseño)</title>
<link rel="icon" href="{{ asset('favicon.ico') }}">
<style>
  :root{
    --bg:#F5F3EE; --surface:#FFFFFF; --surface-2:#FBFAF6;
    --ink:#191B21; --ink-soft:#474B55; --muted:#7B808B;
    --line:#E4E1D8; --line-strong:#D3CFC4;
    --accent:#B0771A; --accent-fill:#E0A83B; --accent-strong:#8F6011;
    --good:#3F7D53; --good-soft:#E4EFE6; --focus:#B0771A;
    --c1:#E0A83B; --c2:#B0771A; --c3:#4E7C7C; --c4:#6B7280;
    --c5:#C99A5B; --c6:#5F7796; --c7:#84906B;
    --maxw:1140px;
    --serif:"Iowan Old Style","Palatino Linotype",Palatino,Georgia,"Times New Roman",serif;
    --sans:system-ui,-apple-system,"Segoe UI",Roboto,Helvetica,Arial,sans-serif;
    --mono:ui-monospace,"SF Mono","Cascadia Code",Menlo,Consolas,"Liberation Mono",monospace;
  }
  @media (prefers-color-scheme:dark){
    :root{
      --bg:#14161C; --surface:#1B1E26; --surface-2:#20242E;
      --ink:#ECEAE3; --ink-soft:#B9BCC4; --muted:#868B96;
      --line:#2A2E38; --line-strong:#3A3F4B;
      --accent:#E7B24A; --accent-fill:#E7B24A; --accent-strong:#F0C46A;
      --good:#6FBF88; --good-soft:#1E2A22; --focus:#E7B24A;
      --c1:#E7B24A; --c2:#C98B2E; --c3:#5FA3A3; --c4:#8A909C;
      --c5:#D6A968; --c6:#7C93B4; --c7:#9AA77E;
    }
  }
  :root[data-theme="light"]{
    --bg:#F5F3EE; --surface:#FFFFFF; --surface-2:#FBFAF6;
    --ink:#191B21; --ink-soft:#474B55; --muted:#7B808B;
    --line:#E4E1D8; --line-strong:#D3CFC4;
    --accent:#B0771A; --accent-fill:#E0A83B; --accent-strong:#8F6011;
    --good:#3F7D53; --good-soft:#E4EFE6; --focus:#B0771A;
    --c1:#E0A83B; --c2:#B0771A; --c3:#4E7C7C; --c4:#6B7280;
    --c5:#C99A5B; --c6:#5F7796; --c7:#84906B;
  }
  :root[data-theme="dark"]{
    --bg:#14161C; --surface:#1B1E26; --surface-2:#20242E;
    --ink:#ECEAE3; --ink-soft:#B9BCC4; --muted:#868B96;
    --line:#2A2E38; --line-strong:#3A3F4B;
    --accent:#E7B24A; --accent-fill:#E7B24A; --accent-strong:#F0C46A;
    --good:#6FBF88; --good-soft:#1E2A22; --focus:#E7B24A;
    --c1:#E7B24A; --c2:#C98B2E; --c3:#5FA3A3; --c4:#8A909C;
    --c5:#D6A968; --c6:#7C93B4; --c7:#9AA77E;
  }
  *{box-sizing:border-box}
  html{scroll-behavior:smooth}
  @media (prefers-reduced-motion:reduce){ html{scroll-behavior:auto} }
  body{margin:0;background:var(--bg);color:var(--ink);font-family:var(--sans);font-size:17px;line-height:1.6;-webkit-font-smoothing:antialiased;text-rendering:optimizeLegibility}
  a{color:inherit;text-decoration:none}
  a:focus-visible,button:focus-visible{outline:2.5px solid var(--focus);outline-offset:3px;border-radius:3px}
  ::selection{background:var(--accent-fill);color:#14161C}
  .wrap{max-width:var(--maxw);margin:0 auto;padding:0 clamp(20px,5vw,56px)}
  .tnum{font-variant-numeric:tabular-nums}
  .eyebrow{font-family:var(--mono);font-size:12.5px;letter-spacing:.16em;text-transform:uppercase;color:var(--accent);font-weight:600}
  h1,h2,h3{font-family:var(--serif);font-weight:600;text-wrap:balance;margin:0}
  section{scroll-margin-top:84px}
  .skip{position:absolute;left:-9999px;top:auto}
  .skip:focus{left:16px;top:12px;z-index:200;background:var(--surface);color:var(--ink);padding:10px 16px;border:1px solid var(--line-strong);border-radius:6px}
  header.nav{position:sticky;top:0;z-index:100;background:color-mix(in srgb,var(--bg) 88%,transparent);backdrop-filter:saturate(140%) blur(10px);border-bottom:1px solid var(--line)}
  .nav-in{display:flex;align-items:center;gap:20px;height:60px}
  .brand{font-family:var(--mono);font-weight:600;letter-spacing:.02em;font-size:15px;display:flex;align-items:center;gap:9px}
  .brand .dot{width:9px;height:9px;border-radius:50%;background:var(--accent-fill);box-shadow:0 0 0 3px color-mix(in srgb,var(--accent-fill) 25%,transparent)}
  nav.links{display:flex;gap:6px;margin-left:auto}
  nav.links a{font-family:var(--mono);font-size:13px;color:var(--ink-soft);padding:7px 11px;border-radius:6px;transition:color .18s,background .18s}
  nav.links a:hover{color:var(--ink);background:var(--surface-2)}
  .nav-tools{display:flex;align-items:center;gap:8px}
  .icon-btn{width:38px;height:38px;display:grid;place-items:center;border:1px solid var(--line-strong);background:var(--surface);color:var(--ink);border-radius:8px;cursor:pointer;font-size:16px;transition:border-color .18s,transform .18s}
  .icon-btn:hover{border-color:var(--accent);transform:translateY(-1px)}
  .btn{display:inline-flex;align-items:center;gap:8px;font-family:var(--mono);font-size:13px;font-weight:600;padding:9px 15px;border-radius:8px;cursor:pointer;letter-spacing:.02em;transition:transform .18s,box-shadow .18s,background .18s}
  .btn-solid{background:var(--accent-fill);color:#14161C;border:1px solid var(--accent-fill)}
  .btn-solid:hover{transform:translateY(-1px);box-shadow:0 6px 18px -6px color-mix(in srgb,var(--accent-fill) 60%,transparent)}
  .btn-ghost{background:transparent;color:var(--ink);border:1px solid var(--line-strong)}
  .btn-ghost:hover{border-color:var(--accent);color:var(--accent)}
  @media (max-width:760px){ nav.links{display:none} }
  .hero{padding:clamp(48px,9vw,104px) 0 clamp(40px,6vw,72px);border-bottom:1px solid var(--line)}
  .hero h1{font-size:clamp(44px,8.5vw,88px);line-height:1.02;letter-spacing:-.015em;margin:18px 0 0}
  .hero h1 em{font-style:italic;color:var(--accent)}
  .role{font-family:var(--mono);font-size:clamp(14px,2.2vw,17px);color:var(--ink-soft);margin-top:20px}
  .role b{color:var(--ink);font-weight:600}
  .thesis{max-width:56ch;font-size:clamp(18px,2.6vw,21px);line-height:1.55;color:var(--ink-soft);margin:26px 0 0}
  .otw{display:inline-flex;align-items:center;gap:9px;margin-top:26px;padding:7px 14px;border-radius:999px;background:var(--good-soft);color:var(--good);font-family:var(--mono);font-size:12.5px;font-weight:600;letter-spacing:.03em}
  .otw .pulse{width:8px;height:8px;border-radius:50%;background:var(--good);position:relative}
  .otw .pulse::after{content:"";position:absolute;inset:-4px;border-radius:50%;border:1.5px solid var(--good);opacity:.5;animation:ping 2.4s ease-out infinite}
  @keyframes ping{0%{transform:scale(.6);opacity:.7}100%{transform:scale(1.7);opacity:0}}
  @media (prefers-reduced-motion:reduce){.otw .pulse::after{animation:none;opacity:0}}
  .actions{display:flex;flex-wrap:wrap;gap:10px;margin-top:30px}
  .metrics{display:grid;grid-template-columns:repeat(4,1fr);gap:1px;margin-top:clamp(40px,6vw,64px);background:var(--line);border:1px solid var(--line);border-radius:12px;overflow:hidden}
  .metric{background:var(--surface);padding:20px 22px}
  .metric .n{font-family:var(--serif);font-size:clamp(28px,4.5vw,40px);font-weight:600;letter-spacing:-.01em;line-height:1}
  .metric .n b{color:var(--accent)}
  .metric .l{font-family:var(--mono);font-size:11.5px;letter-spacing:.06em;text-transform:uppercase;color:var(--muted);margin-top:9px;line-height:1.4}
  @media (max-width:720px){ .metrics{grid-template-columns:repeat(2,1fr)} }
  .sec{padding:clamp(56px,9vw,96px) 0;border-bottom:1px solid var(--line)}
  .sec-head{display:flex;align-items:baseline;gap:16px;margin-bottom:clamp(30px,5vw,48px)}
  .sec-head h2{font-size:clamp(26px,4.5vw,40px);letter-spacing:-.01em}
  .sec-idx{font-family:var(--mono);font-size:13px;color:var(--muted)}
  .lead{max-width:62ch;font-size:19px;color:var(--ink-soft);line-height:1.6}
  .data-grid{display:grid;grid-template-columns:1.05fr 1fr;gap:clamp(24px,4vw,44px);align-items:start;margin-top:8px}
  @media (max-width:860px){ .data-grid{grid-template-columns:1fr} }
  .panel{background:var(--surface);border:1px solid var(--line);border-radius:14px;padding:clamp(20px,3vw,30px)}
  .panel h3{font-family:var(--mono);font-weight:600;font-size:12.5px;letter-spacing:.08em;text-transform:uppercase;color:var(--ink-soft)}
  .panel .sub{color:var(--muted);font-size:13.5px;margin:6px 0 0}
  .donut-row{display:flex;align-items:center;gap:22px;margin-top:20px;flex-wrap:wrap}
  canvas#donut{width:190px;height:190px;flex:0 0 auto}
  ul.legend{display:grid;gap:9px;flex:1;min-width:180px;margin:0;padding:0}
  .legend li{display:flex;align-items:center;gap:10px;font-size:14px;list-style:none}
  .legend .sw{width:11px;height:11px;border-radius:3px;flex:0 0 auto}
  .legend .lv{margin-left:auto;font-family:var(--mono);font-weight:600;font-variant-numeric:tabular-nums;color:var(--ink)}
  .bars{display:grid;gap:14px;margin-top:22px}
  .bar-row{display:grid;grid-template-columns:104px 1fr 34px;align-items:center;gap:12px}
  .bar-row .k{font-family:var(--mono);font-size:13px;color:var(--ink-soft)}
  .bar-track{height:10px;background:var(--surface-2);border:1px solid var(--line);border-radius:999px;overflow:hidden}
  .bar-fill{height:100%;background:linear-gradient(90deg,var(--accent-fill),color-mix(in srgb,var(--accent-fill) 55%,var(--c3)));border-radius:999px;transform-origin:left;transform:scaleX(var(--v,0));transition:transform 1s cubic-bezier(.2,.7,.2,1)}
  @media (prefers-reduced-motion:reduce){ .bar-fill{transition:none} }
  .bar-row .val{font-family:var(--mono);font-size:13px;font-weight:600;font-variant-numeric:tabular-nums;text-align:right;color:var(--ink)}
  .bars-note{font-size:12.5px;color:var(--muted);margin-top:14px}
  .work{display:grid;gap:0;border-top:1px solid var(--line)}
  .job{display:grid;grid-template-columns:1fr auto;gap:8px 24px;padding:26px 4px;border-bottom:1px solid var(--line);transition:background .2s,padding-left .2s}
  .job:hover{background:var(--surface);padding-left:14px}
  .job .t{display:flex;align-items:center;gap:12px;flex-wrap:wrap}
  .job .t h3{font-size:22px;letter-spacing:-.01em}
  .pill{font-family:var(--mono);font-size:10.5px;font-weight:600;letter-spacing:.06em;text-transform:uppercase;padding:3px 9px;border-radius:999px;border:1px solid transparent}
  .pill.live{background:var(--good-soft);color:var(--good);border-color:color-mix(in srgb,var(--good) 30%,transparent)}
  .pill.priv{background:var(--surface-2);color:var(--muted);border-color:var(--line-strong)}
  .pill.ds{background:color-mix(in srgb,var(--accent-fill) 16%,transparent);color:var(--accent);border-color:color-mix(in srgb,var(--accent-fill) 35%,transparent)}
  .job p{margin:2px 0 0;color:var(--ink-soft);font-size:15.5px;max-width:64ch;line-height:1.55}
  .stack{display:flex;flex-wrap:wrap;gap:6px;margin-top:12px}
  .chip{font-family:var(--mono);font-size:11.5px;color:var(--ink-soft);padding:3px 8px;border:1px solid var(--line);border-radius:6px;background:var(--surface-2)}
  .job .go{align-self:center;font-family:var(--mono);font-size:13px;color:var(--accent);white-space:nowrap;display:inline-flex;gap:6px;align-items:center}
  .job .go span{transition:transform .2s}
  .job:hover .go span{transform:translateX(4px)}
  @media (max-width:640px){ .job{grid-template-columns:1fr} .job .go{justify-self:start;margin-top:4px} }
  .two{display:grid;grid-template-columns:1fr 1fr;gap:clamp(28px,5vw,56px)}
  @media (max-width:820px){ .two{grid-template-columns:1fr} }
  .skill{display:grid;grid-template-columns:1fr auto;gap:6px 12px;margin-bottom:18px}
  .skill .k{font-size:15px}
  .skill .p{font-family:var(--mono);font-size:13px;color:var(--muted);font-variant-numeric:tabular-nums}
  .skill .track{grid-column:1/-1;height:6px;background:var(--surface-2);border:1px solid var(--line);border-radius:999px;overflow:hidden}
  .skill .fill{height:100%;background:var(--accent-fill);border-radius:999px;transform-origin:left;transform:scaleX(var(--v,0));transition:transform .9s cubic-bezier(.2,.7,.2,1)}
  @media (prefers-reduced-motion:reduce){ .skill .fill{transition:none} }
  .tags{display:flex;flex-wrap:wrap;gap:8px;margin-top:6px}
  .tag{font-family:var(--mono);font-size:12.5px;padding:5px 11px;border:1px solid var(--line-strong);border-radius:8px;color:var(--ink-soft)}
  .tag:hover{border-color:var(--accent);color:var(--accent)}
  ul.edu{margin:8px 0 0;padding:0}
  .edu li{list-style:none;padding:14px 0;border-bottom:1px solid var(--line);display:flex;justify-content:space-between;gap:16px;align-items:baseline}
  .edu .place{font-size:15.5px}
  .edu .place small{display:block;color:var(--muted);font-family:var(--mono);font-size:12px;margin-top:3px}
  .edu .yr{font-family:var(--mono);font-size:13px;color:var(--muted);white-space:nowrap}
  .contact{padding:clamp(64px,10vw,120px) 0}
  .contact h2{font-size:clamp(32px,6vw,58px);letter-spacing:-.02em;max-width:16ch}
  .contact .mail{display:inline-block;margin-top:22px;font-family:var(--serif);font-size:clamp(20px,3.4vw,30px);color:var(--accent);border-bottom:2px solid color-mix(in srgb,var(--accent) 40%,transparent);padding-bottom:2px}
  .clist{display:flex;flex-wrap:wrap;gap:10px;margin-top:34px}
  footer{border-top:1px solid var(--line);padding:30px 0;color:var(--muted);font-family:var(--mono);font-size:12.5px}
  .foot-in{display:flex;justify-content:space-between;gap:16px;flex-wrap:wrap;align-items:center}
  .rv{opacity:0;transform:translateY(14px);transition:opacity .6s ease,transform .6s ease}
  .rv.in{opacity:1;transform:none}
  @media (prefers-reduced-motion:reduce){ .rv{opacity:1;transform:none;transition:none} }
  .previewbar{background:var(--accent-fill);color:#14161C;font-family:var(--mono);font-size:12.5px;text-align:center;padding:7px 12px;font-weight:600}
</style>
</head>
<body>
<div class="previewbar">Vista previa del rediseño · <a href="/" style="text-decoration:underline">volver al sitio actual</a></div>
<a class="skip" href="#main">Ir al contenido</a>

<header class="nav">
  <div class="wrap nav-in">
    <a class="brand" href="#top"><span class="dot" aria-hidden="true"></span>Sergio&nbsp;Troche</a>
    <nav class="links" aria-label="Secciones">
      <a href="#enfoque">Enfoque</a>
      <a href="#ecosistema">Ecosistema</a>
      <a href="#trabajo">Trabajo</a>
      <a href="#skills">Skills</a>
      <a href="#contacto">Contacto</a>
    </nav>
    <div class="nav-tools">
      <button class="icon-btn" id="theme" aria-label="Cambiar tema claro/oscuro" title="Cambiar tema">◐</button>
      <a class="btn btn-ghost" href="{{ route('cv.download') }}">↓ CV</a>
      <a class="btn btn-solid" href="#contacto">Contactar</a>
    </div>
  </div>
</header>

<main id="main">
  <span id="top"></span>

  <section class="hero">
    <div class="wrap">
      <p class="eyebrow rv">Data Scientist · AI Engineer — La Paz, Bolivia</p>
      <h1 class="rv">Convierto datos<br>en decisiones que<br><em>mueven dinero.</em></h1>
      <p class="role rv"><b>Analista de Datos Financieros</b> @ Kapitalya · ML predictivo, BI en tiempo real y automatización financiera</p>
      <p class="thesis rv">Del mercado cambiario boliviano a la simulación probabilística: construyo sistemas que pronostican, deciden y explican — desde modelos de scoring y series de tiempo hasta ERPs de casas de cambio en producción.</p>
      <span class="otw rv"><span class="pulse" aria-hidden="true"></span>Disponible para remoto · Data Science · AI Engineering</span>
      <div class="actions rv">
        <a class="btn btn-solid" href="mailto:sergio.denis.troche.mayta@gmail.com">✉ Escríbeme</a>
        <a class="btn btn-ghost" href="{{ route('cv.download') }}">↓ Descargar CV (PDF)</a>
        <a class="btn btn-ghost" href="https://www.linkedin.com/in/sergio-denis-troche-mayta" target="_blank" rel="noopener">LinkedIn ↗</a>
        <a class="btn btn-ghost" href="https://github.com/Serius69" target="_blank" rel="noopener">GitHub ↗</a>
      </div>
      <div class="metrics rv" role="list" aria-label="Métricas clave">
        <div class="metric" role="listitem"><div class="n tnum">18<b>+</b></div><div class="l">Soluciones<br>construidas</div></div>
        <div class="metric" role="listitem"><div class="n tnum">0.78</div><div class="l">AUC · scoring<br>crédito ML (datos reales)</div></div>
        <div class="metric" role="listitem"><div class="n tnum"><b>−</b>43<b>%</b></div><div class="l">Tiempo de<br>reportes (BI)</div></div>
        <div class="metric" role="listitem"><div class="n tnum">~69</div><div class="l">Proyectos en el<br>monorepo Kapitalya</div></div>
      </div>
    </div>
  </section>

  <section class="sec" id="enfoque">
    <div class="wrap">
      <div class="sec-head"><span class="sec-idx">01</span><h2 class="rv">Enfoque</h2></div>
      <p class="lead rv">Trabajo end-to-end: entiendo el problema de negocio, modelo con validación honesta (sin fugas de datos), lo pongo en producción con Docker tras un túnel Cloudflare, y lo dejo <b>explicable</b> — SHAP para el motor antifraude, intervalos para los pronósticos, y datos reales del BCB/ASFI donde importa. La estadística me interesa cuando cambia una decisión, no cuando decora un slide.</p>
    </div>
  </section>

  <section class="sec" id="ecosistema">
    <div class="wrap">
      <div class="sec-head"><span class="sec-idx">02</span><h2 class="rv">El ecosistema en datos</h2></div>
      <p class="lead rv" style="margin-bottom:34px">Kapitalya es un monorepo fintech de ~69 proyectos que diseño y mantengo. Dos lecturas del catálogo de 52 servicios: su distribución por dominio y las tecnologías con más presencia.</p>
      <div class="data-grid">
        <div class="panel rv">
          <h3>Ecosistema por dominio</h3>
          <p class="sub">52 proyectos · 7 dominios</p>
          <div class="donut-row">
            <canvas id="donut" width="380" height="380" role="img" aria-label="Distribución: Verticales Fintech 14, Micro-SaaS PyME 11, Plataforma 7, Núcleo Fintech 5, Enterprise B2B 5, ML y Datos 5, Portfolio poliglota 5"></canvas>
            <ul class="legend" id="legend"></ul>
          </div>
        </div>
        <div class="panel rv">
          <h3>Stack — menciones en el catálogo</h3>
          <p class="sub">Muchos proyectos comparten stack, por eso los totales se solapan.</p>
          <div class="bars">
            <div class="bar-row"><span class="k">FastAPI</span><div class="bar-track"><div class="bar-fill" style="--v:1"></div></div><span class="val tnum">35</span></div>
            <div class="bar-row"><span class="k">React</span><div class="bar-track"><div class="bar-fill" style="--v:.91"></div></div><span class="val tnum">32</span></div>
            <div class="bar-row"><span class="k">Django</span><div class="bar-track"><div class="bar-fill" style="--v:.31"></div></div><span class="val tnum">11</span></div>
            <div class="bar-row"><span class="k">Java / Spring</span><div class="bar-track"><div class="bar-fill" style="--v:.06"></div></div><span class="val tnum">2</span></div>
            <div class="bar-row"><span class="k">Otros</span><div class="bar-track"><div class="bar-fill" style="--v:.14"></div></div><span class="val tnum">5</span></div>
          </div>
          <p class="bars-note">Otros: Vue · NestJS · .NET&nbsp;8 · Laravel&nbsp;11 · DRF — el portfolio es deliberadamente políglota.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="sec" id="trabajo">
    <div class="wrap">
      <div class="sec-head"><span class="sec-idx">03</span><h2 class="rv">Trabajo seleccionado</h2></div>
      <div class="work">
        <a class="job rv" href="https://kapitalya.com.bo" target="_blank" rel="noopener">
          <div><div class="t"><h3>Tromay</h3><span class="pill live">En producción</span></div>
            <p>Sistema integral para casa de cambio — tasas FX en tiempo real, transacciones, clientes y noticias financieras.</p>
            <div class="stack"><span class="chip">Laravel</span><span class="chip">MySQL</span><span class="chip">Redis</span></div></div>
          <span class="go">Visitar <span>→</span></span></a>
        <a class="job rv" href="https://app.kapitalya.com.bo" target="_blank" rel="noopener">
          <div><div class="t"><h3>Findempro AI</h3><span class="pill live">En producción</span></div>
            <p>Plataforma de simulación y toma de decisiones financieras para PyMEs con modelos probabilísticos (Monte Carlo, GBM) e IA.</p>
            <div class="stack"><span class="chip">Django</span><span class="chip">Python</span><span class="chip">Celery</span><span class="chip">PostgreSQL</span></div></div>
          <span class="go">Visitar <span>→</span></span></a>
        <div class="job rv">
          <div><div class="t"><h3>Kapitalya ERP</h3><span class="pill priv">Privado</span></div>
            <p>ERP multi-tenant para casas de cambio: tasas FX real-time desde 8 fuentes del mercado paralelo, forecasting ML, WebSocket y cumplimiento ASFI.</p>
            <div class="stack"><span class="chip">Django</span><span class="chip">React</span><span class="chip">TypeScript</span><span class="chip">Celery</span><span class="chip">PostgreSQL</span></div></div>
          <span class="go" aria-hidden="true"></span></div>
        <div class="job rv">
          <div><div class="t"><h3>Credit Scoring LATAM</h3><span class="pill ds">Data Science</span></div>
            <p>Modelo de scoring crediticio con explicabilidad: <b>AUC 0.78</b> sobre el proxy real UCI German Credit; pipeline de features, validación cruzada y análisis de sesgo.</p>
            <div class="stack"><span class="chip">Python</span><span class="chip">scikit-learn</span><span class="chip">CatBoost</span><span class="chip">SHAP</span></div></div>
          <span class="go" aria-hidden="true"></span></div>
        <div class="job rv">
          <div><div class="t"><h3>FX Options Market Maker</h3><span class="pill ds">Quant</span></div>
            <p>Motor de opciones FX con valuación Garman-Kohlhagen y contraste Monte Carlo; griegas y superficie de precios para el mercado boliviano.</p>
            <div class="stack"><span class="chip">Python</span><span class="chip">NumPy</span><span class="chip">FastAPI</span></div></div>
          <span class="go" aria-hidden="true"></span></div>
        <div class="job rv">
          <div><div class="t"><h3>Alertas Tipo de Cambio</h3><span class="pill priv">Privado</span></div>
            <p>Sistema de alertas del dólar paralelo boliviano — pronósticos ARIMA y notificaciones WhatsApp vía Twilio.</p>
            <div class="stack"><span class="chip">Django</span><span class="chip">ARIMA</span><span class="chip">Twilio</span><span class="chip">APScheduler</span></div></div>
          <span class="go" aria-hidden="true"></span></div>
        <div class="job rv">
          <div><div class="t"><h3>Suite Kapitalya</h3><span class="pill priv">30 verticales</span></div>
            <p>14 fintech + 5 enterprise + 11 micro-SaaS PyME en un monorepo, con Hub SSO (un solo login), seeds bolivianos, CI y hardening de seguridad.</p>
            <div class="stack"><span class="chip">FastAPI</span><span class="chip">Django</span><span class="chip">React</span><span class="chip">PostgreSQL</span><span class="chip">Redis</span></div></div>
          <span class="go" aria-hidden="true"></span></div>
      </div>
    </div>
  </section>

  <section class="sec" id="skills">
    <div class="wrap">
      <div class="sec-head"><span class="sec-idx">04</span><h2 class="rv">Capacidades</h2></div>
      <div class="two">
        <div class="rv">
          <div class="skill"><span class="k">Python / Machine Learning</span><span class="p">Avanzado</span><div class="track"><div class="fill" style="--v:.9"></div></div></div>
          <div class="skill"><span class="k">Power BI / DAX</span><span class="p">Avanzado</span><div class="track"><div class="fill" style="--v:.92"></div></div></div>
          <div class="skill"><span class="k">Django / Laravel</span><span class="p">Avanzado</span><div class="track"><div class="fill" style="--v:.85"></div></div></div>
          <div class="skill"><span class="k">SQL / Bases de datos</span><span class="p">Avanzado</span><div class="track"><div class="fill" style="--v:.85"></div></div></div>
          <div class="skill"><span class="k">Sistemas financieros</span><span class="p">Sólido</span><div class="track"><div class="fill" style="--v:.88"></div></div></div>
          <div class="skill"><span class="k">Analítica de datos</span><span class="p">Sólido</span><div class="track"><div class="fill" style="--v:.87"></div></div></div>
        </div>
        <div class="rv">
          <p class="eyebrow" style="margin-bottom:14px">Herramientas del día a día</p>
          <div class="tags">
            <span class="tag">Python</span><span class="tag">FastAPI</span><span class="tag">Django</span><span class="tag">React</span>
            <span class="tag">XGBoost</span><span class="tag">CatBoost</span><span class="tag">SHAP</span><span class="tag">Power BI</span>
            <span class="tag">PostgreSQL</span><span class="tag">Redis</span><span class="tag">Docker</span><span class="tag">Laravel</span>
            <span class="tag">Cloudflare</span><span class="tag">ARIMA</span><span class="tag">Monte Carlo</span>
          </div>
          <p class="eyebrow" style="margin:34px 0 14px">Formación</p>
          <ul class="edu">
            <li><span class="place">Maestría en IA, Datos y Finanzas<small>Aplicación de técnicas a producción</small></span><span class="yr">En curso</span></li>
            <li><span class="place">Ingeniería de Sistemas<small>Universidad Católica Boliviana San Pablo</small></span><span class="yr">Titulado</span></li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="contact" id="contacto">
    <div class="wrap">
      <p class="eyebrow rv">Contacto</p>
      <h2 class="rv">Hablemos de tu próximo problema con datos.</h2>
      <a class="mail rv" href="mailto:sergio.denis.troche.mayta@gmail.com">sergio.denis.troche.mayta@gmail.com</a>
      <div class="clist rv">
        <a class="btn btn-ghost" href="{{ route('cv.download') }}">↓ Descargar CV</a>
        <a class="btn btn-ghost" href="https://www.linkedin.com/in/sergio-denis-troche-mayta" target="_blank" rel="noopener">LinkedIn ↗</a>
        <a class="btn btn-ghost" href="https://github.com/Serius69" target="_blank" rel="noopener">GitHub ↗</a>
        <a class="btn btn-ghost" href="https://wa.me/59178939071" target="_blank" rel="noopener">WhatsApp · +591 78939071 ↗</a>
        <a class="btn btn-ghost" href="https://kapitalya.com.bo" target="_blank" rel="noopener">Ecosistema Kapitalya ↗</a>
      </div>
    </div>
  </section>
</main>

<footer>
  <div class="wrap foot-in">
    <span>© <span id="yr"></span> Sergio Denis Troche Mayta — La Paz, Bolivia</span>
    <span>Rediseño · vista previa en /v2</span>
  </div>
</footer>

<script>
(function(){
  var root=document.documentElement;
  function current(){ return root.getAttribute('data-theme') || (window.matchMedia('(prefers-color-scheme:dark)').matches?'dark':'light'); }
  document.getElementById('theme').addEventListener('click',function(){
    root.setAttribute('data-theme', current()==='dark'?'light':'dark'); drawDonut();
  });
  window.matchMedia('(prefers-color-scheme:dark)').addEventListener('change',drawDonut);
  document.getElementById('yr').textContent=new Date().getFullYear();
  var data=[['Verticales Fintech',14,'--c1'],['Micro-SaaS PyME',11,'--c3'],['Plataforma',7,'--c6'],['Núcleo Fintech',5,'--c2'],['Enterprise B2B',5,'--c4'],['ML & Datos',5,'--c5'],['Portfolio poliglota',5,'--c7']];
  var total=data.reduce(function(s,d){return s+d[1]},0);
  function cssv(v){return getComputedStyle(root).getPropertyValue(v).trim()}
  var cv=document.getElementById('donut'), ctx=cv.getContext('2d');
  function drawDonut(){
    var dpr=Math.max(1,window.devicePixelRatio||1), size=190;
    cv.width=size*dpr; cv.height=size*dpr; cv.style.width=size+'px'; cv.style.height=size+'px';
    ctx.setTransform(dpr,0,0,dpr,0,0); ctx.clearRect(0,0,size,size);
    var cx=size/2, cy=size/2, r=size/2-6, inner=r*0.62, a=-Math.PI/2, ring=cssv('--surface');
    data.forEach(function(d){ var frac=d[1]/total, a2=a+frac*Math.PI*2;
      ctx.beginPath(); ctx.moveTo(cx,cy); ctx.arc(cx,cy,r,a,a2); ctx.closePath(); ctx.fillStyle=cssv(d[2]); ctx.fill();
      ctx.lineWidth=2.5; ctx.strokeStyle=ring; ctx.stroke(); a=a2; });
    ctx.beginPath(); ctx.arc(cx,cy,inner,0,Math.PI*2); ctx.fillStyle=cssv('--surface'); ctx.fill();
    ctx.fillStyle=cssv('--ink'); ctx.textAlign='center'; ctx.textBaseline='middle';
    ctx.font='600 34px "Iowan Old Style",Palatino,Georgia,serif'; ctx.fillText(String(total),cx,cy-6);
    ctx.fillStyle=cssv('--muted'); ctx.font='11px ui-monospace,Menlo,Consolas,monospace'; ctx.fillText('PROYECTOS',cx,cy+16);
  }
  var lg=document.getElementById('legend');
  data.forEach(function(d){ var li=document.createElement('li'); li.innerHTML='<span class="sw" style="background:var('+d[2]+')"></span>'+d[0]+'<span class="lv">'+d[1]+'</span>'; lg.appendChild(li); });
  drawDonut();
  var rt; window.addEventListener('resize',function(){clearTimeout(rt);rt=setTimeout(drawDonut,150)});
  var reduce=window.matchMedia('(prefers-reduced-motion:reduce)').matches, rv=document.querySelectorAll('.rv');
  if(reduce||!('IntersectionObserver'in window)){ rv.forEach(function(e){e.classList.add('in')}); }
  else{ var io=new IntersectionObserver(function(es){ es.forEach(function(e){ if(e.isIntersecting){ e.target.classList.add('in'); io.unobserve(e.target); } }); },{threshold:.12,rootMargin:'0px 0px -8% 0px'}); rv.forEach(function(e){io.observe(e)}); }
})();
</script>
</body>
</html>
