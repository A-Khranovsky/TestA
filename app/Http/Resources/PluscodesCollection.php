<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PluscodesCollection extends JsonResource
{
    public function toArray($request)
    {
        return [
            'compound_code'=> $this->compound_code,
            'global_code'=> $this->global_code,
        ];
    }
}
