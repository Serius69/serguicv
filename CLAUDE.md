# serguicv — Instrucciones para Claude Code

> Hub / portfolio del ecosistema Kapitalya. **No hay stack de otro tipo aquí**: es
> web-only (Laravel + Blade). Fuente de verdad del producto: `README.md`.
>
> **Canónico:** este directorio es el serguicv real. `web/serguicv` fuera del monorepo
> (raíz `e:\data`) es una cáscara vacía pre-reorg 2026-07 — no usarla como referencia.

## Qué es

Portfolio técnico bilingüe (es/en) de Sergio Troche que además funciona como punto de
entrada al ecosistema Kapitalya: widget de tasas USD/BOB en vivo (vía Tromay) y un
endpoint `/status` que agrega el health de todos los microservicios.

## Stack

- **Backend:** Laravel 9.x · PHP 8.1
- **Frontend:** Blade · jQuery · Chart.js (radar de skills) · Vite 3
- **Cache/contadores:** Redis 7 (page cache 120 min · vistas de proyectos · descargas CV) — **Redis DB 0**
- **Mail:** Gmail SMTP (contacto + captura de leads)
- **Observabilidad:** Sentry (opcional, `SENTRY_LARAVEL_DSN`)
- **Runtime prod:** Nginx + PHP-FPM bajo Supervisor (OPcache `validate_timestamps=0`)

## Puertos / URLs

| Contexto | Valor |
|----------|-------|
| Prod | https://cv.kapitalya.com.bo — namespace K8s `private` (no `public`, ver `CLAUDE.md` raíz) |
| Dev `php artisan serve` | http://localhost:8001 (ver `dev.bat`; README ya alineado) |
| Dev Vite | http://localhost:5174 |
| Docker Compose | host `9081` → contenedor `80` (`docker-compose.yml`) |
| Health K8s | `GET /health` → `{"status":"ok"}` |

> Cluster K8s en migración desde 2026-07-08 (Docker Desktop/Windows abandonado → Ubuntu Server
> pendiente de instalar); el worker `desktop-worker3` de docs previas ya no aplica. Sin `k8s/`
> en este proyecto — el despliegue vigente es Docker Compose. Ver `README.md` § K8s / Despliegue.

### Endpoints
`/` (es) · `/en` (en) · `POST /contact` (throttle 5/min) · `POST /leads` (throttle 10/5min)
· `GET /status` (agrega health en paralelo vía `Http::pool`; JSON si `Accept: application/json`; throttle 30/min)
· `/health` · `/sitemap.xml` · `GET /cv/download` (throttle 10/min) · `POST /project/{slug}/view` (analytics).

**CSRF:** `/contact`, `/leads` y `/project/*/view` están **exentos** (el page-cache de 120 min
serviría el token `@csrf` de otra sesión → 419 para todos). Compensación: throttle + honeypot
(campo oculto `website`; si viene lleno se responde éxito falso sin enviar nada).

## Estructura

```
app/Http/Controllers/  PortfolioController (render + /status + CV) · ContactController · LeadController
app/Http/Middleware/   SecurityHeaders (CSP/HSTS) · CacheStaticPages (page cache 120 min)
lang/{es,en}/portfolio.php   ~307 claves — deben mantenerse en paridad (test LangParity)
resources/views/       onepage.blade.php + partials/*  · status.blade.php · sitemap.blade.php
routes/web.php         todas las rutas
config/                portfolio.php (catálogo /status + URLs de vistas + open_to_work) · mail.php · services.php (kapitalya_admin)
tests/Feature/         EndpointsTest · LangParityTest · PageCacheTest · SecurityHeadersTest
docker/, Dockerfile, docker-compose.yml, DEPLOYMENT.md
```

## Cómo correr (dev)

```bash
composer install
npm install && npm run build      # o: npm run dev (Vite en :5174)
cp .env.example .env
php artisan key:generate
php artisan serve                 # http://localhost:8001
# o todo en Docker:
docker compose up -d --build      # http://localhost:9081
```

