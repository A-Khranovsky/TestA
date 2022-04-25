<?php

namespace App\Events;

class LocationStoreEvent
{
    public $latitude;
    public $longitude;
    public $locationResponseData;

    public function __construct($locationResponseData, $latitude, $longitude)
    {
        $this->locationResponseData = $locationResponseData;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }
}
