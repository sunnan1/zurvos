<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Gymtrait;
use App\models\Customer;
use App\models\Partner;
use App\models\Gym;

class HomeController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }

    public function home()
    {
    	$gyms=Gymtrait::latestgymes();
    	$totalgyms=Gym::count();
    	$latestcustomers=Customer::OrderBy('id','desc')->
    	limit(2)->get();
    	$totalcustomer=Customer::count();
    	$totalpartner=Partner::count();
    	return view('admin.home',compact('gyms','totalgyms','latestcustomers','totalcustomer','totalpartner'));
    }
}
