<?php

namespace App\Providers;

use App\Services\DBHandler\DBHandler;
use App\Services\DBHandler\DBHandlerinterface;
use App\Services\GeoCodeParser\GeoCodeParser;
use App\Services\GeoCodingHandler\GeoCodingHandler;
use App\Services\GeoCodingHandler\GeoCodingHandlerinterface;
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
        $this->app->singleton(GeoCodingHandlerinterface::class, function () {
            return new GeoCodingHandler();
        });

        $this->app->singleton(DBHandlerinterface::class, function ($app) {
            return new DBHandler($app->make(GeoCodeParser::class));
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
