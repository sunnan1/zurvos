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
                                                        <th>Video</th>
    
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @forelse(json_decode($tutorial->course_videos) as $tutorial)
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>                                 <video width="130" height="110" controls style="">
  <source src="{{asset('public/TutorialVideo/'.$tutorial)}}" type="video/mp4">
  <source src="{{asset('public/TutorialVideo/'.$tutorial)}}" type="video/ogg">
  Your browser does not support the video tag.
</video></td>
                                                       
                                                    </tr>
                                                    @empty
                                                    No Video Found
                                                    @endforelse
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