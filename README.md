# serguicv — Portfolio de Sergio Troche

> Hub central del ecosistema Kapitalya: portfolio técnico bilingüe con widget de tasas FX en vivo y endpoint `/status` que agrega el health de todos los microservicios.
>
> **Canónico:** este directorio (`apps/public/serguicv/`, Laravel completo) es el serguicv real y activo.
> Fuera del monorepo, en la raíz de `e:\data` (`web/serguicv`), existe una cáscara vacía remanente de
> antes de la reorg 2026-07 — no tiene código y no debe usarse como fuente de verdad.

**Stack:** Laravel 9 · PHP 8.1 · Blade · jQuery · Redis · **URL:** cv.kapitalya.com.bo · **Estado:** ✅ K8s Running

---

## Qué resuelve

Sergio Troche, Data Scientist & ML Engineer radicado en La Paz, Bolivia, necesitaba una presencia web profesional que no solo presentara su perfil técnico sino que también funcionara como punto de entrada unificado al ecosistema Kapitalya para reclutadores, clientes y colaboradores.

El portfolio resuelve dos problemas simultáneos: (1) visibilidad profesional con CV descargable, galería filtrable de proyectos, gráfico radar de habilidades y formulario de contacto con rate limiting; y (2) observabilidad del ecosistema a través del endpoint `/status` que agrega el estado de health de todos los microservicios en tiempo real.

La integración con Tromay vía `TROMAY_INTERNAL_URL` permite mostrar un widget de tasas USD/BOB en vivo directamente en la página de inicio, demostrando la interconexión entre servicios del monorepo.

## Propuesta de valor

| | |
|--|--|
| **Problema** | Portfolio técnico sin presencia web, sin punto de entrada al ecosistema |
| **Solución** | Laravel hub bilingüe (es/en) con widget FX en vivo y `/status` agregado |
| **Resultado** | Punto de entrada único al ecosistema visible para reclutadores y clientes |

---

## Stack técnico

| Componente | Tecnología |
|------------|-----------|
| Backend | Laravel 9.x · PHP 8.1 |
| Frontend | Blade templates · jQuery · Chart.js |
| Cache | Redis 7 (page cache 120 min, allkeys-lru 64 MB) |
| Servidor | Nginx + PHP-FPM (Supervisor) |
| Build | Vite 3 |
| Mail | Gmail SMTP (Laravel Mailer) |
| Monitoreo | Sentry (opcional) |
| Contenedor | Docker · Compose · PHP-FPM Alpine |

---

## Arquitectura

```
Cloudflare Tunnel
       │
  Nginx (ingress K8s)
       │
  serguicv_app (PHP-FPM + Nginx via Supervisor)
       │              │
   Redis cache     TROMAY_INTERNAL_URL (http://tromay_app:80)
   (page 120 min)     └─ widget tasas USD/BOB en tiempo real

  /status  →  agrega health checks de todos los microservicios
              (forex-erp, exchange-alert, findemproai, etc.)
```

El contenedor corre Nginx y PHP-FPM juntos bajo Supervisor. OPcache habilitado con `validate_timestamps=0` para máximo rendimiento en producción.

---

## Endpoints principales

| Método | Ruta | Descripción |
|--------|------|-------------|
| `GET` | `/` | Portfolio en español (cache 120 min) |
| `GET` | `/en` | Portfolio en inglés (cache 120 min) |
| `POST` | `/contact` | Formulario de contacto (throttle 5 req/min) |
| `GET` | `/status` | Agregador de health de todos los microservicios |
| `GET` | `/health` | Health check del propio contenedor |
| `GET` | `/sitemap.xml` | Sitemap XML (SEO) |
| `GET` | `/cv/download` | Descarga PDF del CV (throttle 10 req/min) |
| `POST` | `/project/{slug}/view` | Analytics de vistas de proyectos |
| `POST` | `/leads` | Captura de leads (throttle 10/5 min) |

---

## Estructura del proyecto

```
serguicv/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── PortfolioController.php   # Renderizado + /status + CV download
│   │   │   ├── ContactController.php     # Formulario de contacto + mail
│   │   │   └── LeadController.php        # Captura de leads
│   │   └── Middleware/
│   │       ├── SecurityHeaders.php       # CSP, HSTS, X-Frame-Options
│   │       └── CacheStaticPages.php      # Cache de página completa (120 min)
│   └── Mail/
│       └── ContactMail.php
├── lang/
│   ├── en/portfolio.php                  # ~307 claves en inglés
│   └── es/portfolio.php                  # Espejo en español
├── public/
│   ├── css/ · js/ · images/ · cv/
│   └── js/portfolio-enhanced.js          # Contadores, radar Chart.js, dark/light
├── resources/views/
│   ├── layout/master.blade.php
│   ├── onepage.blade.php                 # Vista principal (single-page)
│   └── sitemap.blade.php
├── routes/web.php
├── docker/
│   ├── nginx.conf
│   ├── www.conf                          # PHP-FPM pool (max_children=20)
│   └── supervisord.conf
├── docker-compose.yml
├── Dockerfile
├── deploy.sh
└── DEPLOYMENT.md
```

---

## Variables de entorno