## Tests / lint

```bash
php artisan test                  # PHPUnit (env array: cache/mail/session — sin DB/Redis reales)
composer audit                    # CVE scan (informativo en CI — Laravel 9 EOL, ver abajo)

# Sin PHP local (p.ej. sesión Linux): correr la suite dentro de Docker
docker run --rm -v "$PWD":/app -w /app php:8.1-cli-alpine sh -c \
  'apk add --no-cache unzip git >/dev/null && \
   php -r "copy(\"https://getcomposer.org/installer\",\"/tmp/cs\");" && php /tmp/cs --install-dir=/usr/local/bin --filename=composer >/dev/null && \
   composer install --no-interaction --prefer-dist && php artisan test'
```

Los tests usan `Http::fake()` para no golpear servicios reales del ecosistema.
CI en `.github/workflows/ci.yml`: audit (informativo) → test (con dev-deps) → deploy (SSH a prod en push a main/master).

**Dependencias:** `composer.lock` está resuelto para PHP 8.1 (`config.platform.php` en
`composer.json`) — regenerarlo siempre bajo esa plataforma (o dentro del contenedor php:8.1).
`composer audit` reporta advisories de Laravel 9 (EOL, sin fix en 9.x); mitigaciones en app:
`email:filter` en Contact/Lead (CRLF), sin signed URLs ni uploads. Fix real: migrar a Laravel 12+.

## Variables de entorno clave

Todas documentadas en `README.md` y `.env.example`. Imprescindibles: `APP_KEY` (fail-fast),
`MAIL_USERNAME`/`MAIL_PASSWORD`. Ecosistema: `TROMAY_INTERNAL_URL` (widget FX), URLs de
servicios para `/status` (`FOREX_URL`, `ALERTAS_URL`, `LLM_URL`, …), `KAPITALYA_ADMIN_URL`
+ `KAPITALYA_ADMIN_TOKEN` (reenvío de leads). Flags: `OPEN_TO_WORK`, `SENTRY_LARAVEL_DSN`.

## Convenciones

- **Secretos** nunca en el repo; `APP_KEY`/mail via env/Secret.
- Nuevas claves de idioma → agregarlas en **es y en** (el test `LangParityTest` falla si divergen).
- Blade server-side (sin CORS). Headers de seguridad centralizados en `SecurityHeaders`.
- Deploy Docker del ecosistema: `docker save | ctr import` en `desktop-worker3` (nunca `docker push`).

## Integración Hub SSO

No implementa `hub_auth` (acceso público directo). Solo un botón "Hub" en el header que
enlaza a `https://kapitalya.com.bo` (`resources/views/partials/header.blade.php`).

## React Native

**N/A** — producto web-only por diseño; no existe ni se planea app RN/Expo.

## Pendientes

- **[infra, manual] Deploy CI:** requiere secrets `DEPLOY_HOST/USER/KEY/PATH` en GitHub —
  no automatizable desde aquí.
- **[manual] DNS Cloudflare:** el CNAME de `cv.kapitalya.com.bo` al túnel se gestiona fuera del repo.
- **[opcional] Sentry:** proveer `SENTRY_LARAVEL_DSN` real para activar reporte de errores.
- **[opcional] `KAPITALYA_ADMIN_TOKEN`:** sin token, el reenvío de leads a kapitalya-admin
  **no se intenta** (skip explícito); el email directo a Sergio siempre funciona.
- **[deuda] Migrar a Laravel 12+:** Laravel 9 es EOL y `composer audit` reporta advisories
  sin fix en 9.x (por eso el paso de audit en CI es informativo). Mitigado en app mientras tanto.
- **[config] `env()` prohibido fuera de `config/`:** todo pasa por `config/portfolio.php` /
  `config/services.php` para que `php artisan config:cache` funcione en prod.

## Sesión 2026-07-07 (claude/audit-modernize)

Modernización sobre patch vital ya auditado (no se reauditó). Repo sin `.git` local:
se inicializó `git init` + rama `claude/audit-modernize-2026-07-07`, sin remoto, sin push.

