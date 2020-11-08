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
                                            <h3>All Gyms</h3>
                                        </div>

                                        <div class="card-body table-responsive table-stripped">
                                              @include('message.message')
                                            <table class="table">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Id</th>
                                                        <th>UserName</th>
                                                        <th>Email</th>
                                                        <th>City</th>
                                                        <th>Zip Code</th>
                                                        <th>Street Address</th>
                                                        <th>Contact No.</th>
                                                        <th>Gym Details</th>
                                                        <th>Cost Per Day</th>
                                                        <th>Created At</th>
                                                        <th>Updated At</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($allgyms as $allgym)
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{$allgym->id}}</td>
                                                        <td>{{$allgym->full_name}}</td>
                                                        <td>{{$allgym->email}}</td>
                                                        <td>{{$allgym->full_name1}}</td>
                                                        <td>{{$allgym->zipcode}}</td>
                                                        <td>{{$allgym->street_address}}</td>
                                                        <td>{{$allgym->phoneno}}</td>
                                                        <td>{{$allgym->gym_detail}}</td>
                                                        <td>{{$allgym->cost_per_day}}</td>
                                                        <td>{{$allgym->created_at->diffforhumans()}}</td>
                                                        <td>{{$allgym->updated_at->diffforhumans()}}</td>
                                                        <td><div class="dropdown">
  <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Action
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="{{route('gyms.edit',$allgym->id)}}" class="dropdown-item">Edit</a></li>
    <li><a href="{{route('gyms.destroy',$allgym->id)}}" class="dropdown-item" onclick="
                   if(confirm('Are You Sure You Want To Delete?')){
                     event.preventDefault();
                   document.getElementById('delete-form-{{$allgym->id}}').submit();
                   }
                   ">Delete</a>


  
                            
                                                     <form id="delete-form-{{$allgym->id}}" action="{{route('gyms.destroy',$allgym->id)}}" method="post" style="display:none">
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