<?php


namespace App\Services\DBEngine;


use App\Models\Address;
use App\Models\City;
use App\Models\Pluscode;
use App\Models\Region;

class DBEngine implements DBEngineinterface
{
    public function storeLocation($latitude, $logitude, $responseResult = [])
    {
        $address = null;
        $pluscode = null;
        $city = null;
        $region = null;

        if (array_key_exists('plus_code', $responseResult)) {
            $pluscode = Pluscode::create([
                'compound_code' => $responseResult['plus_code']['compound_code'],
                'global_code' => $responseResult['plus_code']['global_code'],
            ]);
        }

        if (isset($responseResult['results'])) {

            //searching of a region
            $flg_region = false;
            $flg_types = false;
            $flg_address_components = false;

            foreach ($responseResult['results'] as $item){
                if (isset($item['address_components'])){
                    foreach ($item['address_components'] as $itemitem) {
                        foreach($itemitem['types'] as $itemitemitem){
                            if($itemitemitem === 'administrative_area_level_1') {
                                $region = Region::create([
                                    'long_name'=> $itemitem['long_name'],
                                    'short_name'=> $itemitem['short_name'],
                                ]);
                                $flg_region = true;
                            }
                            if($flg_region){
                                $flg_types = true;
                                break;
                            }
                        }
                        if($flg_types){
                            $flg_address_components = true;
                            break;
                        }
                    }
                    if($flg_address_components){
                        break;
                    }
                }
            }

            //searching of a city
            $flg_city = false;
            $flg_types = false;
            $flg_address_components = false;

            foreach ($responseResult['results'] as $item){
                if (isset($item['address_components'])){
                    foreach ($item['address_components'] as $itemitem) {
                        foreach($itemitem['types'] as $itemitemitem){
                            if($itemitemitem === 'administrative_area_level_3') {
                                $city = City::create([
                                    'long_name'=> $itemitem['long_name'],
                                    'short_name'=> $itemitem['short_name'],
                                ]);
                                if(!is_null($region)){
                                    $city->region_id = $region->id;
                                    $city->save();
                                }
                                $flg_city = true;
                            }
                            if($flg_city){
                                $flg_types = true;
                                break;
                            }
                        }
                        if($flg_types){
                            $flg_address_components = true;
                            break;
                        }
                    }
                    if($flg_address_components){
                        break;
                    }
                }
            }

            //Searching of an address
            foreach ($responseResult['results'] as $item){
                if(isset($item['formatted_address'])){
                    $address = Address::create([
                        'latitude' => $latitude,
                        'longitude' => $logitude,
                        'name' => $item['formatted_address']
                    ]);

                    if(!is_null($pluscode)){
                        $address->pluscode_id = $pluscode->id;
                        $address->save();
                    }
                    if(!is_null($region)){
                        $address->region_id = $region->id;
                        $address->save();
                    }
                    break;
                }
            }
        }
    }

    public function getAllRecords()
    {

    }
}
