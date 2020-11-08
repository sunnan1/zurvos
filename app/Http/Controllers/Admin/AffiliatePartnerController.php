<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Gymtrait;
use App\Partner;
class AffiliatePartnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    use Gymtrait;
    public function viewAllOrders()
    {
    	$departner =Partner::orderBy('id', 'desc')->get();
    	$acpartner=Partner::all();
        $gyms=Gymtrait::latestgymes();                                    
        return view('admin.affiliate-partners.affiliate-partners',compact('gyms','departner','acpartner'));

     	
     }
}
