<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\VideoOrder;
use App\models\Customer;
use App\models\Tutorial;
use App\Http\Resources\AllOrderVideoCollection;
use DB;
class VideoOrderController extends Controller
{
    public function store(Request $request)
    {
    	$user=Customer::find($request->user_id);
    	$product=Tutorial::find($request->tutorial_id);
    	$order=new VideoOrder();
    	$order->user_id=$user->id;
    	$order->tutorial_id=$product->id;
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
        $order=DB::table('video_orders')
        ->join('tutorials','tutorials.id','video_orders.tutorial_id')
        ->join('customers','customers.id','video_orders.user_id')
        ->select('video_orders.*','tutorials.course_name','tutorials.course_price','tutorials.category','tutorials.course_videos','customers.full_name','customers.email','customers.phone_no')
        ->get();
        if($order->count()>0){

    	         return  AllOrderVideoCollection::collection($order);

    	     }else{
    	         
    	        return response(['message' => 'Order Not Found','status' =>'error']);
    	     }
    }
    
    public function pendingorder()
    {
        $order=DB::table('video_orders')->where('video_orders.status','Pending')
        ->join('tutorials','tutorials.id','video_orders.tutorial_id')
        ->join('customers','customers.id','video_orders.user_id')
        ->select('video_orders.*','tutorials.course_name','tutorials.course_price','tutorials.category','tutorials.course_videos','customers.full_name','customers.email','customers.phone_no')
        ->get();
        if($order->count()>0){

    	         return  AllOrderVideoCollection::collection($order);

    	     }else{
    	         
    	        return response(['message' => 'Order Not Found','status' =>'error']);
    	     }
    }
    
    public function changeorder($id)
    {
        $order=VideoOrder::find($id);
        $order->status="Completed";
        $order->save();
        if($order){

    	         return response(['message' => 'Order Successfully Updated','status' =>'success']);

    	     }else{
    	         
    	        return response(['message' => 'Order Not Place','status' =>'error']);
    	     }
    }

}
