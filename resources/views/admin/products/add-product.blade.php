@extends('admin.layouts.app')

   @section('main-content')
 <div class="content-page" style="margin-top: 76px;">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    <!-- tasks panel -->
                    <div class="row">
                        <div class="col-xl-1">
    
</div>
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            

 <div class="signup-form" style="align-self: center;">
                    <form action="{{Route('add-product')}}" method="post" enctype="multipart/form-data">
                       <h2 style="font-size: 22px; text-align: center;"><strong>Add New Product</strong></h2>
                    @include('errors.errors')
                        @include('message.message')
                   @csrf
                        <div class="form-group">
                          <label style="color: black"> Product Name</label>
                            <input type="text" class="form-control" name="product_name" >
                        </div>
                        <div class="form-group">
                          <label style="color: black"> Product Description</label>
                            <input type="text" class="form-control" name="product_description" >
                        </div>
                        <div class="form-group">
                          <label style="color: black"> Product Price</label>
                            <input type="text" class="form-control" name="product_price" >
                        </div>
                        <div class="form-group">
                         <label style="color: black"> Product Category</label>
                            <select data-plugin="customselect" name="product_type" class="form-control">
                                                        <option value="supplements">Supplements</option>
                                                        <option value="fitness">Fitness</option>
                                                        <option value="zurvosstore">Zurvos Store</option>
                                                    </select>
                        </div>
                    
                      

                        <div class="form-group">
                            <input type="file" name="product_image" style="font-size: 14px"  class="btn btn-primary btn-block btn-lg">
                        </div>
                        <div class="form-group">
                            <button style="font-size: 14px" type="submit" class="btn btn-primary btn-block btn-lg">ADD PRODUCT</button>
                        </div>
                    </form>
 
</div>

                                            <!-- end row -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<div class="col-xl-1">
    
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