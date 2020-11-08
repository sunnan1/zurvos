<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ProductsCollection extends Resource
{
   
    public function toArray($request)
    {
        return [

            'id' => $this->id,

            'product_name' => $this->product_name ==null ? '0' : $this->product_name,

            'product_price' => $this->product_price ==null ? '0' : $this->product_price,

            'product_image' => $this->product_image ==null ? '0' : asset('public/productImages/'.$this->product_image),
            'product_description' =>$this->product_description ==null ? '0' : $this->product_description,
        ];
    }
}
