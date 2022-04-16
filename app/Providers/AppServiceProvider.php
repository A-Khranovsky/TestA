<?php

namespace App\Providers;

use App\Services\TestaRestApiEngine\TestaRestApiEngine;
use App\Services\TestaRestApiEngine\TestaRestApiEngineinterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TestaRestApiEngineinterface::class, function () {
            return new TestaRestApiEngine();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
