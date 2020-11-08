<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class UserCheckoutHistory extends JsonResource
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

            'user_id'=>$this->customer_id,

            'user_name'=>$this->full_name,

            'check_out' => $this->check_out ==null ? '0' : Carbon::parse($this->check_out)->diffForHumans(),
            'user_image'=>$this->user_image ==null ? '0' : asset('public/userimage/'.$this->user_image)
            

        ];
    }
}
