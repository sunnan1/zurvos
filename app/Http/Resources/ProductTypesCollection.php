<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ProductTypesCollection extends Resource
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

             'product_type' => $this->product_type ==null ? '0' : $this->product_type,

             'related_products' =>route('related-products',$this->product_type)

        ];
    }
}
