@extends('admin.layouts.app')

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
             <form action="{{Route('exercise-lib.update',$exerciselib->id)}}" method="post" enctype="multipart/form-data">
                       <h2 style="font-size: 22px; text-align: center;"><strong>Edit Library</strong></h2>
                    @include('errors.errors')
                        @include('message.message')
                   @csrf
                   @method('PUT')
                        <div class="form-group">
                          <label style="color: black">Video Title</label>
                            <input type="text" class="form-control" name="video_title" value="{{$exerciselib->video_title}}" >
                        </div>
                        <div class="form-group">

                          <label style="color: black"> Video Description</label>
                            <input type="text" class="form-control" name="video_description"  value="{{$exerciselib->video_description}}">
                        </div>
                       
                         <div class="form-group">
                            <div class="row">
                            <div class="col-md-9">
                          <label style="color: black"> Video Tags</label>
                            <input type="text" class="form-control" id="selected" name="tags" value="{{$exerciselib->tags}}">
</div>
<div class="col-md-3">
                            <a style="margin-top: 30px;" class="btn btn-warning btn-xs seat">Add Tag</a>
                            </div>  
                        </div>
                        </div>
                         <div class="form-group">
                         <label style="color: black">Video Type</label>
                            <select data-plugin="customselect" name="type" class="form-control">
                                <option disabled selected="">--select--</option>
                               
                                <option value="1" {{$exerciselib->type==1 ? 'selected':''}}>Paid</option>
                                <option value="0" {{$exerciselib->type==0 ?'selected':'' }}>Free</option>
                             
                                                      
                                                    </select>
                        </div>
                          <div class="form-group">
                         <label style="color: black">Video Level</label>
                            <select data-plugin="customselect" name="video_level" class="form-control">
                                <option disabled selected="">--select--</option>
                               
                                <option value="Easy" {{$exerciselib->video_level=="Easy" ? 'selected':''}}>Easy</option>
                                <option value="Medium" {{$exerciselib->video_level=="Medium" ? 'selected':''}}>Medium</option>
                                <option value="Hard" {{$exerciselib->video_level="Hard" ?'selected':''}}>Hard</option>
                                
                                                      
                                                    </select>
                        </div>
                    
                        <div class="form-group">
                          <label style="color: black">Price</label>
                            <input type="text" class="form-control" name="price" value="{{$exerciselib->price}}" >
                        </div>
                        <div class="form-group">
                         <label style="color: black"> Select Customer</label>
                            <select data-plugin="customselect" name="customer" class="form-control">
                                <option disabled selected="">--select--</option>
                                @foreach($influences as $influence)
                                
                                <option value="{{$influence->id}}" {{$exerciselib->influence==$influence->id ? 'selected':''}}>{{$influence->full_name}}</option>
                                @endforeach
                                                      
                                                    </select>
                        </div>
                    
                      
   <div class="form-group">
                            <label style="color: black">Chose Video </label>
                            <input type="file" name="video" style="font-size: 14px"  class="btn btn-primary btn-block btn-lg">
                        </div>
                      
                        <div class="form-group">
                            <button style="font-size: 14px" type="submit" class="btn btn-primary btn-block btn-lg">UPDATE LIBRARY</button>
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
                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row pb-3 border-bottom">
                                        <div class="col">

                                            
                                        @include('admin.layouts.rightsidebar');
                                            

                                        </div>
                                    </div>

                                  
                                </div> <!-- end card-body -->
                            </div> <!-- end card-->
                        </div> <!-- end col -->
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
