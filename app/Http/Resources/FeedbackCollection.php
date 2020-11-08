<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class FeedbackCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'id' => $this->id,

            'full_name' => $this->full_name ==null ? '0' : $this->full_name,

            'street_address' => $this->street_address ==null ? '0' : $this->street_address,

            'feedback' => $this->feedback ==null ? '0' : $this->feedback,

            'improvement' => $this->improvement ==null ? '0' : $this->improvement,
   
        ];
    }
}
