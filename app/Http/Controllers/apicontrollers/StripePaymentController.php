<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Stripe;
use App\models\Transaction;
use App\Models\Customer;
class StripePaymentController extends Controller
{
     public function stripePostProduct(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $request->amount * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Order Payment From Client." 
        ]);
        $user=Customer::find($request->user_id);
        $payment=new Transaction();
        $payment->charge_id=$stripe->id;
        $payment->amount=$stripe->amount/100;
        $payment->currency=$stripe->currency;
        $payment->description=$stripe->description;
        $payment->status=$stripe->status;
        $payment->order_for="Product";
        $payment->order_id=$request->order_id;
        $payment->user_name=$user->full_name;
        $payment->email=$user->email;
        $payment->phone=$user->phone_no;
        $result=$payment->save();
  
        if ($result) {

             return response(['message' => 'Paymentent Successfully','status' =>'success']);
            
             }else{

            return response(['message' => 'Something Went Wrong','status' =>'error']);
            
           }

    }
    public function stripePostvideo(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $request->amount * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Order Payment From Client." 
        ]);
        $user=Customer::find($request->user_id);
        $payment=new Transaction();
        $payment->charge_id=$stripe->id;
        $payment->amount=$stripe->amount/100;
        $payment->currency=$stripe->currency;
        $payment->description=$stripe->description;
        $payment->status=$stripe->status;
        $payment->order_for="Tutorial";
        $payment->order_id=$request->order_id;
        $payment->user_name=$user->full_name;
        $payment->email=$user->email;
        $payment->phone=$user->phone_no;
        $result=$payment->save();
  
        if ($result) {

             return response(['message' => 'Paymentent Successfully','status' =>'success']);
            
             }else{

            return response(['message' => 'Something Went Wrong','status' =>'error']);
            
           }    
        
    }
    public function stripedeposit(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $request->amount * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Client Deposit Amount." 
        ]);
        $user=Customer::find($request->user_id);
        $user->deposit_amount=$user->deposit_amount+$request->amount;
        $user->avalable_amount=$user->avalable_amount+$request->amount;
        $user->save();
        $payment=new Transaction();
        $payment->charge_id=$stripe->id;
        $payment->amount=$stripe->amount/100;
        $payment->currency=$stripe->currency;
        $payment->description=$stripe->description;
        $payment->status=$stripe->status;
        $payment->order_for="Deposit Amount";
        $payment->order_id=$request->order_id;
        $payment->user_name=$user->full_name;
        $payment->email=$user->email;
        $payment->phone=$user->phone_no;
        $result=$payment->save();
  
        if ($result) {

             return response(['message' => 'Paymentent Successfully','status' =>'success']);
            
             }else{

            return response(['message' => 'Something Went Wrong','status' =>'error']);
            
           }    
        
    }
}
