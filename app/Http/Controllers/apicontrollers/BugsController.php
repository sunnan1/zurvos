<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BugsCollection;
use App\models\Bug;

class BugsController extends Controller
{
    public function bugs(Request $request){
    	
    			$yes=[];
                $bug=new Bug();
    	        $bug->customer_id = $request->customer_id;
    	        $bug->report_message = $request->report_message; 

    	       $images= $request->file('report_images');

    	       foreach ($images as $image) {

    	          $new_name=rand().'.'.$image->extension();	
    	          array_push($yes, $new_name);          
    	          $image->move(public_path('reportImages'),$new_name);
    	                    
    	        }
    	        $bug->report_images = json_encode($yes); 
    	        $bug->save();

                return response(['message' => 'Bug Reported','status' =>'success']);
    }

    // all bugs report

    public function bugslist()
    {

        $bugs=Bug::bugs();

        if ($bugs->count() >0) {


             return  BugsCollection::collection($bugs);

         }else{
             
            return response(['message' => 'Bugs Not Found','status' =>'error']);
         }
    }

    public function delBug($id)
    {
        
        $bugs=Bug::deletebugs($id);

        if ($bugs==true) {

            return response(['message' => 'Bugs Deleted','status' =>'success']);

         }else{
             
           return response(['message' => 'Bugs Not Deleted','status' =>'error']);
         }
    }
}
