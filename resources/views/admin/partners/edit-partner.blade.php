@extends('admin.layouts.app')

   @section('main-content')
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
                                        <div class="card-body">




                                          
                                   <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a href="#one" data-toggle="tab" aria-expanded="false"
                                                    class="nav-link active">
                                                    <span class="d-block d-sm-none"><small>Edit  User</small></span>
                                                    <span class="d-none d-sm-block">EDIT USER</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#two" data-toggle="tab" aria-expanded="true"
                                                    class="nav-link">
                                                    <span class="d-block d-sm-none"><small>Existing Users</small></span>
                                                    <span class="d-none d-sm-block">EXISTING USERS</span>
                                                </a>
                                            </li>
                                            
                                        </ul>


                                        <div class="tab-content p-3 text-muted">
                                            <div class="tab-pane active" id="one">
                                                


                                                    
                                        <div class="signup-form" style="align-self: center;">
                    <form action="{{Route('partner.update',$oldpartner->id)}}" method="post">
                       <h2 style="font-size: 22px; text-align: center;">Edit Partner</h2>
                   @csrf
                   @method('PUT')
                   @include('errors.errors')
                        @include('message.message')
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="name" value="{{$oldpartner->name}}" required="required" value="">
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" class="form-control" name="email" value="{{$oldpartner->email}}" required="required">
                        </div>
                       
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" value="{{$oldpartner->address}}" required="required">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-warning btn-block btn-lg">Submit</button>
                        </div>
                    </form>
 
</div>


                                    <div class="dropdown-divider"></div>


                               



                                            </div>

                                            <!-- TAB 2 -->


                                            <div class="tab-pane" id="two">
                                                
                                        
                                        @foreach($partners as $partner)
                                <div class="dropdown align-self-center float-right">
                                            <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="uil uil-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">
                                                Edit Profile</a>

                                               
                                                

                                                            <!-- Divider -->

                                                <div class="dropdown-divider"></div>

                                                <!-- ------------------ -->

                                                 <a href="javascript:void(0);" class="dropdown-item">Delete</a>



                                                  <div class="dropdown-divider"></div>

                                                
                                                
                                            </div>
                                        </div>

                                    <div class="media border-top pt-3">
                                        <img src="{{asset('public/assets/images/users/avatar-9.jpg')}}" class="mr-3 rounded-circle"  height="85"/>
                                        
                                        
                                        <div class="media-body">

                                            <h6 class="mt-1 mb-0 font-size-15" style="padding-top: 15px; margin: 7px;"><strong>{{$partner->name}}</strong></h6>
                                           
                                           <i data-feather="map-pin" style="margin: 2px; height: 17px;"></i>
                                            <span style="align-content: center;" class="text-muted">{{$partner->email}}</span>
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