| Variable | Descripción | Requerida |
|----------|-------------|-----------|
| `APP_KEY` | Clave de cifrado Laravel | Sí |
| `APP_URL` | URL base de la aplicación | Sí |
| `APP_LOCALE` | Idioma por defecto (`es` o `en`) | No (es) |
| `MAIL_USERNAME` | Gmail para el formulario de contacto | Sí |
| `MAIL_PASSWORD` | App Password de Gmail | Sí |
| `MAIL_PORTFOLIO_RECIPIENT` | Email receptor del formulario | Sí |
| `REDIS_HOST` | Host Redis para page cache | No (redis) |
| `TROMAY_INTERNAL_URL` | URL interna de Tromay para tasas FX | No |
| `TROMAY_URL` | URL pública de Tromay | No |
| `FINDEMPROAI_URL` | URL pública de FindemproAI | No |
| `OPEN_TO_WORK` | Flag "open to work" visible en hero | No (true) |
| `SENTRY_LARAVEL_DSN` | DSN de Sentry para errores | No |

---

## K8s / Despliegue

- **Namespace:** `private` (junto a tromay, forex-erp, exchange-alert, findemproai, findemprolareos —
  ver `CLAUDE.md` raíz del monorepo; el namespace `public` está vacío, el tráfico llega vía Cloudflare Tunnel)
- **URL producción:** https://cv.kapitalya.com.bo
- **Imagen:** `kapitalya/serguicv:vYYYYMMDD` (imagePullPolicy: IfNotPresent)
- **Health check K8s:** `GET /health` → `{"status":"ok"}`
- **Deploy:** ver `DEPLOYMENT.md`

> ⚠️ **Cluster en migración (desde 2026-07-08):** el K8s de 8 nodos en Docker Desktop (Windows,
> incluía el worker `desktop-worker3` referenciado en versiones previas de este doc) fue
> abandonado; el entorno activo es Ubuntu Server y el cluster nuevo (k3s/kubeadm) está pendiente
> de instalar. No hay manifests `k8s/` en este proyecto (a diferencia de otros `apps/public/*`) —
> el despliegue actual es Docker Compose (ver abajo). El workflow de imagen abajo aplica cuando
> el cluster nuevo esté arriba.

```bash
# Build + import K8s (workflow estándar Kapitalya — NUNCA docker push)
docker build -t kapitalya/serguicv:v$(date +%Y%m%d) .
docker save kapitalya/serguicv:v$(date +%Y%m%d) | docker exec -i <nodo-worker> ctr images import -
```

---

## Desarrollo local

```bash
# Con Docker Compose (host 9081 → contenedor 80, ver docker-compose.yml)
docker compose up -d --build
# Acceder en http://localhost:9081

# Sin Docker (o vía dev.bat en Windows / ./dev.sh code serguicv desde la raíz del monorepo)
composer install
npm install && npm run dev   # Vite en :5174
cp .env.example .env
php artisan key:generate
php artisan serve
# Acceder en http://localhost:8001
```

---

## Conexiones con otros servicios

| Servicio | Dirección | Uso |
|---------|-----------|-----|
| **Tromay** | `TROMAY_INTERNAL_URL` (interno K8s) | Widget tasas USD/BOB en vivo |
| **Todos los microservicios** | URLs configurables por env | `/status` agrega health checks |
| **FindemproAI** | `FINDEMPROAI_URL` | Link en sección proyectos |
| **FindemproLacteos** | `FINDEMPROLAREOS_URL` | Link en sección proyectos |
| **Forex ERP** | `FOREX_URL` | Link en sección proyectos |
| **Exchange Alert** | `ALERTAS_URL` | Link en sección proyectos |

---

## Seguridad

- `SECRET_KEY`: fail-fast — Laravel falla si `APP_KEY` no está definida
- **CORS:** no aplica (aplicación server-side Blade)
- **CSP:** restringe a `self` + Google Fonts CDN; bloquea inline eval
- **HSTS:** solo producción — `max-age=31536000; includeSubDomains`
- **Rate limiting:** contacto 5 req/min · leads 10 req/5min · /status 30 req/min · CV download 10 req/min
- **CSRF:** `/contact`, `/leads` y `/project/*/view` están exentos — el page-cache de 120 min
  serviría el token de otra sesión (419 para todos). Compensado con throttle + honeypot
  (campo oculto `website`: si viene lleno, éxito falso sin enviar nada)
- **Email anti-CRLF:** regla `email:filter` en Contact/Lead (mitiga GHSA-5vg9-5847-vvmq,
  sin fix en Laravel 9 EOL; el email del visitante se usa en `replyTo`)
- **Composer audit:** escaneo CVE en cada CI run (informativo — Laravel 9 EOL)
- **OPcache:** `validate_timestamps=0` en producción (sin overhead de stat)

---

## CI/CD

GitHub Actions en `.github/workflows/ci.yml`:

```
push/PR → master
    │
    ├── test    → PHP 8.1, PHPUnit, validación lang keys es==en
    ├── audit   → composer audit + grep API key leaks
    └── deploy  → SSH → git pull → composer install --no-dev → artisan optimize
```

---

## Integración Hub SSO

Enlazado con [Kapitalya Hub](https://kapitalya.com.bo) — portal central del ecosistema.

El proyecto no implementa `hub_auth` (PHP/Laravel). El acceso desde el Hub es directo via enlace público.

**Frontend:** botón "← Hub" agregado en la navegación principal (`resources/views/partials/header.blade.php` en nav-extras).

---

## Autor

**Sergio Troche** — Systems Engineer · MBA · MSc AI & Data Science (en progreso)  
Analista de Datos Financieros @ Kapitalya · La Paz, Bolivia · Open to Remote  
sergio.denis.troche.mayta@gmail.com · WhatsApp: +591 78939071
