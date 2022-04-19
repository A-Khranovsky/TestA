<?php

namespace App\Listeners;

use App\Events\GetLocation;
use App\Services\GeoCodingRestApiEngine\GeocodingRestApiEngineinterface;
use Illuminate\Http\Response;
use Illuminate\Queue\InteractsWithQueue;

class TestaEngine
{
    private $geocodingRestApiEngine;

    public function __construct(GeocodingRestApiEngineinterface $geocodingRestApiEngine)
    {
        $this->geocodingRestApiEngine = $geocodingRestApiEngine;
    }

    public function handleGetLocation($event)
    {
//        echo response()->json($this->geocodingRestApiEngine
//            ->getLocationData($event->longitude, $event->latitude));
        //return 'rr';
       //response('www', 200);
//        ->json($this->geocodingRestApiEngine
//            ->getLocationData($event->longitude, $event->latitude), 200);
    }

    public function subscribe($events)
    {
        $events->listen(
            GetLocation::class,
            [TestaEngine::class, 'handleGetLocation']
        );
    }
}
