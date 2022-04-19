<?php

namespace App\Http\Controllers\Api;

use App\Events\GetLocation;
use App\Http\Controllers\Controller;

use App\Services\GeoCodingRestApiEngine\GeocodingRestApiEngineinterface;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function get(Request $request, GeocodingRestApiEngineinterface $geocodingRestApiEngine)
    {
        event(new GetLocation($request->latitude, $request->longitude));
//        return response($geocodingRestApiEngine
//            ->getLocationData($request->latitude, $request->longitude), 200);
    }
}
