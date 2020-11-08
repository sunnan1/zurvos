<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AllOrderProductsCollection extends JsonResource
{
   
    public function toArray($request)
    {
        return [

            'id' => $this->id,
            'order_status'=>$this->status,
            'product_name' => $this->product_name ==null ? '0' : $this->product_name,

            'product_price' => $this->product_price ==null ? '0' : $this->product_price,
            'product_type' => $this->product_type ==null ? '0' : $this->product_type,
            'product_description' =>$this->product_description ==null ? '0' : $this->product_description,
            'product_image' => $this->product_image ==null ? '0' : asset('public/productImages/'.$this->product_image),
            'user_full_name' => $this->full_name ==null ? '0' : $this->full_name,
            'user_email' => $this->email ==null ? '0' : $this->email,
            'user_phone_no' => $this->phone_no ==null ? '0' : $this->phone_no,
            'latitude' => $this->latitude ==null ? '0' : $this->latitude,
            'longitude' => $this->longitude ==null ? '0' : $this->longitude,
            'address' => $this->address ==null ? '0' : $this->address,
        ];
    }
}
