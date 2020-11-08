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
                                                    <span class="d-block d-sm-none"><small>Exercise Library</small></span>
                                                    <span class="d-none d-sm-block">EXERCISE LIBRARY</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#two" data-toggle="tab" aria-expanded="true"
                                                    class="nav-link">
                                                    <span class="d-block d-sm-none"><small>ADD CATEGORIES</small></span>
                                                    <span class="d-none d-sm-block">ADD CATEGORIES</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#three" data-toggle="tab" aria-expanded="false"
                                                    class="nav-link">
                                                    <span class="d-block d-sm-none"><small>EDIT PLAN </small></span>
                                                    <span class="d-none d-sm-block">EDIT PLAN</span>
                                                </a>
                                            </li>
                                        </ul>


                                        <div class="tab-content p-3 text-muted">
                                            <div class="tab-pane active" id="one">
                                        @foreach($exerciselibs as $user)
                                                  <div class="dropdown align-self-center float-right">
                                            <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="uil uil-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                


                                                  <div class="dropdown-divider"></div>

                                                <!-- ------------------ -->

                                                 <a href="{{route('exercise-lib.destroy',$user->id)}}" class="dropdown-item" onclick="
                   if(confirm('Are You Sure You Want To Delete?')){
                     event.preventDefault();
                   document.getElementById('delete-form-{{$user->id}}').submit();
                   }
                   ">Delete</a>
                                                

                                                     <form id="delete-form-{{$user->id}}" action="{{route('exercise-lib.destroy',$user->id)}}" method="post" style="display:none">
                             @csrf
                            @method('DELETE')
                            </form>    
                              <div class="dropdown-divider"></div>
                               <a href="{{route('exercise-lib.edit',$user->id)}}" class="dropdown-item">Edit</a>
                                            </div>
                                        </div>

                                        
                                    <div class="media border-top pt-3">
                                        
                                        <video width="130" height="110" controls style="">
  <source src="{{asset('storage/app/public/uploads/'.$user->video_name)}}" type="video/mp4">
  <source src="{{asset('storage/app/public/uploads/'.$user->video_name)}}" type="video/ogg">
  Your browser does not support the video tag.
</video>
                                        
                                        <div class="media-body">

                                            <h6 class="mt-1 mb-0 font-size-15" style="padding-top: 15px; margin: 7px;"><strong>{{$user->video_title}}</strong></h6>
                                           
                                           <i data-feather="map-pin" style="margin: 2px; height: 17px;"></i>
                                            <span style="align-content: center;" class="text-muted">{{$user->video_description}}</span>
                                        </div>
                                      
                                    </div>

                                    @endforeach
                                   
                                            </div>

                                            <!-- TAB 2 -->


                                            <div class="tab-pane" id="two">
                                       

                                            </div>


                                            <!-- TAB 3 -->


                                            <div class="tab-pane" id="three">

                             {{--   @foreach($partners as $partner)

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

                                            <h6 class="mt-1 mb-0 font-size-15" style="padding-top: 15px; margin: 7px;"><strong>{{$partner->name}}</strong></h6>
                                           
                                           <i data-feather="map-pin" style="margin: 2px; height: 17px;"></i>
                                            <span style="align-content: center;" class="text-muted">{{$partner->address}}</span>
                                        </div>
                                      
                                    </div>

                                    <hr>
                                    @endforeach --}}

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