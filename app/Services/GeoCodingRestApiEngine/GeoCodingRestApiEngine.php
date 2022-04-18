<?php


namespace App\Services\GeoCodingRestApiEngine;


class GeoCodingRestApiEngine implements GeocodingRestApiEngineinterface
{
    protected $url;
    protected $api_key;
    protected $accept;

    public function __construct($url, $accept, $api_key)
    {
        $this->url = $url;
        $this->accept = $accept;
        $this->api_key = $api_key;
    }

    public function getLocation($longitude, $latitude)
    {

    }
}
