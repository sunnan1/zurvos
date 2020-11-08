<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\workout;
use App\Http\Resources\workoutsindle;
use App\models\WorkoutVideos;
use App\Http\Resources\MyWorkout;
use App\Http\Resources\AllMyWorkout;
use App\Http\Resources\WorkoutDetail;
use DB;
class WorkoutController extends Controller
{
    public function store(Request $request)
    {
    	$work=new workout();
    	$work->type=$request->type;
        $work->workout_title=$request->workout_title;
    	$work->workout_level=$request->workout_level;
    	$work->goal=$request->goal;
    	$work->customer_id=$request->user_id;
        $result=$work->save();
         $v=json_decode($request->video);
        foreach ($v as $value) {
            $ok=new WorkoutVideos();
            $ok->workout_id=$work->id;
            $ok->lab_id=$value;
            $ok->customer_id=$request->user_id;
            $ok->save();
        }
    	if (!empty($result)) {
				return response(['message' => 'Workout  Added Successfully','status' =>'success']);
            
             }else{

              return response(['message' => 'Workout Not Add','status' =>'error']);
           }

    }
    public function show($id)
    {
        $data=Workout::where('customer_id',$id)->get();
        if ($data->count() >0) {


             return  MyWorkout::collection($data);

         }else{
             
            return response(['message' => 'No Workout Found','status' =>'error']);
         }
    }

    public function detail($id)
    {
      $res=DB::table('workout_videos')->where('workout_id',$id)
      ->join('exercise_libs','exercise_libs.id','workout_videos.lab_id')
      ->join('workouts','workouts.id','workout_videos.workout_id')
      ->join('customers','customers.id','workout_videos.customer_id')
      ->select('workouts.workout_title','customers.full_name','workout_videos.id','exercise_libs.video_title','exercise_libs.video_name')
      ->get();

      if ($res->count() >0) {


             return  WorkoutDetail::collection($res);

         }else{
             
            return response(['message' => 'No Workout Found','status' =>'error']);
         }

    }
    public function createlist(Request $request)
    {
        $work=new workout();
        $work->workout_title=$request->workout_title;
        $work->description=$request->description;
        $work->customer_id=$request->user_id;
        $result=$work->save();
        if (!empty($result)) {
        return response(['message' => 'Workout  Added Successfully','status' =>'success']);
            
             }else{

              return response(['message' => 'Workout Not Add','status' =>'error']);
           }
    }
    
    public function addvideo(Request $request)
    {
           $ok=new WorkoutVideos();
            $ok->workout_id=$request->workout_id;
            $ok->lab_id=$request->video_id;
            $ok->customer_id=$request->user_id;
            $result=$ok->save();
            if (!empty($result)) {
        return response(['message' => 'Add Video To Workout  Successfully','status' =>'success']);
            
             }else{

              return response(['message' => 'Video Not Added','status' =>'error']);
           }
    }
    
    public function alldetail()
    {
        $data=Workout::all();
        if ($data->count() >0) {


             return  AllMyWorkout::collection($data);

         }else{
             
            return response(['message' => 'No Workout Found','status' =>'error']);
         }
    }
}
