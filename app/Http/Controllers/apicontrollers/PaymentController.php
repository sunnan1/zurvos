<?php

namespace App\Http\Controllers\apicontrollers;


use App\Http\Controllers\Controller;
use App\models\Payment;
use App\Http\Requests\PaymentRequest as request;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {
    	$payment=new Payment();
    	$payment->payment_method=$request->payment_method;
    	$payment->deposit_amount=$request->deposit_amount;
    	$result=$payment->save();
    	if ($result) {
            
            return response([

                'message'=>'Payment Added successfully',
                'status' =>'success'
            ]);
        }else{

            return response([

                'message'=>'Record Not Added.',
                'status' =>'error'
            ]);
        }
    }
}
