<?php


namespace App\Services\GeoCoddingRestApiEngine;


interface GeocoddingRestApiEngineinterface
{
    public function getLocation($longitude, $latitude);
}
