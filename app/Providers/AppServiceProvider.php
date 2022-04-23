<?php

namespace App\Providers;

use App\Services\DBEngine\DBEngine;
use App\Services\DBEngine\DBEngineinterface;
use App\Services\GeoCodingRestApiEngine\GeoCodingRestApiEngine;
use App\Services\GeoCodingRestApiEngine\GeocodingRestApiEngineinterface;
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
        $this->app->singleton(GeoCodingRestApiEngineinterface::class, function () {
            return new GeoCodingRestApiEngine;
        });

        $this->app->singleton(DBEngineinterface::class, function () {
            return new DBEngine;
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
