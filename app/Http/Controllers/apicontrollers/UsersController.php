<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Http\Resources\LoginResource;
use App\Admin;
use App\Mail\VerificationCode;
use Mail;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    

    // Login method

        public function login(Request $request){

        if (empty($request->email) || empty($request->password)) {
    		
    		return response(['message' => 'Email And Password Are Required','status' =>'error']);

    	}else{

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
        
            return new LoginResource(Auth::user());
            
        }else{

               return response(['message' => 'These Crediantals Not Matched','status' =>'error']);
             
            }
         }
     }


         // Send Mail to Gmail

    public function sendcode(Request $request){

        if (empty($request->email)) {
            
            return response(['message' => 'Email is required','status' =>'error']);

        }else{

            $getRecord=Admin::where('email',$request->email)->first();

            if ($getRecord) {

                $verificaitonCode=rand(1000,9999);

                $result=Admin::where('email',$request->email)->update(['verificaitonCode'=>$verificaitonCode]);

                if ($result) {

                    Mail::to($request->email)->send(new VerificationCode($verificaitonCode));

                    return response(['message'=>'Verificaiton code sent to gmail','status' =>'success']); 

                }else{

                    return response(['message'=>'Verificaiton Code Not Sent To This Mail...','status'=>'error']);
                }    

            }
            else{

                return response(['message'=>'Record not found','status'=>'error']);
            }
        }

    }


    // Confirm Gmail Code

    public function confirm(Request $request){

        if (empty($request->email) || empty($request->code)) {
            
            return response(['message' => 'Email and code is required','status' =>'error']);

        }else{

            $getRecord=Admin::where('email',$request->email)->first();

            if ($getRecord) {
                
                $result=Admin::where('email',$request->email)
                        ->where('verificaitonCode',$request->code)->first();

                if ($result) {

                   return response(['message' => 'Verificaiton Code Matched','status' =>'success']);
                            
                }else{

                     return response(['message' => 'Verificaiton Code Not Matched','status' =>'error']);

                }        

            }else{

                return response(['message' => 'Record not found','status' =>'error']);
            }
        }
    }

    // reset password

    public function updatepassword(Request $request){

        if (empty($request->email)  || empty($request->password)) {
            
            return response(['message' => 'Email and password is required','status' =>'error']);

        }else{

            $getRecord=Admin::where('email',$request->email)->first();

            if ($getRecord) {


                $result=Admin::where('email',$request->email)
                         ->update(['password' => Hash::make($request->password)]);

                if ($result) {

                  return response(['message' => 'Password Updated Successfully','status' =>'success']);

                }else{

                  return response(['message' => 'Password Not Updated','status' =>'error']);

                } 
                
            }else{

                return response(['message' => 'Record Not Found','status' =>'error']);
            }

        }
    } 

}
