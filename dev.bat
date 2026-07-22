@echo off
chcp 65001 >nul
setlocal

title SERGUICV - DEV

cd /d "%~dp0"

echo ============================================================
echo SERGUICV - MODO DESARROLLO
echo Laravel : http://localhost:8001
echo Vite    : http://localhost:5174
echo ============================================================
echo.

if not exist ".env" (
    echo [ERROR] .env no encontrado
    pause
    exit /b 1
)

if not exist "vendor\autoload.php" (
    echo [ERROR] Ejecuta composer install
    pause
    exit /b 1
)

if not exist "node_modules" (
    echo [ERROR] Ejecuta npm install
    pause
    exit /b 1
)

if not exist "server.php" (
    echo [ERROR] server.php no encontrado
    pause
    exit /b 1
)

rem -- Override production .env values so local dev behaves correctly.
rem -- APP_ENV=local evita que SecurityHeaders envie HSTS sobre HTTP.
rem -- APP_URL=http://localhost:8001 hace que asset() genere URLs locales.
SET APP_ENV=local
SET APP_DEBUG=true
SET APP_URL=http://localhost:8001

echo [1/2] Iniciando Vite...

start "SERGUICV VITE" /d "%~dp0" cmd /k "node node_modules\vite\bin\vite.js --host 0.0.0.0 --port 5174"

timeout /t 2 /nobreak >nul

echo [2/2] Iniciando Laravel con php -S...
echo.
echo Abre: http://localhost:8001
echo.

php -S 0.0.0.0:8001 server.php
