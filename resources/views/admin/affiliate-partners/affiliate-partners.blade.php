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
                                                    <span class="d-block d-sm-none"><small>New Users</small></span>
                                                    <span class="d-none d-sm-block">NEW USERS</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#two" data-toggle="tab" aria-expanded="true"
                                                    class="nav-link">
                                                    <span class="d-block d-sm-none"><small>Varified Users</small></span>
                                                    <span class="d-none d-sm-block">VERIFIED USERS</span>
                                                </a>
                                            </li>
                                            
                                        </ul>


                                        <div class="tab-content p-3 text-muted">
                                            
                                            <div class="tab-pane active" id="one">
                                            @foreach($departner as $partner)    


                                    <div class="dropdown align-self-center float-right">
                                            <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="uil uil-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <!-- item-->
                                                <a  href="{{route('partner.edit',$partner->id)}}" class="dropdown-item">
                                                Edit Profile</a>

                                               
                                                

                                                            <!-- Divider -->

                                                <div class="dropdown-divider"></div>

                                                <!-- ------------------ -->

                                               
                                                 <a href="{{route('partner.destroy',$partner->id)}}"   class="dropdown-item"  onclick="
                   if(confirm('Are You Sure You Want To Delete?')){
                     event.preventDefault();
                   document.getElementById('delete-form-{{$partner->id}}').submit();
                   }
                   ">Delete</a>

                                                     <form id="delete-form-{{$partner->id}}" action="{{route('partner.destroy',$partner->id)}}" method="post" style="display:none">
                             @csrf
                            @method('DELETE')
                            </form>  




                                                  <div class="dropdown-divider"></div>

                                                
                                                
                                            </div>
                                        </div>


                                    <div class="media border-top pt-3">
                                        <img src="{{asset('public/assets/images/users/avatar-9.jpg')}}" class="mr-3 rounded-circle"  height="85"/>
                                        
                                        
                                <div class="media-body">

                                            <h6 class="mt-1 mb-0 font-size-15" style="padding-top: 15px; margin: 7px;"><strong>{{$partner->name}}</strong></h6>
                                           
                                           <p style="color: #1a6adf; padding-left: 8px; ">{{$partner->email}}</p>
                                          
                                        </div>
                                      
                                    </div>  
@endforeach
                                    <div class="dropdown-divider"></div>


                               





                                            </div>

                                            <!-- TAB 2 -->


                                            <div class="tab-pane" id="two">
                                                
                                        @foreach($acpartner as $partner)
                                        
                                <div class="dropdown align-self-center float-right">
                                            <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="uil uil-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <!-- item-->
                                                <a href="{{route('partner.edit',$partner->id)}}" class="dropdown-item">
                                                Edit Profile</a>

                                                 

                                                            <!-- Divider -->

                                                <div class="dropdown-divider"></div>

                                                <!-- ------------------ -->

                                                 <a href="{{route('partner.destroy',$partner->id)}}"   class="dropdown-item"  onclick="
                   if(confirm('Are You Sure You Want To Delete?')){
                     event.preventDefault();
                   document.getElementById('delete-form-{{$partner->id}}').submit();
                   }
                   ">Delete</a>

                                                     <form id="delete-form-{{$partner->id}}" action="{{route('partner.destroy',$partner->id)}}" method="post" style="display:none">
                             @csrf
                            @method('DELETE')
                            </form>  



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


                                            <!-- TAB 3 -->


