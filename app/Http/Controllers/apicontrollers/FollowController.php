<?php

namespace App\Http\Controllers\apicontrollers;


use App\Http\Controllers\Controller;
use App\models\Follow;
use App\Http\Requests\FollowRequest as request;
use App\Http\Resources\allfollow;
use DB;
use App\models\Post;
class FollowController extends Controller
{
    public function postfollow(Request $request)
    {
    	 $follow=new  Follow();
         $post=Post::find($request->post_id);
    	 $follow->user_id=$request->user_id;
    	 $follow->follow_id=$post->customer_id;
    	 $result=$follow->save();
    	 if ($result) {
            
            return response([

                'message'=>'Following successfully',
                'status' =>'success'
            ]);
        }else{

            return response([

                'message'=>'Record Not Created..',
                'status' =>'error'
            ]);
        }
    }
    public function follow(Request $request)
    {
         $follow=new  Follow();
         $follow->user_id=$request->user_id;
         $follow->follow_id=$request->follow_id;
         $result=$follow->save();
         if ($result) {
            
            return response([

                'message'=>'Following successfully',
                'status' =>'success'
            ]);
        }else{

            return response([

                'message'=>'Record Not Created..',
                'status' =>'error'
            ]);
        }
    }
    public function unfollow(Request $request)
    {
         $follow=Follow::where('user_id',$request->user_id)->where('follow_id',$request->follow_id)->first();

         $result=$follow->delete();
         if ($result) {
            
            return response([

                'message'=>'Un Following successfully',
                'status' =>'success'
            ]);
        }else{

            return response([

                'message'=>'Record Not found..',
                'status' =>'error'
            ]);
        }
    }

    public function allfollowing($id)
    {
        $following=DB::table('follows')->where('user_id',$id)
        ->join('customers','customers.id','follows.follow_id')
        ->select('customers.id','customers.full_name','customers.street_address')
        ->get();
        if ($following->count() >0) {


             return  allfollow::collection($following);

         }else{
             
            return response(['message' => 'No Following Yet','status' =>'error']);
         }
    }

    public function allfollower($id)
    {
        $following=DB::table('follows')->where('follow_id',$id)
        ->join('customers','customers.id','follows.user_id')
        ->select('customers.id','customers.full_name','customers.street_address')
        ->get();
        if ($following->count() >0) {


             return  allfollow::collection($following);

         }else{
             
            return response(['message' => 'No Follower Yet','status' =>'error']);
         }
    }
}
