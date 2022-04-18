<?php

namespace App\Http\Controllers\Api;

use App\Events\GetLocation;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function get(Request $request)
    {
        event(new GetLocation($request->longitude, $request->latitude));
    }
}
