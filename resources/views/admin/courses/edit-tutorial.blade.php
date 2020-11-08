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
                    <form action="{{route('upload-tutorial.update',$tutorial->id)}}" method="post" enctype="multipart/form-data" >
                       <h2 style="font-size: 22px; text-align: center;"><strong>Edit Tutorials</strong></h2>
                   @csrf
                   @method("PUT")
                   @include('errors.errors')
                        @include('message.message')
                        <div class="form-group">
                          <label style="color: black"> <strong>Course Name</strong></label>
                            <input type="text" class="form-control" name="course_name" value="{{$tutorial->course_name}}">
                        </div>
                        <div class="form-group">
                          <label style="color: black"> <strong>Course Price</strong></label>
                            <input type="text" class="form-control" name="course_price" value="{{$tutorial->course_price }}">
                        </div>
                        <div class="form-group">
                          <label style="color: black"> <strong>Category</strong></label>
                            <input type="text" class="form-control" name="category" value="{{$tutorial->category }}">
                        </div>
                        <div class="form-group">
                         <label style="color: black"> <strong>Course Type</strong></label>
                            <select data-plugin="customselect" class="form-control" name="type">
                                                        <option value="0" {{$tutorial->type==0 ? 'selected':''}}>Free</option>
                                                        <option value="1" {{$tutorial->type==1 ?'selected':''}}>Paid</option>
                                                    
                                                    </select>
                        </div>
                        
                       <br>
                        <div class="form-group">
                            <input type="file" name="course_videos[]" style="font-size: 14px"  class="btn btn-primary btn-block btn-lg" value="Upload File">
                            
                        </div>
                        <div class="form-group">
                            <button style="font-size: 14px" type="submit" class="btn btn-warning btn-block btn-lg">EDIT TUTORIALS</button>
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
@endsection