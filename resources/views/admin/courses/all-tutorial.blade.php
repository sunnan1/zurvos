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
                                            <h3>Tutorials</h3>
                                        </div>

                                        <div class="card-body table-responsive table-stripped">
                                              @include('message.message')
                                            <table class="table">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Id</th>
                                                        <th>Course Name</th>
                                                        <th>Price</th>
                                                        <th>Category</th>
                                                        <th>Type</th>
                                                    
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($tutorials as $tutorial)
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{$tutorial->id}}</td>
                                                        <td>{{$tutorial->course_name}}</td>
                                                        <td>{{$tutorial->course_price}}</td>
                                                        <td>{{$tutorial->category}}</td>
                                                        <td>@if($tutorial->type==1)
                                                            paid
                                                            @else
                                                            unpaid
                                                            @endif
                                                        </td>
                                            
                                                        <td><div class="dropdown">
  <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Action
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="{{route('upload-tutorial.edit',$tutorial->id)}}" class="dropdown-item">Edit</a></li>
       <li><a href="{{route('upload-tutorial.show',$tutorial->id)}}" class="dropdown-item">View Videos</a></li>
    <li><a href="{{route('upload-tutorial.destroy',$tutorial->id)}}" class="dropdown-item" onclick="
                   if(confirm('Are You Sure You Want To Delete?')){
                     event.preventDefault();
                   document.getElementById('delete-form-{{$tutorial->id}}').submit();
                   }
                   ">Delete</a>


  
                            
                                                     <form id="delete-form-{{$tutorial->id}}" action="{{route('upload-tutorial.destroy',$tutorial->id)}}" method="post" style="display:none">
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