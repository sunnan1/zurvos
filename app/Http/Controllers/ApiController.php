<?php

namespace App\Http\Controllers;

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
                $workout = ($workout->first())->with("customer" , "buddyworkout.customer")->get();
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
}
