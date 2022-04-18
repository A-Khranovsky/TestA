<?php


namespace App\Services\GeoCodingRestApiEngine;


interface GeocodingRestApiEngineinterface
{
    public function getLocation($longitude, $latitude);
}
