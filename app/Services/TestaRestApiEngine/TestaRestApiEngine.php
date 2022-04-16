<?php

namespace App\Services\TestaRestApiEngine;

use Illuminate\Http\Request;

class TestaRestApiEngine implements TestaRestApiEngineinterface
{
    public function getLocation($request)
    {
        return [$request->longitude, $request->latitude ];
    }

}
