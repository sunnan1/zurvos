@extends('admin.layouts.lock_head_foot')
@section('bodycontent')
        <div class="form-box" id="login-box">
            <div class="header">Partner Sign In</div>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/partner/login') }}">
                @csrf
                <div class="body bg-gray">
                    <div class="form-group">
                        <label>Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Sign me in</button>  
                    
                    <p><a class="btn btn-link" href="{{ url('/partner/password/reset') }}">I forgot my password</a></p>
            </form>
 @endsection