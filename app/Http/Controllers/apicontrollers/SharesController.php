<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Share;
use App\models\Usernotification;
use App\models\Post;

class SharesController extends Controller
{
    public function share(Request $request)
    {
        

            $action=new Share();
            $action->post_id = $request->post_id;
            $action->customer_id = $request->customer_id;       
            $action->message = $request->message;
            $result=$action->save();
            $post=Post::find($request->post_id);
            $notification=new Usernotification();
            $notification->message="Is Share Your Post ";
            $notification->post_id=$post->id;
            $notification->post_user_id=$post->customer_id;
            $notification->user_id=$request->customer_id;
            $notification->save();
            
            if ($result) {
                
               return response(['message' => 'Post shared successfully','status' =>'success']);

            }else{

                return response(['message' => 'Post not shared ','status' =>'error']);
            }

    }
}
