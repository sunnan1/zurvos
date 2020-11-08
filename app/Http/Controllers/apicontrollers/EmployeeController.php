<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Employee;
use App\Http\Resources\PartnersCollection;

class EmployeeController extends Controller
{
    public function addemployee(Request $request)
    {
    	$employee=new Employee();
    	$employee->name=$request->name;
    	$employee->email=$request->email;
    	$employee->password=bcrypt($request->password);
    	$employee->gym_id=$request->gym_id;
    	$result=$employee->save();
    	if ($result) {

             return response(['message' => 'Employee Added Successfully','status' =>'success']);
            
             }else{

            return response(['message' => 'Record not created','status' =>'error']);
            
           }
    	
    }

    public function editemployee(Request $request,$id)
    {
    	$employee=Employee::find($id);
    	$employee->name=$request->name;
    	$employee->email=$request->email;
    	$employee->password=bcrypt($request->password);
    	$employee->gym_id=$request->gym_id;
    	$result=$employee->save();
    	if ($employee) {

             return response(['message' => 'Employee Update Successfully','status' =>'success']);
            
             }else{

            return response(['message' => 'Record not Update','status' =>'error']);
            
           }
    }

    public function show()
    {
        $employee=Employee::all();
        if (!empty($employee)) {


            return  PartnersCollection::collection($employee);

        }else{
            
           return response(['message' => 'Employee Not Found','status' =>'error']);
        }
    }
}
