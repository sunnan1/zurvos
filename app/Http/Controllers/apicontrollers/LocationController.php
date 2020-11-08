<?php

namespace App\Http\Controllers\apicontrollers;


use App\Http\Controllers\Controller;
use App\models\Location;
use Illuminate\Http\Request;
use App\Http\Resources\LocationResource;

class LocationController extends Controller
{
    public function location($id)
    {
    	$location=Location::where('gym_id',$id)->get();
    	if ($location->count() >0) {


             return  LocationResource::collection($location);

         }else{
             
            return response(['message' => 'Location Not Found','status' =>'error']);
         }
    	
    }

    public function store(Request $request)
    {
    	$location=new Location();
    	$location->gym_id=$request->gym_id;
    	$location->location=$request->location;
        $location->zipcode=$request->zipcode;
        $location->address=$request->address;
        $location->phone=$request->phone;
    	$result=$location->save();
    	if ($result) {

             return response(['message' => 'Location added','status' =>'success']);
            
             }else{

            return response(['message' => 'Your Info Not added','status' =>'error']);
            
           }
    }
}
