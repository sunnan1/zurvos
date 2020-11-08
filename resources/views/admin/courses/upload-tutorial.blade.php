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
                    <form action="#" method="post" enctype="multipart/form-data">
                       <h2 style="font-size: 22px; text-align: center;"><strong>Add New Tutorials</strong></h2>
                   @csrf
                   @include('errors.errors')
                        @include('message.message')
                        <div class="form-group">
                          <label style="color: black"> <strong>Course Name</strong></label>
                            <input type="text" class="form-control" name="course_name" >
                        </div>
                        <div class="form-group">
                          <label style="color: black"> <strong>Course Price</strong></label>
                            <input type="text" class="form-control" name="course_price" >
                        </div>
                        <div class="form-group">
                          <label style="color: black"> <strong>Category</strong></label>
                            <input type="text" class="form-control" name="category" >
                        </div>
                        <div class="form-group">
                         <label style="color: black"> <strong>Course Type</strong></label>
                            <select data-plugin="customselect" class="form-control" name="type">
                                                        <option value="0">Free</option>
                                                        <option value="1">Paid</option>
                                                    
                                                    </select>
                        </div>
                        
                       <br>
                        <div class="form-group">
                            <input type="file" name="course_videos[]" style="font-size: 14px"  class="btn btn-primary btn-block btn-lg" value="Upload File">
                            
                        </div>
                        <div class="form-group">
                            <button style="font-size: 14px" type="submit" class="btn btn-primary btn-block btn-lg">ADD TUTORIALS</button>
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