<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TestaRestApiEngine\TestaRestApiEngineinterface;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    protected $testaApiEngine;

    public function __construct(TestaRestApiEngineinterface $testaApiEngine)
    {
        $this->testaApiEngine = $testaApiEngine;
    }

    public function get(Request $request)
    {
        return response()->json($this->testaApiEngine->getLocation($request));
    }
}
