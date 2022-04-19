<?php


namespace App\Services\GeoCodingRestApiEngine;


interface GeocodingRestApiEngineinterface
{
    public function getLocationData(string $latitude, string $longitude);
}
