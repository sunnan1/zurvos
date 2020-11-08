@extends('customer.layout.app')
 @section('heads')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 @endsection
   @section('main-content')
 <div class="content-page" style="margin-top: 76px;">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    <!-- tasks panel -->
                    <div class="row">
                        <div class="col-xl-1">
    
</div>
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            

 <div class="signup-form" style="align-self: center;">
       <form action="{{Route('posts.store')}}" method="post" enctype="multipart/form-data">
                       <h2 style="font-size: 22px; text-align: center;"><strong>Create Post</strong></h2>
                    @include('errors.errors')
                        @include('message.message')
                   @csrf
                        <div class="form-group">
                          <label style="color: black">Post</label>
                            <textarea  class="form-control" name="post_title" placeholder="Write Here">

                              </textarea> 
                        </div>
                        <div class="form-group">
                         <button class="btn btn-primary btn-sm text-dark" id="addImage" onclick="event.preventDefault();" style="border: 1px solid black;">Add Image</button>
                          <button class="btn btn-primary btn-sm text-dark" id="addVideo" onclick="event.preventDefault();" style="border: 1px solid black;">Add Video</button>
                           <button class="btn  btn-sm text-dark" id="checkIn" onclick="event.preventDefault();" style="border: 1px solid black;">Checkin</button>
                          <input type="file" name="post_image" id="Image" style="display: none;">
                          <input type="file" name="post_video" id="Video" style="display: none;">

                          <input type="hidden" class="form-control" id="checkin1" name="checkin" >
                        </div>
                        
                        <div class="form-group">

                       
                       
                        <div class="form-group">
                            <button style="font-size: 14px" type="submit" class="btn btn-primary btn-block btn-lg">ADD POST</button>
                        </div>
                    </form>
         {{--   <form action="{{Route('posts.store')}}" method="post" enctype="multipart/form-data">
                       <h2 style="font-size: 22px; text-align: center;"><strong>Add New Post</strong></h2>
                    @include('errors.errors')
                        @include('message.message')
                   @csrf
                        <div class="form-group">
                          <label style="color: black">Post Title</label>
                            <input type="text" class="form-control" name="post_title" >
                        </div>
                        <div class="form-group">

                          <label style="color: black">Checkin</label>
                            <input type="text" class="form-control" name="checkin" >
                        </div>
                       
                         <div class="form-group">
                         
                          <label style="color: black"> location</label>
                            <input type="text" class="form-control" id="selected" name="location" >

                            </div>  
                        </div>
                        </div>
                     
                       
                    
                   
                      <div class="form-group">
                            <label style="color: black">Post Image </label>
                            <input type="file" name="post_image" style="font-size: 14px"  class="btn btn-primary btn-block btn-lg">
                        </div> 
                      
                     <div class="form-group">
                            <label style="color: black">Post Video </label>
                            <input type="file" name="post_video" style="font-size: 14px"  class="btn btn-primary btn-block btn-lg">
                        </div>
                      
                        <div class="form-group">
                            <button style="font-size: 14px" type="submit" class="btn btn-primary btn-block btn-lg">ADD POST</button>
                        </div>
                    </form> --}}
                  </div>
                </form>
              </div>
            </div>
              
               <div class="card">
              @foreach($posts as $post)
  <div class="card-header">
  
  </div>

  <div class="card-body">
    <h5 class="card-title">{{$post->post_title}}</h5>

    <p class="card-text">
      @if($post->post_image)
      <img src="{{asset('public/postImages/'.$post->post_image)}}" width="100%" height="340">
      @else
      <video width="100%" height="340" controls>
  <source src="{{asset('public/postVideos/'.$post->post_video)}}" type="video/mp4">
  <source src="{{asset('public/postVideos/'.$post->post_video)}}" type="video/ogg">
  Your browser does not support the video tag.
</video>
@endif
    </p>
  {{--  <a href="#!" class="btn btn-primary">Go somewhere</a> --}}

  </div>
  <div class="card-footer">
     <a href="#!" onclick="event.preventDefault();" class="text-dark Like" data-id="{{$post->id}}"><i class="fa fa-thumbs-up" ></i>Like({{$post->totallikes($post->id)}})</a>
     <a href="#!" style="margin-left: 33%;" class="text-dark Comments" data-id="{{$post->id}}"><i class="fa fa-comments-o" aria-hidden="true"></i>Comments({{$post->totalcomments($post->id)}})</a>
          <a href="#!" style="float: right;" class="text-dark"><i class="fa fa-share-alt" aria-hidden="true"></i>Share({{$post->totalshares($post->id)}})</a>
  <div  id="card-{{$post->id}}" style="display: none;">
     <form enctype="multipart/form-data">
      <div class="form-group">
                  <textarea class="form-control">Wrirte Comment Here</textarea>
                  <br>
                  <button class="btn-primary" style="vertical-align:text-top;">Send</button>
                  </form>
                  </div>
<div class="card">
                   <div class="card-header">
  </div>

  <div class="card-body">
    <h5 class="card-title">Recently Comments</h5>

    <p class="card-text">
     
      
  Your browser does not support the video tag.

    </p>
  {{--  <a href="#!" class="btn btn-primary">Go somewhere</a> --}}

  </div>
</div>
     </div>


  </div>

  @endforeach
</div>

 
 
 
</div>

                                            <!-- end row -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<div class="col-xl-1">
    
</div>
                       
                    </div>

                </div> <!-- container-fluid -->

            </div> <!-- content -->



        </div>
       
        <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script type="text/javascript">

    $(document).ready(function(){
    $selected = $('#selected');
    $(".seat").on("click", function(e) {
        e.preventDefault(e);
  const cur = $selected.val();
 // const valToInsert = $(this).text();
  const valToInsert ='';
  $selected.val(cur.length === 0 ? valToInsert : cur.split(',').concat(valToInsert).join(','));
  $selected.val(cur.length === 0 ? valToInsert : cur.split(',').concat(valToInsert).join(','));

});
    $("#addImage").click(function(){
    $('#Image').trigger('click');
    });
    $("#addVideo").click(function(){
    $('#Video').trigger('click');
    });
     $("#checkIn").click(function(){
      if($(this).hasClass('btn-primary'))
      {
        $(this).removeClass('btn-primary');
        $("#checkin1").val('');
      }
      else
      {
       $(this).addClass('btn-primary');
        $("#checkin1").val('checkin');
      }
    });
     $(".Like").click(function(){
      var postId=$(this).attr('data-id');
      if($(this).hasClass('text-dark'))
      {
        $(this).removeClass('text-dark');
        $(this).addClass('text-primary');

      }
      else
      {
        $(this).removeClass('text-primary');
        $(this).addClass('text-dark');
      }
     });
         $(".Comments").click(function(e){
          e.preventDefault();
      var postId=$(this).attr('data-id');
      var cardId="card-"+postId;
      $("#"+cardId).toggle();
      
      if($(this).hasClass('text-dark'))
      {
        $(this).removeClass('text-dark');
        $(this).addClass('text-primary');


      }
      else
      {
        $(this).removeClass('text-primary');
        $(this).addClass('text-dark');
      }
     });
    });
</script>
@endsection
