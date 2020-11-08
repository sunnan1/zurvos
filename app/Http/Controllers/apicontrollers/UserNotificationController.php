<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Usernotification;
use DB;
use App\Http\Resources\usernotificationcollection;

class UserNotificationController extends Controller
{
    public function usernotification($id)
    {
    	$noti=Usernotification::find($id);

    	$notifications=DB::table('usernotifications')->where('post_user_id',$noti->post_user_id)
    	->join('customers','customers.id','usernotifications.user_id')
    	->join('posts','posts.id','usernotifications.post_id')
    	->select('customers.full_name','customers.user_image','usernotifications.message','usernotifications.id','usernotifications.status','usernotifications.created_at','posts.post_title','posts.id as post_id','posts.post_image')
    	->orderBy('id', 'desc')->get();

    	 if (!empty($notifications)) {


    	    return  usernotificationcollection::collection($notifications);

    	}else{
    	    
    	   return response(['message' => 'Notifications Not Found','status' =>'error']);
    	}
    }
    
    public function changeusernotification($id)
    {
        $noti=Usernotification::find($id);
        $noti->status='false';
        $result=$noti->save();
        if ($result) {


    	  return response(['message' => 'Notifications Change','status' =>'success']);

    	}else{
    	    
    	   return response(['message' => 'Notifications Not Found','status' =>'error']);
    	}
        
        
    }
}
