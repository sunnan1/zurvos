<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use App\Http\Resources\PostsCollection;
use App\models\Post;
use App\models\Follow;
class UserProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $result=Post::where('customer_id',$this->id)->get();
        $totalfollower=Follow::where('follow_id',$this->id)->count();

        $totalfollowing=Follow::where('user_id',$this->id)->count();

        return [

             'id' =>$this->id,

            'full_name' => $this->full_name ==null ? '0' : $this->full_name,

            'email' => $this->email ==null ? '0' : $this->email,

            'password' => $this->password ==null ? '0' : $this->password,

            'city' => $this->city ==null ? '0' : $this->city,

            'phone_no' => $this->phone_no ==null ? '0' : $this->phone_no,

            'zip_code' => $this->zip_code ==null ? '0' : $this->zip_code,

            'street_address' => $this->street_address ==null ? '0' : $this->street_address,
            'user_image'=>$this->user_image ==null ? '0' : asset('public/userimage/'.$this->user_image),

            'totalfollower' =>(string)$totalfollower,

            'totalfollowing' =>(string)$totalfollowing,

            'datetime'=>Carbon::parse($this->created_at)->diffForHumans(),
            'posts'=> PostsCollection::collection($result),
            
        ];
    }
}
