<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\models\Comment;

class CommentsCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $comments=Comment::all()->where('parent_comment_id',$this->id);

        return [

            'id' => $this->id,

            'post_id' => $this->post_id ==null ? '0' : $this->post_id,

            'customer_id' => $this->customer_id ==null ? '0' : $this->customer_id,

            'comment' => $this->comment ==null ? '0' : $this->comment,

            'childs' => CommentsCollection::collection($comments)
        ];
    }
}
