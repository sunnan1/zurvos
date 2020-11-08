<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class allfollow extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'id' => $this->id,

            'full_name'=>$this->full_name,

            'address'=>$this->street_address,

        ];
    }
}
