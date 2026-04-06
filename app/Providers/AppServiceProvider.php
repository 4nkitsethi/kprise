<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        // This forces Laravel to use your .env APP_URL for all generated links
        if (!empty(config('app.url'))) {
            URL::forceRootUrl(config('app.url'));
        }

        // This ensures HTTPS is used for all links (fixing the broken CSS/JS)
        if (app()->environment('production') || str_contains(config('app.url'), 'https')) {
            URL::forceScheme('https');
        }
    }
}
