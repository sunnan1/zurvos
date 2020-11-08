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
                                            @include('message.message')
                        <div class="row">

                            <div class="col-md-4 col-xl-6">

                                <div class="card">
                                    <div class="card-body p-0">

                                        <div class="media p-3">
                                            <div class="align-self-center">
                                             <div class="col-xl-3 col-lg-4 col-sm-6">
                                                <i class='uil uil-user' style="size: lg"></i>
                                            </div>
                                            </div>
                                            <div class="media-body">
                                                <h2 class="mb-0">{{$totalcustomer }}</h2>
                                                <span class="text-muted font-size-12 font-weight-bold">Total Users</span>

                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4 col-xl-6">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="media p-3">
                                            <div class="align-self-center">
                                             
                                                <div class="col-xl-3 col-lg-4 col-sm-6">
                                                <i class='uil uil-home'></i>
                                            </div>
                                            </div>
                                            <div class="media-body">
                                                <h2 class="mb-0">{{$totalgyms}}</h2>
                                                <span class="text-muted font-size-12 font-weight-bold">Total Gyms</span>

                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-xl-6">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="media p-3">
                                            <div class="align-self-center">
                                             <div class="col-xl-3 col-lg-4 col-sm-6">
                                                <i class='uil uil-volume'></i>
                                            </div>
                                            </div>
                                            <div class="media-body">
                                                <h2 class="mb-0">{{$totalpartner}}</h2>
                                                <span class="text-muted font-size-12 font-weight-bold">Total Affiliate Partners</span>

                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-xl-6">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="media p-3">
                                            <div class="align-self-center">
                                             
                                               <div class="col-xl-3 col-lg-4 col-sm-6">
                                                <i class='uil uil-users-alt'></i>
                                            </div>
                                            </div>
                                            <div class="media-body">
                                                <h2 class="mb-0">{{$totalcustomer}}</h2>
                                                <span class="text-muted font-size-12 font-weight-bold">Total Verified Users</span>

                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                        </div> 

                        <div class="row">
                        

                        <div class="card-body pt-2">
                                        <h5 class="mb-4 header-title">Top Affiliated Users</h5>
                                        @foreach($latestcustomers as $cust)
                                        <div class="media border-top pt-3">

                                            <img src="{{asset('public/assets/images/users/avatar-7.jpg')}}" class="avatar rounded mr-3"
                                                alt="shreyu">
                                            <div class="media-body">
                                                <div class="dropdown align-self-center float-right">
                                               
                                            </div>
                                               <b> <h3 class="mt-1 mb-1 font-size-15">{{$cust->full_name}}</h3></b>
                                                <p class="mb-0 mt-2">
                                                    <i data-feather="map-pin"></i>
                                                       <span style="align-content: center;" class="text-muted">{{$cust->city}}</span>  
                                                </p>
                                                <h6 class="text-muted font-weight-normal mt-1 mb-3">Date: {{\carbon\carbon::parse($cust->created_at)->format('Y/m/d')}} </h6>
                                            


                                            </div>
                                            
                                        </div>
                                        @endforeach
                                         <div class="media border-top pt-3">

                                         
                                            <div class="media-body">
                                                <div class="dropdown align-self-center float-right">
                                                
                                                
                                            </div>
                                              
                                            </div>
                                            
                                        </div>


                                        
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

                                            @include('admin.layouts.rightsidebar')

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