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
                                            <h3>All Products</h3>
                                        </div>

                                        <div class="card-body table-responsive table-stripped">
                                              @include('message.message')
                                            <table class="table">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Id</th>
                                                        <th>Product Name</th>
                                                        <th>Product Description</th>
                                                        <th>Product Type</th>
                                                        <th>Product Price</th>

                                                        <th>Image</th>
                                                    
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($products as $product)
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{$product->id}}</td>
                                                        <td>{{$product->product_name}}</td>
                                                        <td>{{$product->product_description}}</td>
                                                        <td>{{$product->product_type}}</td>
                                                        <td>{{$product->product_price}}</td>
                                                        <td>
                                                            <img src="{{asset('public/productImages/'.$product->product_image)}}" style="width: 50px;height: 50px;border-radius: 50px;">
                                                        </td>
                                            
                                                        <td><div class="dropdown">
  <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Action
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="{{route('product.edit',$product->id)}}" class="dropdown-item">Edit</a></li>
      
    <li><a href="{{route('product.destroy',$product->id)}}" class="dropdown-item" onclick="
                   if(confirm('Are You Sure You Want To Delete?')){
                     event.preventDefault();
                   document.getElementById('delete-form-{{$product->id}}').submit();
                   }
                   ">Delete</a>


  
                            
                                                     <form id="delete-form-{{$product->id}}" action="{{route('product.destroy',$product->id)}}" method="post" style="display:none">
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