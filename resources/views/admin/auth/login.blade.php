
<!DOCTYPE html>
<html>

@include('admin.layouts.header')

<body style="background-image: url('{{asset('public/assets/images/login.jpg')}}'); background-size: 100% 100%;">
    <!-- Login Form content start -->

    <!-- For responsiveness adding empty column -->
        <div class="row">
        <div class=" col-xs-2 col-sm-2 col-md-1 col-lg-1">

        </div>
    <!-- end -->

        <div class="card col-xs-6 col-sm-6 col-md-5 col-lg-4" style="width: 20rem; margin-top: 100px;  border-radius: 20px; background-color:  #F2F7FC;">
            <div class="card-body">
                <h4 class="card-title text-center" style="margin-top: 10px; margin-bottom: 50px;color: black"><b>Login</b></h4>
                     <form method="POST" action="{{ url('/admin/login') }}">
                        @csrf
                        <div class="form-group" style="margin-left: 20px;">
                            <label for="exampleInputEmail1" style="color: black">Email Address</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter email" style="border-radius: 1px">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                         <br>
                         <div class="form-group" style="margin-left: 20px;">
                            <label for="exampleInputPassword1" style="color: black">Password</label>
                            <small style="float: right"><a href="{{ route('password.request') }}"><b>Reset Password </b></a></small>
                           <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="border-radius: 1px">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-check" style="margin-left: 20px;">
                       <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <small class="form-check-label" for="remember">
                                        {{ __('Remember Login info') }}
                                    </small>
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-left: 20px; margin-top: 20px; width:92%; margin-bottom: 20px;background-color: #246DDC !important;border-radius: 1px;color: white;font-size: 15px;font-weight: bold">LOGIN</button>
                         <label style="margin-left: 20px; margin-top: 10px; width:92%; margin-bottom: 0px;font-weight: bold;text-align: center">Or continue with</label>
                         <hr style="width: 50%">
                         <a href="{!! url('login/facebook') !!}" class="btn btn-primary" style="margin-left: 47%; margin-top: 5px; margin-bottom: 30px;background-color: #3B5999 !important;border-radius: 5px;color: white;font-size: 17px;font-weight:bolder">f</a>
                         <label style="margin-left: 20px; margin-top: 10px; width:92%; margin-bottom: 0px;font-weight: bold;text-align: center">I don't have an account <a href="{!! url('/register') !!}" style="color: #236DE0"><b>Sign up Now! </b></a></label>
                    </form>
            </div>
        </div>
</div>
    <!-- Login Form content end -->
</body>
</html>
