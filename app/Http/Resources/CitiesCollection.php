<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CitiesCollection extends JsonResource
{
    public function toArray($request)
    {
        return [
            'long_name' => $this->long_name,
            'short_name' => $this->short_name,
        ];
    }
}
