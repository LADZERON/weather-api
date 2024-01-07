<?php

namespace App\Providers;

use App\Http\Integrations\Currency\Requests\MonoBankRequest;
use Illuminate\Support\ServiceProvider;
use Saloon\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(Request::class, function () {
            return new MonoBankRequest();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
