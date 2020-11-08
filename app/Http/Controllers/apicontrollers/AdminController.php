<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gym;
use App\Partner;
use App\Admin;
use App\Employee;
class AdminController extends Controller
{
    public function adminlogin(Request $request)
    {
    	$gym = Gym::where('email', '=', $request->input('email'))->first();
    	$partner = Partner::where('email', '=', $request->input('email'))->first();
    	$admin = Admin::where('email', '=', $request->input('email'))->first();
    	$employee = Employee::where('email', '=', $request->input('email'))->first();
    	if(!empty($gym))
    	{
    		if (\Hash::check($request->password, $gym->password)) { 
    		return response(['id'=>$gym->id,'name'=>$gym->full_name,'email'=>$gym->email,'type'=>'Gym Login','message' => 'Login Successfull','status' =>'success']);            
            }

    	}
    	if(!empty($partner))
    	{
    		if (\Hash::check($request->password, $partner->password)) { 
    		return response(['id'=>$partner->id,'name'=>$partner->name,'email'=>$partner->email,'type'=>'Partner Login','message' => 'Login Successfull','status' =>'success']);            
            }

    	}
    	if(!empty($admin))
    	{
    		if (\Hash::check($request->password, $admin->password)) { 
    		return response(['id'=>$admin->id,'name'=>$admin->name,'email'=>$admin->email,'type'=>'Admin Login','message' => 'Login Successfull','status' =>'success']);            
            }

    	}
        if(!empty($employee))
    	{
    		if (\Hash::check($request->password, $employee->password)) { 
    		return response(['id'=>$employee->id,'name'=>$employee->name,'email'=>$employee->email,'type'=>'Employee Login','message' => 'Login Successfull','status' =>'success']);            
            }

    	}    
            return response(['message' => 'Login Not Successfull','status' =>'error']);
    }
}
