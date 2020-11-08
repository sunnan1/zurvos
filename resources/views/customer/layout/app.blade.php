<!DOCTYPE html>
<html lang="en">
<head>
	<title>Zurvos</title>

	   @include('customer.layout.header')
		
</head>
<body >

    <div id="wrapper">

    	@include('customer.layout.topbar')

    	@include('customer.layout.navbar')


			@section('main-content')
		        
			@show

	    @include('customer.layout.footer')
    </div>
</body>
</html>