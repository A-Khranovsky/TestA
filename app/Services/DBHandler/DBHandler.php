<?php

namespace App\Services\DBHandler;

use App\Models\Address;
use App\Models\City;
use App\Models\Region;
use App\Traits\GeoCodeParser;

class DBHandler implements DBHandlerinterface
{
    use GeoCodeParser;

    public function storeLocation(array $haystack, string $latitude, string $longitude)
    {
        $location = $this->findLocation($haystack, 'administrative_area_level_1');
        $region = Region::create([
            'short_name' => $location['short_name'],
            'long_name' => $location['long_name']
        ]);

        $location = $this->findLocation($haystack, 'locality');
        City::create([
            'short_name' => $location['short_name'],
            'long_name' => $location['long_name'],
            'region_id' => $region->id
        ]);

        $address = $this->findAddress($haystack);
        Address::create([
            'latitude' => $latitude,
            'longitude' => $longitude,
            'name' => $address['formatted_address'],
            'region_id' => $region->id
        ]);
    }
}
