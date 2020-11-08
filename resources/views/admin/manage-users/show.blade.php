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
                                   <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a href="#one" data-toggle="tab" aria-expanded="false"
                                                    class="nav-link active">
                                                    <span class="d-block d-sm-none"><small>User Ptrofile</small></span>
                                                    <span class="d-none d-sm-block">User Profile</span>
                                                </a>
                                            </li>
                                           
                                         
                                        </ul>


                                        <div class="tab-content p-3 text-muted">
                                            <div class="tab-pane active" id="one">
                                    

                                                  <div class="dropdown align-self-center float-right">
                                           
                                          
                                        </div>

                                        
                                    <div class="media border-top pt-3">
                                        <img src="{{asset('public/assets/images/users/avatar-9.jpg')}}" class="mr-3 rounded-circle"  height="85"/>
                                        
                                        
                                        <div class="media-body" style="margin-left: 80px;">

                                            <h6 class="mt-1 mb-0 font-size-15" style="padding-top: 15px; margin: 7px;"><strong>{{$user->full_name}}</strong></h6>
                                           
                                           <i data-feather="map-pin" style="margin: 2px; height: 17px;"></i>
                                            <span style="align-content: center;" class="text-muted">{{$user->city}}</span>

                                           <br>
                                           <strong>Email : {{$user->email}}</strong>
                                           <br>
                                           <strong>zip code : {{$user->zip_code}}</strong>
                                           <br>
                                           <strong>street address : {{$user->street_address}}</strong>
                                           <br>
                                           <strong>phone no : {{$user->phone_no}}</strong>
                                           <br>
                                           <strong>Gender : {{$user->gender}}</strong>
                                           <br>
                                           <strong>Shirt size : {{$user->shirt_size}}</strong>
 <br>
                                           <strong>Deposit Amount : {{$user->deposit_amount}}</strong>
 <br>
                                           <strong>Avalable Amount : {{$user->avalable_amount}}</strong>


                                        </div>

                                      
                                    </div>

                               
                                   
                                            </div>

                                            <!-- TAB 2 -->

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