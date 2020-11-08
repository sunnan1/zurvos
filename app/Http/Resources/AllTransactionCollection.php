<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AllTransactionCollection extends JsonResource
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
            'amount'=>$this->amount,

            'currency' => $this->currency ==null ? '0' : $this->currency,
            'description' => $this->description ==null ? '0' : $this->description,

            'status' => $this->status ==null ? '0' : $this->status,


       
            'stripe-charge_id' => $this->charge_id ==null ? '0' : $this->charge_id,
            'order_for' => $this->order_for ==null ? '0' : $this->order_for,
            'order_id' => $this->order_id ==null ? '0' : $this->order_id,
            'user_name' => $this->user_name ==null ? '0' : $this->user_name,
            'email' => $this->email ==null ? '0' : $this->email,
            'phone' => $this->phone ==null ? '0' : $this->phone,
                
            


        ];
    }

}