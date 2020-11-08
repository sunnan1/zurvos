<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\UserCheck;
use App\Http\Resources\UserCheckHistory;
use App\Http\Resources\UserCheckinHistory;
use App\Http\Resources\UserCheckoutHistory;
use DB;
class UserCheckController extends Controller
{
    public function checkhistory($id)
    {
    	$user=DB::table('user_checks')->where('gym_id',$id)
    	->join('customers','customers.id','user_checks.user_id')
    	->select('user_checks.*','customers.id as customer_id','customers.full_name','customers.user_image')
    	->get();
    	if ($user->count() >0) {


             return  UserCheckHistory::collection($user);

         }else{
             
            return response(['message' => 'Bugs Not Found','status' =>'error']);
         }
    }
    public function checinkhistory($id)
    {
    	$user=DB::table('user_checks')->where('gym_id',$id)
    	->join('customers','customers.id','user_checks.user_id')
    	->select('user_checks.*','customers.id as customer_id','customers.full_name','customers.user_image')
    	->get();
    	if ($user->count() >0) {


             return  UserCheckinHistory::collection($user);

         }else{
             
            return response(['message' => 'Bugs Not Found','status' =>'error']);
         }
    }
    public function checkouthistory($id)
    {
    	$user=DB::table('user_checks')->where('gym_id',$id)
    	->join('customers','customers.id','user_checks.user_id')
    	->select('user_checks.*','customers.id as customer_id','customers.full_name','customers.user_image')
    	->get();
    	if ($user->count() >0) {


             return  UserCheckoutHistory::collection($user);

         }else{
             
            return response(['message' => 'Bugs Not Found','status' =>'error']);
         }
    }
}
