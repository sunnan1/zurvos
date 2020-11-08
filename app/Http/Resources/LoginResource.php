<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
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

            'name' => $this->name ==null ? '0' : $this->name,

            'email' => $this->email ==null ? '0' : $this->email,

            'password' => $this->password ==null ? '0' : $this->password,

            'mobileno' => $this->mobileno ==null ? '0' : $this->mobileno,

            'image' => $this->image ==null ? '0' : asset('public/customerImages/'.$this->image),

            'message' => 'Login Successfully','status' =>'success'
        ];
    }
}
