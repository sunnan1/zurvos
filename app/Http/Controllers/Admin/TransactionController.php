<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Transaction;
use App\Traits\Gymtrait;

class TransactionController extends Controller
{

	 public function __construct()
    {
        $this->middleware('auth:admin');
    }
       use Gymtrait;
    public function index()
    {
         $gyms=Gymtrait::latestgymes();  
    	$transactions=Transaction::all();
    	return view('admin.transactions.index',compact('transactions','gyms'));
    }
     public function destroy($id)
     {

        Transaction::find($id)->delete();
        return back()->with('success','Transaction Record Deleted Successfully');
     }
}
