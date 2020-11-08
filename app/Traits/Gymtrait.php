<?php
namespace App\Traits;
use App\models\Gym;
use App\models\Feature;
use App\models\GymNotification;
trait Gymtrait
{

    //add new gym

    static public function senddata($request){

	    	$gym=new Gym();
	        $gym->full_name = $request->full_name;
	        $gym->email = $request->email;       
	        $gym->password = bcrypt($request->password);
	        $gym->full_name1 = $request->full_name1;
	        $gym->zipcode = $request->zipcode;
	        $gym->street_address = $request->street_address;
	        $gym->phoneno = $request->phoneno;
	        $gym->gym_detail = $request->gym_detail;
	        $gym->cost_per_day = $request->cost_per_day;
	        if($request->hasFile('gym_image')){
    	          $extension=$request->gym_image->extension();
    	          $filename=time()."_.".$extension;
    	          $request->gym_image->move(public_path('gymimage'),$filename);
    	          $gym->gym_image=$filename;
    	        }
	        $result=$gym->save();
            $gymnoti=new GymNotification();
            $gymnoti->message="Your Gym Add Wait For Admin Approve";
              $gymnoti->gym_id=$result->id;
              //$gymnoti->user_id=$request->customer_id;
              $gymnoti->save();
	        $features=['Free Weight','Cardio Machines','Stretching areas'];

	        foreach ($features as $fea) {
	        	$feat=new Feature();
	        	$feat->gym_id = $gym->id;
	            $feat->feature = $fea;  
	            $feat->save(); 
	        }
	        
	        if ($result) {
	             
	             return true;
	        }

    }

    static public function latestgymes(){

    	return Gym::latest()->where('status',null)->limit(4)->get();
    }

    static public function changestatus($id){

    	return Gym::where('id',$id)->update(['status'=>'Approved']);
    }

    static public function deletegym($id){

        Feature::where('gym_id',$id)->delete();
    	return Gym::where('id',$id)->delete();
    }

     static public function gymslist($status){

    	return Gym::where('status',$status)->get();
    }



}
