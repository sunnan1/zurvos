<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class RecentgymsCollection extends Resource
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

            'id' => $this->id,

            'full_name' => $this->full_name ==null ? '0' : $this->full_name,

            'full_name1' => $this->full_name1 ==null ? '0' : $this->full_name1,

        ];
    }
}
