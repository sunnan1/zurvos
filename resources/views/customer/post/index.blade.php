@extends('customer.layout.app')

   @section('main-content')
      
   <style type="text/css">
       
   </style>
        <div class="content-page" style="margin-top: 76px;">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    <!-- tasks panel -->
                    <div class="row">
         
                        <div class="col-xl-8">
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-title">
                                            <h3>All Posts</h3>
                                        </div>

                                        <div class="card-body table-responsive table-stripped">
                                              @include('message.message')
                                            <table class="table">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Id</th>
                                                        <th>Post Title</th>
                                                        <th>Checkin</th>
                                                        <th>Location</th>
                                                        <th>Post Image</th>
                                                        <th>Post Video</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($posts as $post)
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{$post->id}}</td>
                                                        <td>{{$post->post_title}}</td>
                                                        <td>{{$post->checkin}}</td>
                                                        <td>{{$post->location}}</td>
                                                        <td>
                                                            <img src="{{asset('public/postImages/'.$post->post_image)}}" style="height: 50px;width: 50px;border-radius: 50px;">
                                                        </td>
                                                        <td>
                                                            
                                                               <video width="130" height="110" controls style="">
  <source src="{{asset('public/postVideos/'.$post->post_video)}}" type="video/mp4">
  <source src="{{asset('public/postVideos/'.$post->post_video)}}" type="video/ogg">
  Your browser does not support the video tag.
</video></td>
                
                                                        </td>
                                                       
                                                        <td><div class="dropdown">
  <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Action
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="{{route('posts.edit',$post->id)}}" class="dropdown-item">Edit</a></li>
    <li><a href="{{route('posts.destroy',$post->id)}}" class="dropdown-item" onclick="
                   if(confirm('Are You Sure You Want To Delete?')){
                     event.preventDefault();
                   document.getElementById('delete-form-{{$post->id}}').submit();
                   }
                   ">Delete</a>


  
                            
                                                     <form id="delete-form-{{$post->id}}" action="{{route('posts.destroy',$post->id)}}" method="post" style="display:none">
                             @csrf
                            @method('DELETE')
                            </form>    

    </li>
  </ul>
</div></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>


                                            <!-- end row -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                     
                    </div>

                </div> <!-- container-fluid -->

            </div> <!-- content -->
        </div>
@endsection  