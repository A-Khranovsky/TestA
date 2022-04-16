<?php

namespace App\Services\TestaRestApiEngine;

use Illuminate\Http\Request;

interface TestaRestApiEngineinterface
{
    public function getLocation(Request $request);
}
