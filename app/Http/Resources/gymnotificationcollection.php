<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Carbon\Carbon;
class gymnotificationcollection extends Resource
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
            
            'status'=>$this->status,

            'message' => $this->message,
            
            'time'=>Carbon::parse($this->created_at)->diffForHumans(),
        ];
    }
}
