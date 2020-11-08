<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserloginResource extends JsonResource
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

            'full_name' => $this->full_name ==null ? '0' : $this->full_name,
           
            'bio' => $this->bio ==null ? '0' : $this->bio,

            'email' => $this->email ==null ? '0' : $this->email,

            

            'city' => $this->city ==null ? '0' : $this->city,

            'phone_no' => $this->phone_no ==null ? '0' : $this->phone_no,

            'zip_code' => $this->zip_code ==null ? '0' : $this->zip_code,

            'street_address' => $this->street_address ==null ? '0' : $this->street_address,
             'shirt_size' => $this->shirt_size ==null ? '0' : $this->shirt_size,
            'gender' => $this->gender ==null ? '0' : $this->gender,
            
            'image' =>$this->user_image ==null ? '0' : asset('public/userimage/'.$this->user_image),
       
            'message' => 'Login Successfully','status' =>'success'
        ];
    }
}
