<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Tutorial;
use App\Http\Resources\TutorialResource;

class TutorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                $yes=[];
                $tutorial=new Tutorial();
                $tutorial->course_name = $request->course_name;
                $tutorial->category = $request->category; 
                $tutorial->type = $request->type; 
                $tutorial->course_price = $request->course_price;
               $videos= $request->file('course_videos');

               foreach ($videos as $video) {

                  $new_name=rand().'.'.$video->extension(); 
                  array_push($yes, $new_name);          
                  $video->move(public_path('tutorialvideo'),$new_name);
                            
                }
                $tutorial->course_videos = json_encode($yes); 
                $tutorial->save();

                return response(['message' => 'Tutorial Added Successfully','status' =>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function freevideo()
    {
        $tutorials=Tutorial::where('type','0')->get();
        if ($tutorials->count() >0) {


             return  TutorialResource::collection($tutorials);

         }else{
             
            return response(['message' => 'Tutorial Not Found','status' =>'error']);
         }
    }

    public function paidvideo()
    {
        $tutorials=Tutorial::where('type','1')->get();
        if ($tutorials->count() >0) {


             return  TutorialResource::collection($tutorials);

         }else{
             
            return response(['message' => 'Tutorial Not Found','status' =>'error']);
         }
    }
}
