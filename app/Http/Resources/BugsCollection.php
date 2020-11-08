<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class BugsCollection extends Resource
{
    
    public function toArray($request)
    {
         $myimages=[];
         $images=json_decode($this->report_images);

         foreach ($images as $value) {

             array_push($myimages, asset('public/reportImages/'.$value)); 
         }

        return [

            'id' => $this->id,

            'full_name' => $this->full_name ==null ? '0' : $this->full_name,

            'email' => $this->email ==null ? '0' : $this->email,

            'report_message' => $this->report_message ==null ? '0' : $this->report_message,

            'files'=>$myimages,
                
            


        ];
    }
}
