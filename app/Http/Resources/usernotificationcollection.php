<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Carbon\Carbon;
class usernotificationcollection extends Resource
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
            'full_name' => $this->full_name,
            'user_image'=>$this->user_image ==null ? '0' : asset('public/userimage/'.$this->user_image),
            
            'status'=>$this->status,

            'message' => $this->message,
            'post_title' => $this->post_title ==null ? '0' : $this->post_title,
            'postimage' => $this->post_image ==null ? '0' : asset('public/postImages/'.$this->post_image),
            'post'=>route('postsin',$this->post_id),
            'time'=>Carbon::parse($this->created_at)->diffForHumans(),
        ];
    }
}
