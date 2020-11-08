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
                                            <h3>Transactions</h3>
                                        </div>

                                        <div class="card-body table-responsive table-stripped">
                                              @include('message.message')
                                            <table class="table">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Id</th>
                                                        <th>Order Id</th>
                                                        <th>Amount</th>
                                                    
                                                        <th>Currency</th>
                                                        <th>Description</th>
                                                        <th>Status</th>
                                                        <th>Charge Id</th>
                                                        <th>Order for</th>
                                                        <th>user name</th>
                                                        <th>email</th>
                                                        <th>phone</th>

                                                       <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($transactions as $transaction)
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{$transaction->id}}</td>
                                                        <td>{{$transaction->ordder_id}}</td>
                                                        <td>{{$transaction->amount}}</td>
                                                        <td>{{$transaction->currency}}</td>
                                                        <td>{{$transaction->description}}</td>
                                                        <td>{{$transaction->status}}</td>
                                                        <td>{{$transaction->charge_id}}</td>
                                                         <td>{{$transaction->order_for}}</td>
                                                         <td>{{$transaction->user_name}}</td>
                                                         <td>{{$transaction->email}}</td>

                                                         <td>{{$transaction->phone}}</td>

                                                        
                                                        <td><div class="dropdown">
  <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Action
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
  
    <li><a href="{{route('transactions.destroy',$transaction->id)}}" class="dropdown-item" onclick="
                   if(confirm('Are You Sure You Want To Delete?')){
                     event.preventDefault();
                   document.getElementById('delete-form-{{$transaction->id}}').submit();
                   }
                   ">Delete</a>


  
                            
                                                     <form id="delete-form-{{$transaction->id}}" action="{{route('transactions.destroy',$transaction->id)}}" method="post" style="display:none">
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