<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UseramountResource extends JsonResource
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

            'id' =>$this->id,

            'avalable_amount' => $this->avalable_amount,
       
            'message' => 'Record Found','status' =>'success'
        ];
    }
}
