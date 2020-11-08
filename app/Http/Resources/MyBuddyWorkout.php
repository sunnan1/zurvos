<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class MyBuddyWorkout extends JsonResource
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

            'request_id' => $this->id,

            'buddy_name' => $this->full_name ==null ? '0' : $this->full_name,
            'delete'=> Route('deletebuddy',$this->id),
            'profile'=>Route('userprofile',$this->customer_id),
            
        ];
    }
}
