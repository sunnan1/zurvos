<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use DB;
class SingleExcercse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        
    $influence=DB::table('customers')->where('id',$this->customer_id)->first();
        return [

            'id' =>$this->id,
            'video_title' => $this->video_title ==null ? '0' : $this->video_title,
            'created_by' => $influence->full_name,
            'user_image'=>$influence->user_image ==null ? '0' : asset('public/userimage/'.$influence->user_image),
            'video_description' => $this->video_description ==null ? '0' : $this->video_description,
            'video' => $this->video_name ==null ? '0' : asset('public/lib_videos/'.$this->video_name),
        ];
    }
}
