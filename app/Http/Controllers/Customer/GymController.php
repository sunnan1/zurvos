<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Gym;
class GymController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:customer');
    }
    public function index()
    {
    	$gyms=Gym::paginate(10);
    	return view('customer.gym.index',compact('gyms'));
    }
}
