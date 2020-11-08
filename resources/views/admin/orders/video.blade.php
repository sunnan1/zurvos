@extends('admin.layouts.app')

   @section('main-content')
   <style type="text/css">
       
   </style>
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
                                        <div class="card-title">
                                            <h3>Video Orders</h3>
                                        </div>

                                        <div class="card-body table-responsive table-stripped">
                                              @include('message.message')
                                            <table class="table">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Id</th>
                                                        <th>Customer Id</th>
                                                        <th>UserName</th>
                                                    
                                                        <th>Tutorial Id</th>
                                                        <th>Course Name</th>
                                                        <th>Status</th>
                                                        <th>Address</th>

                                                       <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($videoorders as $order)
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{$order->id}}</td>
                                                        <td>{{$order->user_id}}</td>
                                                        <td>{{$order->full_name}}</td>
                                                        <td>{{$order->tutorial_id}}</td>
                                                        <td>{{$order->course_name}}</td>
                                                        <td>{{$order->status}}</td>
                                                        <td>{{$order->address}}</td>
                                                        
                                                        <td><div class="dropdown">
  <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Action
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
  
    <li><a href="{{route('video-orders.destroy',$order->id)}}" class="dropdown-item" onclick="
                   if(confirm('Are You Sure You Want To Delete?')){
                     event.preventDefault();
                   document.getElementById('delete-form-{{$order->id}}').submit();
                   }
                   ">Delete</a>


  
                            
                                                     <form id="delete-form-{{$order->id}}" action="{{route('video-orders.destroy',$order->id)}}" method="post" style="display:none">
                             @csrf
                            @method('DELETE')
                            </form>    

    </li>
  </ul>
</div></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>


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