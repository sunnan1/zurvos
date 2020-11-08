<?php

namespace App\Http\Controllers\apicontrollers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Poststrait;
use App\Http\Resources\PostsCollection;
use App\models\Post;
use DB;
class PostsController extends Controller
{
	use Poststrait;

    public function postsdata(){

    	 $result=$this->allposts();

          if ($result->count() >0) {


             return  PostsCollection::collection($result);

         }else{
             
            return response(['message' => 'Posts Not Found','status' =>'error']);
         }
    }

    public function posts(Request $request){

    	 $result=$this->newpost($request);

             if ($result == true) {

               return response(['message' => 'Post added successfully','status' =>'success']);
            
             }else{

              return response(['message' => 'Post Not added','status' =>'error']);
           }
    }
    public function Singlepost($id)
    {
       // return $id;
        $post=DB::table('posts')->where('posts.id',$id)
        ->join('customers','customers.id','=','posts.customer_id')->select('posts.*','customers.full_name')->get();
        if ($post) {


             return  PostsCollection::collection($post);

         }else{
             
            return response(['message' => 'Posts Not Found','status' =>'error']);
         }

    }

    
}
