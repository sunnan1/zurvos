
<!DOCTYPE html>
<html>

@include('admin.layouts.header')

<body style="background-image: url('{{asset('public/assets/images/login.jpg')}}'); background-size: 100% 100%;">
    <!-- Login Form content start -->

    <!-- For responsiveness adding empty column -->
        <div class="row">
        <div class=" col-xs-2 col-sm-2 col-md-2 col-lg-2">

        </div>
    <!-- end -->
            @section('content')
            @show
        </div>
</div>
    <!-- Login Form content end -->
</body>
</html>
