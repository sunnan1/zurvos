<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\ProductOrder;
use App\models\Customer;
use App\models\Product;
use App\Http\Resources\AllOrderProductsCollection;
use App\Http\Resources\AllTransactionCollection;
use DB;
use App\models\Transaction;
use App\models\GymNotification;
use App\Http\Resources\gymnotificationcollection;
class ProductOrderController extends Controller
{
    public function store(Request $request)
    {
    	$user=Customer::find($request->user_id);
    	$product=Product::find($request->product_id);
    	$order=new ProductOrder();
    	$order->user_id=$user->id;
    	$order->product_id=$product->id;
    	$order->latitude=$request->latitude;
    	$order->longitude=$request->longitude;
    	$order->address=$request->address;
    	$result=$order->save();
    	if($result){

    	         return response(['message' => 'Order Successfully Place','status' =>'success']);

    	     }else{
    	         
    	        return response(['message' => 'Order Not Place','status' =>'error']);
    	     }

    }
    
    public function allorder()
    {
        $order=DB::table('product_orders')
        ->join('products','products.id','product_orders.product_id')
        ->join('customers','customers.id','product_orders.user_id')
        ->select('product_orders.*','products.product_type','products.product_name','products.product_description','products.product_price','products.product_image','customers.full_name','customers.email','customers.phone_no')
        ->get();
        if($order->count()>0){

    	         return  AllOrderProductsCollection::collection($order);

    	     }else{
    	         
    	        return response(['message' => 'Order Not Found','status' =>'error']);
    	     }
    }
    
    public function pendingorder()
    {
        $order=DB::table('product_orders')->where('product_orders.status','Pending')
        ->join('products','products.id','product_orders.product_id')
        ->join('customers','customers.id','product_orders.user_id')
        ->select('product_orders.*','products.product_type','products.product_name','products.product_description','products.product_price','products.product_image','customers.full_name','customers.email','customers.phone_no')
        ->get();
        if($order->count()>0){

    	         return  AllOrderProductsCollection::collection($order);

    	     }else{
    	         
    	        return response(['message' => 'Order Not Found','status' =>'error']);
    	     }
    }
    
    public function changeorder($id)
    {
        $order=ProductOrder::find($id);
        $order->status="Completed";
        $order->save();
        if($order){

    	         return response(['message' => 'Order Successfully Updated','status' =>'success']);

    	     }else{
    	         
    	        return response(['message' => 'Order Not Place','status' =>'error']);
    	     }
    }

    public function alltransaction()
    {
        $tranaction=Transaction::all();
        if($tranaction->count()>0){

                 return  AllTransactionCollection::collection($tranaction);

             }else{
                 
                return response(['message' => 'Record Not Found','status' =>'error']);
             }

    }

    public function gymnoti($id)
    {
        $noti=GymNotification::find($id);
        $notifications=DB::table('gym_notifications')->where('gym_id',$id)->get();

         if ($notifications->count() >0) {


            return  gymnotificationcollection::collection($notifications);

        }else{
            
           return response(['message' => 'Notifications Not Found','status' =>'error']);
        }
    }
}