<div class="tab-pane" id="three">



                                    <div class="dropdown align-self-center float-right">
                                            <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="uil uil-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">
                                                View Profile</a>

                                                 <div class="dropdown-divider"></div>

                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Award Verify Badge</a>
                                                

                                                            <!-- Divider -->

                                                <div class="dropdown-divider"></div>

                                                <!-- ------------------ -->

                                                 <a href="javascript:void(0);" class="dropdown-item">Session History</a>



                                                  <div class="dropdown-divider"></div>

                                                <!-- ------------------ -->

                                                 <a href="javascript:void(0);" class="dropdown-item">Delete</a>
                                                
                                            </div>
                                        </div>


                                    <div class="media border-top pt-3">
                                        <img src="{{asset('public/assets/images/users/avatar-9.jpg')}}" class="mr-3 rounded-circle"  height="85"/>
                                        
                                        
                                        <div class="media-body">

                                            <h6 class="mt-1 mb-0 font-size-15" style="padding-top: 15px; margin: 7px;"><strong>Mario Speedwagon</strong></h6>
                                           
                                           <i data-feather="map-pin" style="margin: 2px; height: 17px;"></i>
                                            <span style="align-content: center;" class="text-muted">Carver Park, SC</span>
                                        </div>
                                      
                                    </div>

                                    <div class="dropdown align-self-center float-right">
                                            <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="uil uil-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">
                                                View Profile</a>

                                                 <div class="dropdown-divider"></div>

                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Award Verify Badge</a>
                                                

                                                            <!-- Divider -->

                                                <div class="dropdown-divider"></div>

                                                <!-- ------------------ -->

                                                 <a href="javascript:void(0);" class="dropdown-item">Session History</a>



                                                  <div class="dropdown-divider"></div>

                                                <!-- ------------------ -->

                                                 <a href="javascript:void(0);" class="dropdown-item">Delete</a>
                                                
                                            </div>
                                        </div>


                                    <div class="media border-top pt-3">
                                        <img src="{{asset('public/assets/images/users/avatar-9.jpg')}}" class="mr-3 rounded-circle"  height="85"/>
                                        
                                        
                                        <div class="media-body">

                                            <h6 class="mt-1 mb-0 font-size-15" style="padding-top: 15px; margin: 7px;"><strong>Mario Speedwagon</strong></h6>
                                           
                                           <i data-feather="map-pin" style="margin: 2px; height: 17px;"></i>
                                            <span style="align-content: center;" class="text-muted">Carver Park, SC</span>
                                        </div>
                                      
                                    </div>


                                    <div class="dropdown align-self-center float-right">
                                            <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="uil uil-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">
                                                View Profile</a>

                                                 <div class="dropdown-divider"></div>

                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Award Verify Badge</a>
                                                

                                                            <!-- Divider -->

                                                <div class="dropdown-divider"></div>

                                                <!-- ------------------ -->

                                                 <a href="javascript:void(0);" class="dropdown-item">Session History</a>



                                                  <div class="dropdown-divider"></div>

                                                <!-- ------------------ -->

                                                 <a href="javascript:void(0);" class="dropdown-item">Delete</a>
                                                
                                            </div>
                                        </div>


                                    <div class="media border-top pt-3">
                                        <img src="{{asset('public/assets/images/users/avatar-9.jpg')}}" class="mr-3 rounded-circle"  height="85"/>
                                        
                                        
                                        <div class="media-body">

                                            <h6 class="mt-1 mb-0 font-size-15" style="padding-top: 15px; margin: 7px;"><strong>Mario Speedwagon</strong></h6>
                                           
                                           <i data-feather="map-pin" style="margin: 2px; height: 17px;"></i>
                                            <span style="align-content: center;" class="text-muted">Carver Park, SC</span>
                                        </div>
                                      
                                    </div>



                                    <div class="dropdown align-self-center float-right">
                                            <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="uil uil-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">
                                                View Profile</a>

                                                 <div class="dropdown-divider"></div>

                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Award Verify Badge</a>
                                                

                                                            <!-- Divider -->

                                                <div class="dropdown-divider"></div>

                                                <!-- ------------------ -->

                                                 <a href="javascript:void(0);" class="dropdown-item">Session History</a>



                                                  <div class="dropdown-divider"></div>

                                                <!-- ------------------ -->

                                                 <a href="javascript:void(0);" class="dropdown-item">Delete</a>
                                                
                                            </div>
                                        </div>


                                    <div class="media border-top pt-3">
                                        <img src="{{asset('public/assets/images/users/avatar-9.jpg')}}" class="mr-3 rounded-circle"  height="85"/>
                                        
                                        
                                        <div class="media-body">

                                            <h6 class="mt-1 mb-0 font-size-15" style="padding-top: 15px; margin: 7px;"><strong>Mario Speedwagon</strong></h6>
                                           
                                           <i data-feather="map-pin" style="margin: 2px; height: 17px;"></i>
                                            <span style="align-content: center;" class="text-muted">Carver Park, SC</span>
                                        </div>
                                      
                                    </div>

                                    <hr>


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