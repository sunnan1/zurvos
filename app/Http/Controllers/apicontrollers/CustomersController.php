<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Usertrait;
use App\Customer;
use App\Http\Resources\UserloginResource;
use App\Http\Resources\UseramountResource;
use App\Http\Resources\UserProfileResource;
use App\Http\Resources\UsersCollection;
use App\Mail\VerificationCode;
use Mail;
use App\models\Usernotification;
use App\models\Post;
use App\models\VideoOrder;
use App\Http\Resources\gymstatdetail;
use DB;
class CustomersController extends Controller
{
	use Usertrait;


     public function manageusers(){

         $result=$this->userslist();

          if ($result->count() >0) {


             return  UsersCollection::collection($result);

         }else{
             
            return response(['message' => 'Users Not Found','status' =>'error']);
         }
    }
public function taguser(Request $request)
      {
          foreach ($request->user as $value) {
            $post=Post::find($request->post_id);
               $notification=new Usernotification();
               $notification->message="You are tag in Post ";
               $notification->post_id=$post->id;
               $notification->post_user_id=$post->customer_id;
               $notification->user_id=$value;
               $notification->save();
          }

          return response([

                'message'=>'Tag Successfully',
                'status' =>'success'
            ]);
      } 
    public function deleteUser($id){


         $result=Customer::find($id);

          if ($result) {

             $result->delete();

             return response(['message' => 'Users Deleted','status' =>'success']);

         }else{
             
            return response(['message' => 'Users Not Deleted','status' =>'error']);
         }
    }

    public function userprofile($id){


         $result=Customer::find($id);

          if ($result) {

            return  new UserProfileResource($result);

         }else{
             
            return response(['message' => 'Users Not Found','status' =>'error']);
         }
    }

    public function register(Request $request)
    {
        $data=$this->findcustomer($request->email);

        if ($data) {
            
            return response([

                'message' =>'email has already been taken',
                'status' =>'error'
            ]);

        }else{

        $customer=new Customer();
        $customer->full_name = $request->full_name;
        $customer->email = $request->email;
        $customer->password =bcrypt($request->password);
        $customer->city = $request->city;
        $customer->phone_no = $request->phone_no;
        $customer->zip_code =$request->zip_code;
        $customer->shirt_size =$request->shirt_size;
        $customer->street_address =$request->street_address;
         $customer->bio =$request->bio;
        $customer->street_address =$request->street_address;
        if($request->hasFile('user_image')){
                  $extension=$request->user_image->extension();
                  $filename=time()."_.".$extension;
                  $request->user_image->move(public_path('userimage'),$filename);
                  $customer->user_image=$filename;
                }
        $result=$customer->save();
        if ($result) {
            
            return response([

                'message'=>'Record Created Successfully',
                'status' =>'success'
            ]);
        }else{

            return response([

                'message'=>'Record Not Created..',
                'status' =>'error'
            ]);
        }

    }
  }


   // Login method

        public function userlogin(Request $request){

        if (empty($request->email) || empty($request->password)) {
    		
    		return response(['message' => 'Email And Password Are Required','status' =>'error']);

    	}else{
        $result=Customer::where('email', '=', $request->input('email'))->first();

        if (\Hash::check($request->password, $result->password)) {
        
            return new UserLoginResource($result);
            
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

            $getRecord=$this->findcustomer($request->email);

            if ($getRecord) {

                $verificaitonCode=rand(1000,9999);

                $result=Customer::where('email',$request->email)->update(['verification_code'=>$verificaitonCode]);

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

            $getRecord=$this->findcustomer($request->email);

            if ($getRecord) {
                
                $result=Customer::where('email',$request->email)
                        ->where('verification_code',$request->code)->first();

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

            $getRecord=$this->findcustomer($request->email);

            if ($getRecord) {


                $result=Customer::where('email',$request->email)
                         ->update(['password' =>bcrypt($request->password)]);

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
    public function updateprofile(Request $request,$id)
     {

        $customer=Customer::find($id);
        $customer->full_name = $request->full_name;
        $customer->email = $request->email;
        $customer->city = $request->city;
        $customer->phone_no = $request->phone_no;
                 $customer->bio =$request->bio;
        $customer->zip_code =$request->zip_code;
        $customer->street_address =$request->street_address;
        if($request->hasFile('user_image')){
            $filenamePath = public_path().'/userimage/'.$customer->user_image;
            \File::delete($filenamePath);
                  $extension=$request->user_image->extension();
                  $filename=time()."_.".$extension;
                  $request->user_image->move(public_path('userimage'),$filename);
                  $customer->user_image=$filename;
                }
        
        $result=$customer->save();
        $ok=Customer::find($id);
        if ($ok) {
            
            return new UserLoginResource($ok);
        }else{

            return response([

                'message'=>'Record Not Update.',
                'status' =>'error'
            ]);
        }
     }
     
     public function amount($id)
     {
         $user=Customer::find($id);
         if ($user) {
            
            return new UseramountResource($user);
        }else{

            return response([

                'message'=>'Record Not Found.',
                'status' =>'error'
            ]);
        }
     }
     
     public function gymstat()
     {
        $order=VideoOrder::first();
        if ($order) {             
                  return new gymstatdetail($order);  
            }
            return response(['message' => 'Record Not Found','status' =>'error']); 
            
         
     }
     public function gymstato(Request $request)
     {
        $order=VideoOrder::first();
        
        $yv=DB::table('video_orders')->whereDate('video_orders.created_at','>=',$request->from)
                        ->whereDate('video_orders.created_at','<=',$request->to)
                        ->join('tutorials','tutorials.id','video_orders.tutorial_id')
        ->sum('tutorials.course_price');
        $yp=DB::table('product_orders')->whereDate('product_orders.created_at','>=',$request->from)
                        ->whereDate('product_orders.created_at','<=',$request->to)
                        ->join('products','products.id','product_orders.product_id')
        ->sum('products.product_price');
        if ($yp) {             
                  return response(['revenue_generate_by_product'=>$yp,'revenue_generate_by_paid_videos'=>$yv]);  
            }
            return response(['message' => 'Record Not Found','status' =>'error']); 
            
         
     }
     

}
