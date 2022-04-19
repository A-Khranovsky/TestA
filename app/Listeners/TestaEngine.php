<?php

namespace App\Listeners;

use App\Events\GetLocation;
use App\Services\DBEngine\DBEngineinterface;
use App\Services\GeoCodingRestApiEngine\GeocodingRestApiEngineinterface;
use Illuminate\Http\Response;
use Illuminate\Queue\InteractsWithQueue;

class TestaEngine
{
    private $geocodingRestApiEngine;
    private $DBEngine;

    public function __construct
        (
            GeocodingRestApiEngineinterface $geocodingRestApiEngine,
            DBEngineinterface $DBEngine
        )
    {
        $this->geocodingRestApiEngine = $geocodingRestApiEngine;
        $this->DBEngine = $DBEngine;
    }

    public function handleGetLocation($event)
    {

        $this->DBEngine->storeLocation($event->longitude, $event->latitude,$this->geocodingRestApiEngine
            ->getLocationData($event->longitude, $event->latitude));
    }

    public function subscribe($events)
    {
        $events->listen(
            GetLocation::class,
            [TestaEngine::class, 'handleGetLocation']
        );
    }
}
