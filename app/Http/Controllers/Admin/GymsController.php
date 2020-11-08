<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Gymtrait;
use App\models\Gym;
use App\Http\Requests\GymRequest;
class GymsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    use Gymtrait;
    public function addGym()
    {
		$gyms=Gymtrait::latestgymes();                                    
        return view('admin.gyms.add-gym',compact('gyms'));  
    }

    public function storeGym(GymRequest $request)
    {
        $request->validate([
              'password'=>'required',
              'email' => 'unique:gyms',
        ]);
    	$gym=Gymtrait::senddata($request);
    	if($gym=='true')
    	{
    		return back()->with('success','Gym Added Successfully');
    	}
    	else
    	{
    		return back()->with('success','Gym Not Added');
    	}
    }
    public function allGym()
    {
        $gyms=Gymtrait::latestgymes();
        $allgyms=Gym::all();                                    
        return view('admin.gyms.allgym',compact('allgyms','gyms'));  
    }
    public function editGym($id)
    {   
        $gym=Gym::find($id);
        $gyms=Gymtrait::latestgymes();
        return view('admin.gyms.edit-gym',compact('gyms','gym'));
    }
     public function update(GymRequest $request,$id)
    {
         $gym=Gym::find($id);
            $gym->full_name = $request->full_name;
            $gym->email = $request->email;       
        
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
            return redirect()->route('gyms.index')->with(['success'=>'Gym updated Successfully']);
    }
    public function destroy($id)
    {
        Gym::find($id)->delete();
        return back()->with(['success'=>'Gym removed Successfully']);
    }
}
