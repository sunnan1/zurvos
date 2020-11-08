@extends('customer.layouts.app')

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
             <form action="{{Route('posts.update',$post->id)}}" method="post" enctype="multipart/form-data">
                       <h2 style="font-size: 22px; text-align: center;"><strong>Edit POST</strong></h2>
                    @include('errors.errors')
                        @include('message.message')
                   @csrf
                   @method('PUT')
                       <div class="form-group">
                          <label style="color: black">Post Title</label>
                            <input type="text" class="form-control" name="post_title" value="{{$post->post_title}}">
                        </div>
                        <div class="form-group">

                          <label style="color: black">Checkin</label>
                            <input type="text" class="form-control" name="checkin" value="{{$post->checkin}}">
                        </div>
                       
                         <div class="form-group">
                         
                          <label style="color: black"> location</label>
                            <input type="text" class="form-control" id="selected" name="location" value="{{$post->location}}">

                            </div>  
                        </div>
                        </div>
                     
                       
                    
                   
                      <div class="form-group">
                            <label style="color: black">Post Image </label>
                            <input type="file" name="post_image" style="font-size: 14px"  class="btn btn-primary btn-block btn-lg" value="{{$post->post_image}}">
                        </div> 
                      
                     <div class="form-group">
                            <label style="color: black">Post Video </label>
                            <input type="file" name="post_video" style="font-size: 14px"  class="btn btn-primary btn-block btn-lg" value="{{$post->post_video}}">
                        </div>
                      
                        <div class="form-group">
                            <button style="font-size: 14px" type="submit" class="btn btn-primary btn-block btn-lg">UPDATE POST</button>
                        </div>
                    </form>
 
 
</div>

                                            <!-- end row -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<div class="col-xl-1">
    
</div>
                        <!-- task details -->
                       
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
    });
</script>
@endsection
