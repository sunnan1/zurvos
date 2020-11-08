<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AllOrderVideoCollection extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $myvideos=[];
         $videos=json_decode($this->course_videos);

         foreach ($videos as $value) {

             array_push($myvideos, asset('public/tutorialvideo/'.$value)); 
         }

        return [

            'id' => $this->id,
            'order_status'=>$this->status,

            'course_name' => $this->course_name ==null ? '0' : $this->course_name,
            'course_price' => $this->course_price ==null ? '0' : $this->course_price,

            'category' => $this->category ==null ? '0' : $this->category,


            'files'=>$myvideos,
            'user_full_name' => $this->full_name ==null ? '0' : $this->full_name,
            'user_email' => $this->email ==null ? '0' : $this->email,
            'user_phone_no' => $this->phone_no ==null ? '0' : $this->phone_no,
            'latitude' => $this->latitude ==null ? '0' : $this->latitude,
            'longitude' => $this->longitude ==null ? '0' : $this->longitude,
            'address' => $this->address ==null ? '0' : $this->address,
                
            


        ];
    }
}
