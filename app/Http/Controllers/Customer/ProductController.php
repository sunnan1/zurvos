<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Product;
class ProductController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:customer');
    }
    public function index()
    {
    	$fitnessproducts=Product::where('product_type','fitness')->get();
    	$zurvosproducts=Product::where('product_type','zurvos')->get();
    	return view('customer.product.index',compact('fitnessproducts','zurvosproducts'));
    }
}
