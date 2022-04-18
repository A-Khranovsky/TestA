<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\GeoCodingRestApiEngine\GeoCodingRestApiEngine;
use App\Services\GeoCodingRestApiEngine\GeocodingRestApiEngineinterface;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function get(Request $request, GeocodingRestApiEngineinterface $geocodingRestApiEngine)
    {
        return $geocodingRestApiEngine->getLocation($request->longitude, $request->latitude);
    }
}
