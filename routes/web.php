<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

Route::get('/health', function () {
    return response()->json([
        'status'    => 'ok',
        'app'       => config('app.name'),
        // 'env' omitido — no exponer entorno en producción
        'timestamp' => now()->toIso8601String(),
    ]);
});

Route::get('/', [PortfolioController::class, 'spanish'])
    ->middleware('cache.page:120')
    ->name('home.es');

Route::get('/en', [PortfolioController::class, 'english'])
    ->middleware('cache.page:120')
    ->name('home.en');

// Vista previa del rediseño ("dossier de datos"). Ruta aislada + noindex; NO toca
// la home actual. Se usa Route::view (NO closure) para que sea compatible con
// route:cache — un closure aquí haría fallar `php artisan route:cache` en el deploy.
Route::view('/v2', 'v2')->name('home.v2');

Route::post('/contact', [ContactController::class, 'send'])
    ->middleware('throttle:5,1')
    ->name('contact.send');

Route::get('/status', [PortfolioController::class, 'status'])
    ->middleware('throttle:30,1')
    ->name('status');

Route::get('/sitemap.xml', function () {
    $content = view('sitemap')->render();
    return Response::make($content, 200, ['Content-Type' => 'application/xml']);
})->name('sitemap');

// ── Analytics (no CSRF needed — exempt in VerifyCsrfToken) ──
Route::post('/project/{slug}/view', [PortfolioController::class, 'recordView'])
    ->middleware('throttle:30,1')
    ->name('project.view');

Route::get('/cv/download', [PortfolioController::class, 'downloadCv'])
    ->middleware('throttle:10,1')
    ->name('cv.download');

// ── Onboarding Área 5 ────────────────────────────────────────────────────────
Route::get('/sandbox', function () {
    return view('sandbox');
})->name('sandbox');

Route::post('/leads', [LeadController::class, 'store'])
    ->middleware('throttle:10,5')
    ->name('leads.store');
