<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\About;
use App\Http\Resources\AboutResource;
class AboutController extends Controller
{
    public function about()
    {
    	 $about=About::find(1);
    	 if($about){

    	         return  new AboutResource($about);

    	     }else{
    	         
    	        return response(['message' => 'Data Not Found','status' =>'error']);
    	     }
    }

    public function editabout(Request $request)
    {
    	$about=About::find(1);
    	$about->text=$request->text;
        $about->address=$request->address;
        if($request->hasFile('about_image')){
            $filenamePath = public_path().'/aboutimage/'.$about->about_image;
            \File::delete($filenamePath);
                  $extension=$request->about_image->extension();
                  $filename=time()."_.".$extension;
                  $request->about_image->move(public_path('aboutimage'),$filename);
                  $about->about_image=$filename;
                }
    	$result=$about->save();
    	if ($result) {

             return response(['message' => 'About Us Updated Successfully','status' =>'success']);
            
             }else{

            return response(['message' => 'About Us Not Updated','status' =>'error']);
            
           }
    }
}
