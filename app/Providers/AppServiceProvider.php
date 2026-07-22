<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Only force HTTPS in production when actually behind a real HTTPS server.
        // Skipping localhost prevents asset() from generating https:// URLs that
        // php artisan serve cannot answer, which would break CSP 'self' matching
        // (http page origin vs https asset URL = different origin = blocked).
        if ($this->app->environment('production') && !$this->isLocalhost()) {
            URL::forceScheme('https');
            URL::forceRootUrl(config('app.url'));
        }
    }

    private function isLocalhost(): bool
    {
        try {
            $host = request()->getHost();
            return in_array($host, ['localhost', '127.0.0.1', '::1'], true);
        } catch (\Throwable) {
            return false;
        }
    }
}
