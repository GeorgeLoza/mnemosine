<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Documentacion;
use App\Observers\DocumentacionObserver;
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
    //     if (config('app.env') === 'production') {
    //         URL::forceScheme('https');
    //     }
        Documentacion::observe(DocumentacionObserver::class);
        
    }
}
