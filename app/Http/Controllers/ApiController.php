<?php

namespace App\Http\Controllers;

use App\models\BuddyWorkout;
use App\models\Customer;
use App\models\workout;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getWorkoutDetails(Request $request)
    {
        if($request->has('workout_id'))
        {
            $workout = workout::whereId($request->get('workout_id'))->get();
            if(count($workout) > 0){
                $workout = ($workout->first())->with("customer" , "videos.libs","buddyworkout.customer")->get();
                return response(["status" => 'Success' , 'message' => '' , 'data' => $workout] , 200);
            }
            else{
                return response(["status" => 'Error' , 'message' => 'Workout not found'] , 404);
            }
        }
        else{
            return response(["status" => 'Error' , 'message' => 'Workout ID is missing'] , 401);
        }
    }

    public function getBuddies()
    {
        if(request()->has('user_id'))
        {
            $buddyWorkouts = BuddyWorkout::with("customer")->where("customer_id" , request()->get('user_id'))->get();
            return response(['status' => 'Success' , 'message' => '', 'data' => $buddyWorkouts] , 200);
        }
        else{
            return response(["status" => 'Error' , 'message' => 'User ID is missing'] , 401);
        }
    }

}
