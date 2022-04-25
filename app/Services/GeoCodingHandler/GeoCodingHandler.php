<?php

namespace App\Services\GeoCodingHandler;

class GeoCodingHandler implements GeoCodingHandlerinterface
{
    protected $url;
    protected $api_key;

    public function __construct()
    {
        $this->url = config('geocoding.url');
        $this->api_key = config('geocoding.api_key');
    }

    public function getLocationData($latitude, $longitude)
    {
        $params = [
            'latlng' => $latitude . ',' . $longitude,
            'key' => $this->api_key
        ];
        return json_decode(file_get_contents($this->url . '?' . http_build_query($params)), true);
    }
}
