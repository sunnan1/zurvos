<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Gymtrait;
use App\Http\Requests\TutoralRequest;
use App\models\Tutorial;
class TutorialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    use Gymtrait;
    public function index()
    {
      $tutorials=Tutorial::all();
      $gyms=Gymtrait::latestgymes();                                    
      return view('admin.courses.all-tutorial',compact('gyms','tutorials')); 
    }
    public function uploadTutorial(){

             $gyms=Gymtrait::latestgymes();                                    
          	 return view('admin.courses.upload-tutorial',compact('gyms'));

     	
     }
     public function storeTutorial(TutoralRequest $request)
     {
          $request->validate([
            'course_videos'=>'required',
          ]);
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
                  $video->move(public_path('TutorialVideo'),$new_name);
                            
                }
                $tutorial->course_videos = json_encode($yes); 
                $tutorial->save();

                return back()->with('success','Tutorial Upload Successfully');
     }
      public function edit($id)
      {
            $tutorial=Tutorial::find($id);
            $gyms=Gymtrait::latestgymes();                                    
            return view('admin.courses.edit-tutorial',compact('gyms','tutorial'));
      
      }
      public function update(Request $request,$id)
      {
        $tutorial=Tutorial::find($id);
          $tutorial->course_name = $request->course_name;
                $tutorial->category = $request->category; 
                $tutorial->type = $request->type; 
                $tutorial->course_price = $request->course_price;
              if($request->file('course_videos')){
               $videos= $request->file('course_videos');

               foreach ($videos as $video) {

                  $new_name=rand().'.'.$video->extension(); 
                  array_push($yes, $new_name);          
                  $video->move(public_path('TutorialVideo'),$new_name);
                            
                }
                $tutorial->course_videos = json_encode($yes); 
              }
                $tutorial->save();

                return back()->with('success','Tutorial updated Successfully');
      }
      public function destroy($id)
      {
        Tutorial::find($id)->delete();
         return back()->with('success','Tutorial Removed Successfully');
      }
      public function show($id)
      {
         $tutorial=Tutorial::find($id);
          $gyms=Gymtrait::latestgymes();                                    
        return view('admin.courses.view-video',compact('gyms','tutorial'));
      }
} 
