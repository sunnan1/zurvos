<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class LocationResource extends Resource
{
    
    public function toArray($request)
    {

        return [

            'gym_id' => $this->gym_id,

            'location' => $this->location ==null ? '0' : $this->location,

        ];
    }
}
