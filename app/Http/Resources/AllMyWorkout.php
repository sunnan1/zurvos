<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Customer;
class AllMyWorkout extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
            $data1=Customer::find($this->customer_id);
        return [

            'workout_id' => $this->id,

            'workout_title' => $this->workout_title ==null ? '0' : $this->workout_title,
            'workout_goal'=>$this->goal,
            'workout_level'=>$this->workout_level,
            'workout_type'=>$this->type,
            'user_id'=>$data1->id,
            'user_name'=>$data1->full_name,
            'user_image'=>$data1->user_image ==null ? '0' : asset('public/userimage/'.$data1->user_image),
            'user_address'=>$data1->street_address ==null ? '0' : $data1->street_address,
            'user_city'=>$data1->city ==null ? '0' : $data1->city,
        ];
    }
}
