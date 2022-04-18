<?php


namespace App\Services\GeoCodingRestApiEngine;


interface GeocodingRestApiEngineinterface
{
    public function getLocationData($longitude, $latitude);
}
