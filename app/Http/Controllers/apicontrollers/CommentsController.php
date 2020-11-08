<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Comment;
use App\Http\Resources\CommentsCollection;
use App\models\Usernotification;
use App\models\Post;

class CommentsController extends Controller
{
   
    public function store(Request $request)
    {
        

            $action=new Comment();
            $action->post_id = $request->post_id;
            $action->customer_id = $request->customer_id;       
            $action->comment = $request->comment;
            $action->parent_comment_id = $request->parent_comment_id;
            $result=$action->save();
            if ($result) {
              $post=Post::find($request->post_id);
               $notification=new Usernotification();
               $notification->message="Is Commented  in Your Post";
               $notification->post_id=$post->id;
               $notification->post_user_id=$post->customer_id;
               $notification->user_id=$request->customer_id;
               $notification->save();
                
                return response(['message' => 'Your comment posted','status' =>'success']);

            }else{

                return response(['message' => 'Your comment not posted','status' =>'error']);
            }

    }


    public function show($id)
    {

         $comments=Comment::all()->where('post_id',$id)->where('parent_comment_id',null);

          if ($comments->count() >0) {


             return  CommentsCollection::collection($comments);

         }else{
             
            return response(['message' => 'Comments Not Found','status' =>'error']);
         }
    }


}