**Cambios aplicados** (`patch -p1` desde la raíz, LF en ambos archivos):
- `docker-compose.yml:30` — `CACHE_DRIVER: file` → `redis` (el servicio `app` ya depende de
  `redis:7-alpine` y la app cachea en Redis DB 0 según README/CLAUDE; el drift lo había dejado
  en `file` sin que hubiera razón funcional para ello).
- `README.md:204` — `.github/workflows/laravel.yml` → `ci.yml` (nombre real del único workflow
  existente en `.github/workflows/`).

**Dockerfile / `.dockerignore`:** revisados, sin cambios — ya cumplían el checklist de
higiene: base `php:8.1-fpm-alpine` pineada (no `latest`), `composer:2` pineado, sin secretos
embebidos, nginx/php-fpm ya corren como `www-data` (root solo lo usa supervisord/nginx master
para poder bindear el puerto 80, que es el patrón estándar — no se fuerza `USER www-data` en
el Dockerfile porque rompería el bind), `.dockerignore` ya incluye `.git`, `vendor`,
`node_modules`, `.env`. Validado con `docker compose config -q` → exit 0 (válido). Nota menor
no accionable: warning de compose sobre `$dTM1998` viene de `DB_PASSWORD` en `.env` (real,
gitignored) con un `$` sin escapar — falso positivo de interpolación de shell, no es un error
de `docker-compose.yml`; no se tocó `.env` (fuera de alcance, archivo de secretos real).

**DECISIÓN PENDIENTE — drift MySQL en `docker-compose.yml` (SKIP accionable, requiere al
usuario):** el compose trae un servicio `mysql` (mysql:8.0) + `DB_CONNECTION=mysql` en `app` +
red externa renombrada a `kapitalya-net`, todo sin commitear previamente (no había `.git` para
reconstruir el baseline). serguicv es **web-only sin BD real**: sus tests corren con env array
(`cache`/`mail`/`session`), sin DB ni Redis reales, y ni README ni CLAUDE.md documentan un uso
de MySQL en el producto — el único almacenamiento persistente documentado es Redis (cache +
contadores). Dos caminos:
  - **Revertir** (recomendado si MySQL fue un experimento local abandonado): quitar el servicio
    `mysql`, el volumen `mysql_data`, las env `DB_*` de `app`, y evaluar si `kapitalya-net`
    también debe volver a su nombre anterior. Reduce superficie de ataque y confusión operativa
    de un stack que el código no usa.
  - **Mantener** (si hay intención real de agregar persistencia): entonces falta comunicar esa
    decisión en README/CLAUDE.md (qué la usa, migraciones, etc.) — hoy es infraestructura
    huérfana sin contraparte en el código de la app.
  Sin acceso al historial git real de la máquina origen no se puede saber cuál de las dos es la
  intención; se deja explícitamente sin decidir (no se tocó el servicio `mysql` en este pase).

**RESUELTO (2026-07-08, rama `claude/audit-modernize-2026-07-07` del monorepo `kapitalya-ecosystem`):**
se tomó el camino **Revertir**. Se eliminó de `apps/public/serguicv/docker-compose.yml` el
servicio `mysql` (mysql:8.0), el volumen `mysql_data`, el `depends_on: mysql` del servicio `app`
y las env `DB_HOST/DB_PORT/DB_DATABASE/DB_USERNAME/DB_PASSWORD`; `DB_CONNECTION` se fijó a
`sqlite` (mínimo que no rompe el arranque; la app no consulta BD). Compose resultante web-only
(`app` + `redis`), validado con `docker compose config -q` → exit 0. Confirmado contra el backup
pre-reorg (`docker-compose.yml.pre-reorg.bak`), donde el servicio `serguicv` era web-only sin
MySQL ni env `DB_*`. La red externa `kapitalya-net` se mantuvo (es el gateway compartido del
ecosistema, no parte del drift MySQL). No se tocó `.env` ni otras apps del monorepo.
