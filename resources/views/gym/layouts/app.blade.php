<!DOCTYPE html>
<html>
<head>
    @include('admin.layouts.head')
</head>
 <body class="skin-black">

    @include('admin.layouts.header')
 <div class="wrapper row-offcanvas row-offcanvas-left">
     @include('admin.layouts.sidebar')
<aside class="right-side"> 
        @section('main-content')
          @show
</aside>
    @include('admin.layouts.footer')

</div>
</body>
</html>