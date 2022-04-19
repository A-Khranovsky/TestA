<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressesCollection extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'name' => $this->name,
            'region' => RegionsCollection::collection($this->region()->get()),
            'city' => CitiesCollection::collection($this->region->cities()->get())
        ];
    }
}
