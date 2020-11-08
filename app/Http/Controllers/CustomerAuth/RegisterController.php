<?php

namespace App\Http\Controllers\CustomerAuth;

use App\Customer;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/customer/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('customer.guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:customers',
            'password' => 'required|min:6|confirmed',
            'phone_no' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'street_address' => 'required',
            'shirt_size' => 'required',
            'bio' => 'required',
            'image' => 'required',
                       
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Customer
     */
    protected function create(array $data)
    {
        $filename='';
         if(\Request::hasFile('user_image')){
                  $extension=\Request::file('image')->extension();
                  $filename=time()."_.".$extension;
                  \Request::file('image')->move(public_path('userimage'),$filename);
                }
        return Customer::create([
            'full_name' => $data['name'],
            'email' => $data['email'],
            'bio' => $data['bio'],
            'city' => $data['city'],
            'phone_no' => $data['phone_no'],
            'street_address' => $data['street_address'],
            'zip_code' => $data['zip_code'],
            'shirt_size' => $data['shirt_size'],
            'user_image' =>  $filename ?  $filename:'',
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('customer.auth.register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('customer');
    }
}
