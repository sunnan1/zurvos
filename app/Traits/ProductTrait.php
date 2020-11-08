<?php
namespace App\Traits;
use App\models\Product;
use DB;

trait ProductTrait
{
    public function newproduct($request){

    	    	$product=new Product();
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


    	        $result=$product->save();
                
    	        
    	        if ($result) {
    	             
    	             return true;
    	        }

        }

        public function allProduct(){
        	
        return DB::table('products')->select('id','product_name','product_price','product_image')->get();

        }

        public function types(){
        	
        return Product::distinct()->get(['product_type']);

        }

        public function relrvent($type){
        	
        return  DB::table('products')->select('id','product_name','product_price','product_image','product_description')->where('product_type', 'LIKE', "%{$type}%")->get();

        }

        
}
