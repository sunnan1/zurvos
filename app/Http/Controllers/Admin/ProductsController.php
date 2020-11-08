<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Gymtrait;
use App\Http\Requests\ProductRequest;
use App\Traits\ProductTrait;
use App\models\Product;
class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    use Gymtrait;
     use ProductTrait;
     public function index()
     {
        $products=Product::all();
        $gyms=Gymtrait::latestgymes();     
        return view('admin.products.all-product',compact('gyms','products'));   
     }
    public function addProduct()
    {
        $gyms=Gymtrait::latestgymes();                                    
        return view('admin.products.add-product',compact('gyms'));	
     }
     public function storeProduct(ProductRequest $request)
     {

     	$result=$this->newproduct($request);

             if ($result == true) {

               return back()->with('success','Product Add Successfully');
            
             }
     }
     public function edit($id)
     {
        $product=Product::find($id);
        $gyms=Gymtrait::latestgymes();                                    
        return view('admin.products.edit-product',compact('gyms','product'));  
     }
     public function update(ProductRequest $request,$id)
     {
                $product=Product::find($id);
                $product->product_type = $request->product_type;
                $product->product_name = $request->product_name;       
                $product->product_description = $request->product_description;
                $product->product_price = $request->product_price;
                
                if($request->hasFile('product_image')){
                  $extension=$request->product_image->extension();
                  $filename=time()."_.".$extension;
                  $request->product_image->move(public_path('productImages'),$filename);
                  $product->product_image=$filename;
                }


                $product->save();
                return back()->with('success','Product Updated Successfully');
     }
     public function destroy($id)
     {
        Product::find($id)->delete();
        return back()->with('success','Product Removed Successfully');
     }
}
