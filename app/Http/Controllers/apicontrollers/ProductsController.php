<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Traits\ProductTrait;
use App\Http\Resources\ProductsCollection;
use App\Http\Resources\ProductTypesCollection;

class ProductsController extends Controller
{
	 use ProductTrait;

     public function addproduct(ProductRequest $request){

    	 $result=$this->newproduct($request);

             if ($result == true) {

               return response(['message' => 'Product added','status' =>'success']);
            
             }else{

              return response(['message' => 'Product Not added','status' =>'error']);
           }
    }

     public function allproducts(){

    	 $result=$this->allProduct();

          if ($result->count() >0) {

             return  ProductsCollection::collection($result);

         }else{
             
            return response(['message' => 'Products Not Found','status' =>'error']);
         }
    }

    public function producttypes(){

    	  $result=$this->types();

          if ($result->count() >0) {

             return  ProductTypesCollection::collection($result);

         }else{
             
            return response(['message' => 'Products Types Not Found','status' =>'error']);
         }
    }

    public function relatedproducts($type){

    	 $result=$this->relrvent($type);

          if ($result->count() >0) {

             return  ProductsCollection::collection($result);

         }else{
             
            return response(['message' => 'Products Not Found','status' =>'error']);
         }
    }
}
