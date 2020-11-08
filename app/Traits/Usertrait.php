<?php
namespace App\Traits;
use App\models\Customer;
use DB;

trait Usertrait
{
    public function findcustomer($email){

    	return Customer::where('email','=',$email)->first();
    }


    public function userslist(){

    	return DB::table('customers')->select('id','full_name','phone_no','email','password','created_at')->where('status',null)->get();
    }

   
}
