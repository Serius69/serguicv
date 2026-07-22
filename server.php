<?php

/**
 * Router script for `php -S 0.0.0.0:8001 server.php` (local dev on Windows).
 *
 * Replicates Apache mod_rewrite:
 *   - Requests for files that exist inside /public → serve directly (no PHP).
 *   - Everything else → Laravel (public/index.php).
 *
 * This bypasses `php artisan serve` which crashes on Windows due to a
 * date-parsing bug in ServeCommand.php (Illuminate issue #49789).
 */

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

$publicFile = __DIR__ . DIRECTORY_SEPARATOR . 'public' . $uri;

if ($uri !== '/' && is_file($publicFile)) {
    return false; // PHP built-in server serves the file directly
}

require_once __DIR__ . '/public/index.php';
