<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Policy;
use App\Http\Resources\PolicyResource;

class PolicyController extends Controller
{
    public function policy()
    {
    	 $policy=Policy::find(1);
    	 if($policy){

    	         return  new PolicyResource($policy);

    	     }else{
    	         
    	        return response(['message' => 'Gym Not Found','status' =>'error']);
    	     }
    }

    public function editpolicy(Request $request)
    {
    	$policy=Policy::find(1);
    	$policy->text=$request->text;
    	$result=$policy->save();
    	if ($result) {

             return response(['message' => 'Policy Updated Successfully','status' =>'success']);
            
             }else{

            return response(['message' => 'Policy Not Updated','status' =>'error']);
            
           }
    }
}
