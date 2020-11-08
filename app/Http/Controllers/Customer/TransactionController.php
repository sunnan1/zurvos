<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Transaction;
class TransactionController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:customer');
    }
    public function index()
    {
    	$user=auth()->user();
    	$transactions=Transaction::where('email',$user->email)->get();
    	return view('customer.transaction.index',compact('transactions'));
    }
}
