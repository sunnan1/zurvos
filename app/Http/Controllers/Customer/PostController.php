<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use App\models\Post;
use App\Traits\Poststrait;
use DB;

class PostController extends Controller
{
    use Poststrait;
    public function __construct()
    {
        $this->middleware('auth:customer');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $posts=Post::OrderBy('id','Desc')->get();
        return view('customer.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
                $posts=Post::OrderBy('id','Desc')->get();
        return view('customer.post.create',compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        $request['customer_id']=auth()->user()->id;
            $result=$this->newpost($request);

             if ($result == true) {

               return redirect()->route('posts.create')->with(['success'=>'Post Added Successfully']);
            
             }else{

              return back()->withErrors(['msg' => 'Post Not added']);
           }
             
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        $post=Post::find($id);
        return view('customer.post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
                $post=Post::find($id);
                $post->post_title = $request->post_title;
                $post->checkin = $request->checkin;       
                $post->location = $request->location;
                $post->customer_id = $request->customer_id;
                
                if($request->hasFile('post_image')){
                  $extension=$request->post_image->extension();
                  $filename=time()."_.".$extension;
                  $request->post_image->move(public_path('postImages'),$filename);
                  $post->post_image=$filename;
                }

                if($request->hasFile('post_video')){
                  $extension=$request->post_video->extension();
                  $filename=time()."_.".$extension;
                  $request->post_video->move(public_path('postVideos'),$filename);
                  $post->post_video=$filename;
                }
                $result=$post->save();
        return redirect()->route('posts.index')->with(['success'=>'Record updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return back()->with(['success'=>'Post Removed Successfully']);
    }
}
