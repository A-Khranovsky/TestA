<?php


namespace App\Services\GeoCodingHandler;


interface GeoCodingHandlerinterface
{
    public function getLocationData(string $latitude, string $longitude);
}
