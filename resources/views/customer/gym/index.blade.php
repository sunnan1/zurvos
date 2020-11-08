@extends('customer.layout.app')

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
                                                  </span>
                                                    <span class="d-none d-sm-block">Gym Near  Me</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#two" data-toggle="tab" aria-expanded="true"
                                                    class="nav-link">
                                                    <span class="d-block d-sm-none"><small>Varified Users</small></span>
                                                 
                                            </li>
                                            
                                        </ul>


                                        <div class="tab-content p-3 text-muted">
                                            
                                            <div class="tab-pane active" id="one">
                                            @foreach($gyms as $gym)    


                                    <div class="dropdown align-self-center float-right">
                                            <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown"
                                                aria-expanded="false">
                                                
                                            </a>
                                          
                                        </div>


                                    <div class="media border-top pt-3">
                                        <img src="{{asset('public/assets/images/users/avatar-9.jpg')}}" class="mr-3 rounded-circle"  height="85"/>
                                        
                                        
                                <div class="media-body">

                                            <h6 class="mt-1 mb-0 font-size-15" style="padding-top: 15px; margin: 7px;"><strong>{{$gym->full_name}}</strong></h6>
                                           
                                           <p style="color: #1a6adf; padding-left: 8px; ">{{$gym->email}}
                                            </p>
                                            <br>
                                            <i class="fa fa-map"></i> 
                                            {{$gym->street_address}}

                                           
                                          
                                        </div>
                                      
                                    </div>  
@endforeach
                                    <div class="dropdown-divider"></div>


                               





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

                                        @include('customer.layout.rightsidebar');
                                            

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