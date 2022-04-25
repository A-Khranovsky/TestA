<?php

use App\Http\Controllers\Api\MainController;
use Illuminate\Support\Facades\Route;

Route::post('/location/findout', [MainController::class, 'findOutLocation']);
Route::get('/locations', [MainController::class, 'index']);
Route::resource('locations.region', MainController::class)
    ->only('show')->shallow();
