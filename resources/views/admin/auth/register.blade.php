@extends('layouts.app')
@section('content')
    <div class="card col-xs-6 col-sm-6 col-md-5 col-lg-4" style="margin-top: 100px;  border-radius: 2px; background-color:  #F2F7FC">
        <div class="card-body">
            <h4 class="card-title text-center" style="margin-top: 10px; margin-bottom: 50px;color: black"><b>Sign Up</b></h4>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group" style="margin-left: 20px;margin-right: 10px">
                    <label for="exampleInputEmail1" style="color: black">Username</label>

                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <br>
                <div class="form-group" style="margin-left: 20px;margin-right: 10px">
                    <label for="exampleInputEmail1" style="color: black">Email</label>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <br>
                <div class="form-group" style="margin-left: 20px;margin-right: 10px">
                    <label for="exampleInputEmail1" style="color: black">Password</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <br>
                <div class="form-group" style="margin-left: 20px;margin-right: 10px">
                    <label for="exampleInputEmail1" style="color: black">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                <br>
                <div class="form-group" style="margin-left: 20px;margin-right: 10px">
                    <label for="exampleInputEmail1" style="color: black">Gender</label>
                    <input type="radio" value="Male" name="gender"> Male
                    <input type="radio" value="Female" name="gender"> Female
                    <input type="radio" value="Other" name="gender"> Other
                </div>
                <br>
                <div class="form-group" style="margin-left: 20px;margin-right: 10px">
                    <label for="exampleInputEmail1" style="color: black">Zip Code</label>
                    <input type="text" value="" class="form-control" name="zipcode">
                </div>
                <br>
                <div class="form-group" style="margin-left: 20px;margin-right: 10px">
                    <label for="exampleInputEmail1" style="color: black">T-Shit Size</label>
                    <input type="text" value="" class="form-control" name="t_shirtsize">
                </div>
                <br>
                <div class="form-group" style="margin-left: 20px;margin-right: 10px">
                    <label for="exampleInputEmail1" style="color: black">Phone Number</label>
                    <input type="text" value="" class="form-control" name="phone_number">
                </div>
                <br>
                <button type="submit" class="btn btn-primary" style="margin-left: 20px; margin-top: 20px; width:92%; margin-bottom: 20px;background-color: #246DDC !important;border-radius: 1px;color: white;font-size: 15px;font-weight: bold">REGISTER</button>
            </form>
        </div>
    </div>
@endsection
