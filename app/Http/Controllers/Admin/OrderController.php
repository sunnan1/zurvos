<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\ProductOrder;
use App\models\VideoOrder;
use DB;
use App\Traits\Gymtrait;

class OrderController extends Controller
{
	 use Gymtrait;
   
      public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function productindex()
    {
    	  $gyms=Gymtrait::latestgymes();
    	$productorders=DB::table('product_orders')
    	->join('customers','customers.id','product_orders.user_id')
    	->join('products','products.id','product_orders.product_id')
    	->select("product_orders.*",'customers.email','customers.full_name','products.product_name')
    	->paginate(5);
    	return view('admin.orders.product',compact('productorders','gyms'));
    }
    public function productdestroy($id)
    {
    	 ProductOrder::find($id)->delete();
         return back()->with('success','Order Removed Successfully');
    }
     public function videoindex()
    {
    	$gyms=Gymtrait::latestgymes();
    	$videoorders=DB::table('video_orders')
    	->join('customers','customers.id','video_orders.user_id')
    	->join('tutorials','tutorials.id','video_orders.tutorial_id')
    	->select("video_orders.*",'customers.email','customers.full_name','tutorials.course_name')
    	->paginate(5);
    	return view('admin.orders.video',compact('videoorders','gyms'));
    }
    public function videodestroy($id)
    {
    	 VideoOrder::find($id)->delete();
         return back()->with('success','Order Removed Successfully');
    }
}
