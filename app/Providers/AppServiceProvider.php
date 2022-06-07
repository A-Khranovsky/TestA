<?php

namespace App\Providers;

use App\Services\DBHandler\DBHandler;
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
        $dbHandler = new DBHandler(new GeoCodeParser());
        $this->app->instance(DBHandler::class, $dbHandler);

//        $this->app->singleton(GeoCodeParserinterface::class, function () {
//            return new GeoCodeParser;
//        });

        $this->app->singleton(GeoCodingHandlerinterface::class, function () {
            return new GeoCodingHandler();
        });

//        $this->app->singleton(DBHandlerinterface::class, function ($app) {
//            return new DBHandler($app->make(GeoCodeParserinterface::class));
//        });
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
