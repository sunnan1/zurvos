<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\ExerciseLib;
use DB;
use App\Http\Resources\libResource;
use App\Http\Resources\SingleExcercse;
class LibraryController extends Controller
{
    public function store(Request $request)
    {
    	$lib=new ExerciseLib();
    	$lib->video_title = $request->video_title;
    	$lib->video_description = $request->video_description;       
    	$lib->tags = json_encode($request->tags);
    	$lib->video_level = $request->video_level;
    	$lib->influencer_id = $request->influencer_id;
    	$lib->price = $request->price;
    	$lib->type = $request->type;
    	        
    	if($request->hasFile('video_name')){
    	    $filename=time()."_.";
    	    $request->video_name->move(public_path('lib_videos'),$filename);
    	    $lib->video_name=$filename;
    	    }
		$result=$lib->save();
		if(!empty($result))
		{
			return "lib Added";
		}
    }

    public function index()
    {
    	$lib=ExerciseLib::all();

    	if ($lib->count() >0) {


             return  libResource::collection($lib);

         }else{
             
            return response(['message' => 'Tutorial Not Found','status' =>'error']);
         }
    }

    public function single($id)
    {
       
        $video=ExerciseLib::find($id);
        if (!empty($video)) {
        
            return new SingleExcercse($video);
            
        }else{

               return response(['message' => 'No Exercise Found','status' =>'error']);
             
            }
    }
    public function addview($id)
    {
        $ex=ExerciseLib::find($id);
        $ex->total_view=$ex->total_view+1;
        $ex->save();
        if (!empty($ex)) {
        
            return response(['message' => 'Add View','status' =>'success']);
            
        }else{

               return response(['message' => 'No video Found','status' =>'error']);
             
            }
    }
    public function likevideo($id)
    {
        $ex=ExerciseLib::find($id);
        $ex->total_like=$ex->total_like+1;
        $ex->save();
        if (!empty($ex)) {
        
            return response(['message' => 'Thanks For Like Video','status' =>'success']);
            
        }else{

               return response(['message' => 'No video Found','status' =>'error']);
             
            }
    }
}
