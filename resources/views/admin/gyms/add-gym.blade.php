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
                    <form action="{{Route('add-gym')}}" method="post">
                       <h2 style="font-size: 22px; text-align: center;">Add New Gym</h2>
                       @include('errors.errors')
                        @include('message.message')
                   @csrf
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="full_name" >
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" >
                        </div>
                          <div class="form-group">
                            <label>City Name</label>
                            <input type="text" class="form-control" name="full_name1">
                        </div>
                        <div class="form-group">
                            <label>Zip Code</label>
                            <input type="text" class="form-control" name="zipcode">
                        </div>
                        <div class="form-group">
                            <label>Street Address</label>
                            <input type="text" class="form-control" name="street_address">
                        </div>
                        <div class="form-group">
                            <label>Contact No.</label>
                            <input type="text" class="form-control" name="phoneno">
                        </div>
                        <div class="form-group">
                            <label>Gym Detail</label>
                            <input type="text" class="form-control" name="gym_detail   ">
                        </div>
                        <div class="form-group">
                            <label>Cost Per Day</label>
                            <input type="text" class="form-control" name="cost_per_day   ">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Submit</button>
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