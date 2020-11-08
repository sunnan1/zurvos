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
                                            <li class="nav-item">
                                                <a href="#three" data-toggle="tab" aria-expanded="false"
                                                    class="nav-link">
                                                    <span class="d-block d-sm-none"><small>Affiliate Partner</small></span>
                                                    <span class="d-none d-sm-block">AFFILIATE PARTNER</span>
                                                </a>
                                            </li>
                                        </ul>


                                        <div class="tab-content p-3 text-muted">
                                            <div class="tab-pane active" id="one">
                                        @foreach($users as $user)
                                                  <div class="dropdown align-self-center float-right">
                                            <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="uil uil-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <!-- item-->
                                                <a href="{{route('manage-users.show',$user->id)}}" class="dropdown-item">
                                                View Profile</a>

                                               
                                              

                                              


                                                  <div class="dropdown-divider"></div>

                                                <!-- ------------------ -->

                                                
                                                 <a href="{{route('manage-users.destroy',$user->id)}}"   class="dropdown-item"  onclick="
                   if(confirm('Are You Sure You Want To Delete?')){
                     event.preventDefault();
                   document.getElementById('delete-form-{{$user->id}}').submit();
                   }
                   ">Delete</a>

                                                     <form id="delete-form-{{$user->id}}" action="{{route('manage-users.destroy',$user->id)}}" method="post" style="display:none">
                             @csrf
                            @method('DELETE')
                            </form>  

                                                
                                            </div>
                                        </div>

                                        
                                    <div class="media border-top pt-3">
                                        <img src="{{asset('public/assets/images/users/avatar-9.jpg')}}" class="mr-3 rounded-circle"  height="85"/>
                                        
                                        
                                        <div class="media-body">

                                            <h6 class="mt-1 mb-0 font-size-15" style="padding-top: 15px; margin: 7px;"><strong>{{$user->full_name}}</strong></h6>
                                           
                                           <i data-feather="map-pin" style="margin: 2px; height: 17px;"></i>
                                            <span style="align-content: center;" class="text-muted">{{$user->phone_no}}</span>
                                        </div>
                                      
                                    </div>

                                    @endforeach
                                   
                                            </div>

                                            <!-- TAB 2 -->


                                            <div class="tab-pane" id="two">
                                       
@foreach($users as $user)
                                                  <div class="dropdown align-self-center float-right">
                                            <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="uil uil-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <!-- item-->
                                                <a href="{{route('manage-users.show',$user->id)}}" class="dropdown-item">
                                                View Profile</a>

                                                



                                                  <div class="dropdown-divider"></div>

                                                <!-- ------------------ -->

                                                 <a href="{{route('manage-users.destroy',$user->id)}}"   class="dropdown-item"  onclick="
                   if(confirm('Are You Sure You Want To Delete?')){
                     event.preventDefault();
                   document.getElementById('delete-form-{{$user->id}}').submit();
                   }
                   ">Delete</a>

                                                     <form id="delete-form-{{$user->id}}" action="{{route('manage-users.destroy',$user->id)}}" method="post" style="display:none">
                             @csrf
                            @method('DELETE')
                            </form>  

                                                
                                            </div>
                                        </div>

                                        
                                    <div class="media border-top pt-3">
                                        <img src="{{asset('public/assets/images/users/avatar-9.jpg')}}" class="mr-3 rounded-circle"  height="85"/>
                                        
                                        
                                        <div class="media-body">

                                            <h6 class="mt-1 mb-0 font-size-15" style="padding-top: 15px; margin: 7px;"><strong>{{$user->full_name}}</strong></h6>
                                           
                                           <i data-feather="map-pin" style="margin: 2px; height: 17px;"></i>
                                            <span style="align-content: center;" class="text-muted">{{$user->phone_no}}</span>
                                        </div>
                                      
                                    </div>

                                    @endforeach

                                            </div>


                                            <!-- TAB 3 -->


                                            <div class="tab-pane" id="three">

                                @foreach($partners as $partner)

                                    <div class="dropdown align-self-center float-right">
                                            <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown"
                                                aria-expanded="false">
                                            
                                            </a>
                                           
                                        </div>


                                    <div class="media border-top pt-3">
                                        <img src="{{asset('public/assets/images/users/avatar-9.jpg')}}" class="mr-3 rounded-circle"  height="85"/>
                                        
                                        
                                        <div class="media-body">

                                            <h6 class="mt-1 mb-0 font-size-15" style="padding-top: 15px; margin: 7px;"><strong>{{$partner->name}}</strong></h6>
                                           
                                           <i data-feather="map-pin" style="margin: 2px; height: 17px;"></i>
                                            <span style="align-content: center;" class="text-muted">{{$partner->address}}</span>
                                        </div>
                                      
                                    </div>

                                    <hr>
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