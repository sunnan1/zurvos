<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\BuddyWorkout;
use App\models\workout;
use App\Http\Resources\MyBuddyWorkout;
use App\Http\Resources\AllBuddyRequestWorkout;
class BuddyWorkoutController extends Controller
{
    public function store(Request $request)
    {
    	$work=workout::find($request->workout_id);
    	$buddy=new BuddyWorkout();
    	$buddy->type=$request->type;
        $buddy->workout_level=$request->workout_level;
    	$buddy->goal=$request->goal;
    	$buddy->buddy_id=$request->buddy_id;
    	$buddy->time=$request->time;
    	$buddy->workout_id=$request->workout_id;
    	$buddy->customer_id=$work->customer_id;
        $result=$buddy->save();
        if ($result) {

             return response(['message' => 'Buddy Workout Added Successfully','status' =>'success']);
            
             }else{

            return response(['message' => 'Buddy Workout Not Added','status' =>'error']);
            
           }
    }

    public function mybuddy($id)
    {
    	$data=BuddyWorkout::where('buddy_workouts.customer_id',$id)
    	->join('customers','customers.id','buddy_workouts.buddy_id')
    	->select('buddy_workouts.id','customers.full_name','customers.id as customer_id')
    	->get();
    	if ($data->count() >0) {


             return  MyBuddyWorkout::collection($data);

         }else{
             
            return response(['message' => 'No Workout Found','status' =>'error']);
         }
    }
    public function delete($id)
    {
        $buddy=BuddyWorkout::find($id);
        $buddy->delete();
        if(!empty($buddy))
            {


             return response(['message' => 'Buddy Workout Delete','status' =>'success']);

         }else{
             
            return response(['message' => 'No Workout Found','status' =>'error']);
         }
    }
    
    public function allbuddy($id)
    {
        $buddy=BuddyWorkout::where('customer_id',$id)->where('status',Null)->get();
        if ($buddy->count() >0) {


             return  AllBuddyRequestWorkout::collection($buddy);

         }else{
             
            return response(['message' => 'No Workout Found','status' =>'error']);
         }
    }
    
    public function accept($id)
    {
        $buddy=BuddyWorkout::find($id);
        $buddy->status="accept";
        $buddy->save();
        if(!empty($buddy))
            {


             return response(['message' => 'Buddy Workout Accepted','status' =>'success']);

         }else{
             
            return response(['message' => 'No Workout Found','status' =>'error']);
         }
        
    }
    public function reject($id)
    {
        $buddy=BuddyWorkout::find($id);
        $buddy->status="reject";
        $buddy->save();
        if(!empty($buddy))
            {


             return response(['message' => 'Buddy Workout Rejected','status' =>'success']);

         }else{
             
            return response(['message' => 'No Workout Found','status' =>'error']);
         }
        
    }
}
