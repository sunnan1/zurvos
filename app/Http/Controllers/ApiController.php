<?php

namespace App\Http\Controllers;

use App\models\BuddyWorkout;
use App\models\Customer;
use App\models\Influence;
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
            $buddyWorkouts = BuddyWorkout::with("buddy")->where("customer_id" , request()->get('user_id'))->get();
            return response(['status' => 'Success' , 'message' => '', 'data' => $buddyWorkouts] , 200);
        }
        else{
            return response(["status" => 'Error' , 'message' => 'User ID is missing'] , 401);
        }
    }

    public function removeUserBuddies()
    {
        if(request()->has('user_id') && request()->has('buddy_id'))
        {
            $buddy = BuddyWorkout::where("id" , request()->get('buddy_id'))->where('buddy_id' , request()->get('user_id'))->get();
            if(count($buddy) > 0)
            {
                ($buddy->first())->delete();
                return response(['status' => 'Success' , 'message' => 'Buddy deleted successfully'] , 200);
            }
            else{
                return response(['status' => 'Error' , 'message' => 'Workout buddy not found'] , 404);
            }
        }
        else
        {
            return response(['status' => 'Error' , 'message' => 'Buddy id or user id not is invalid'] , 401);
        }
    }

    public function createWorkout()
    {
        if(request()->has('user_id'))
        {
            $workout = new workout();
            $workout->workout_title = request()->get('title');
            $workout->type = request()->get('type');
            $workout->workout_level = request()->get('level');
            $workout->goal = request()->get('goal');
            $workout->customer_id = request()->get('user_id');
            $workout->description = request()->get('description');
            $workout->save();
            return response(['status' => 'Success' , 'message' => 'Workout saved successfully' , 'data' => $workout] , 200);
        }
        else
        {
            return response(['status' => 'Error' , 'message' => 'User ID is missing'] , 401);
        }
    }

    public function getUserWorkoutList()
    {
        if(request()->has('user_id'))
        {
            $workouts = workout::where("customer_id" , request()->get('user_id'));
            $workouts = $workouts->with("videos.libs");
            return response(['status' => 'Success' , 'message' => '' , 'data' => $workouts->get() ] , 200) ;
        }
        else
        {
            return response(['status' => 'Error' , 'message' => 'User ID is missing'] , 401);
        }
    }

    public function getUserBuddyList(){
        if(request()->has('user_id'))
        {
                $customer = BuddyWorkout::whereHas("workouts" , function($q) {
                   $q->where("customer_id" , request()->get('user_id'));
                })->with("buddy")->get();

            return response(['status' => 'Success' , 'message' => '' , 'data' => $customer] , 200);
        }
        else
        {
            return response(['status' => 'Error' , 'message' => 'User ID is missing'] , 401);
        }
    }

    public function getInfluenceUsers()
    {
        if(request()->has('start_date') && request()->has('end_date'))
        {
            $influence = Influence::whereDate('created_at' , '>=' , request()->get('start_date'))->whereDate('created_at' , '<=' , request('end_date'))->get();
            return response(['status' => 'Success' , 'message' => '' , 'data' => $influence] , 200);
        }
        else
        {
            return response(['status' => 'Error' , 'message' => 'Start date or End date is missing'] , 401);
        }
    }
}
