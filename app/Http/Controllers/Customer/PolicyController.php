<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Policy;
class PolicyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer');
    }
    public function index()
    {
    	$policy=Policy::find(1);
    	return view('customer.policy.index',compact('policy'));
    }
}
