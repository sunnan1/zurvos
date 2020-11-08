<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Poststrait;
use App\models\Usernotification;
use App\models\Post;

class ActionController extends Controller
{
    use Poststrait;

    public function action(Request $request){

    	 $result=$this->actions($request);

             if ($result == 'like') {
               $post=Post::find($request->post_id);
               $notification=new Usernotification();
               $notification->message="Is Liked Your Post ";
               $notification->post_id=$post->id;
               $notification->post_user_id=$post->customer_id;
               $notification->user_id=$request->customer_id;
               $notification->save();

               return response(['message' => 'You liked','status' =>'success']);
            
             }

             if ($result == 'dislike') {
              $post=Post::find($request->post_id);
              $notification=new Usernotification();
              $notification->message="Is DisLiked Your Post ";
              $notification->post_id=$post->id;
              $notification->post_user_id=$post->customer_id;
              $notification->user_id=$request->customer_id;
              $notification->save();

               return response(['message' => 'You disliked','status' =>'success']);
            
             }

             else{

              return response(['message' => 'Something went wrong','status' =>'error']);
           }
    }
}
