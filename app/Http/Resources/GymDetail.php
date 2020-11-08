<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\LocationResource;
use App\models\Location;

class GymDetail extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $location=Location::where('gym_id',$request->id)->get();

        return [

            'id' =>$this->id,

            'full_name' => $this->full_name ==null ? '0' : $this->full_name,

            'email' => $this->email ==null ? '0' : $this->email,

            'password' => $this->password ==null ? '0' : $this->password,

            'full_name1' => $this->full_name1 ==null ? '0' : $this->full_name1,

            'zipcode' => $this->zipcode ==null ? '0' : $this->zipcode,

            'street_address' => $this->street_address ==null ? '0' : $this->street_address,

            'phoneno' => $this->phoneno ==null ? '0' : $this->phoneno,

            'gym_detail' => $this->gym_detail ==null ? '0' : $this->gym_detail,

            'cost_per_day' => $this->cost_per_day ==null ? '0' : $this->cost_per_day,

            'status' => $this->status ==null ? 'not approved' : $this->status,

            'date' =>  date('d/m/Y',strtotime($this->created_at)),

            'time' =>  date('H:i:s',strtotime($this->created_at)),  

            'location' =>LocationResource::collection($location),   

           
        ];
    }
}
