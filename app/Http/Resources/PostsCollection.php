<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Traits\Poststrait;

class PostsCollection extends Resource
{
    use Poststrait;

    public function toArray($request)
    {
        $totallikes=$this->totallikes($this->id);

        $totalcomments=$this->totalcomments($this->id);

        $totalshares=$this->totalshares($this->id);

        return [

            'id' => $this->id,

            'post_title' => $this->post_title ==null ? '0' : $this->post_title,

            'postimage' => $this->post_image ==null ? '0' : asset('public/postImages/'.$this->post_image),
            'checkin' => $this->checkin ==null ? '0' : $this->checkin,

            'location' => $this->location ==null ? '0' : $this->location,

            'totalLikes' =>strval($totallikes),

            'totalComments' =>strval($totalcomments),

            'totalShares' =>strval($totalshares),
            'user_id'=>$this->customer_id,
            'username' => $this->full_name ==null ? '0' : $this->full_name,
            'user_image'=>$this->user_image ==null ? '0' : asset('public/userimage/'.$this->user_image),
            'follow_id'=>$this->customer_id,


        ];
    }
}
