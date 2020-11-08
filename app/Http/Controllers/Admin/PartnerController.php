<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Gymtrait;
use App\Partner;
use App\Http\Requests\PartnerRequest;
class PartnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    use Gymtrait;
    public function addPartner(){

             $gyms=Gymtrait::latestgymes();
             $partners=Partner::all();                                    
          	 return view('admin.partners.add-partner',compact('gyms','partners'));

     	
     }

     public function storePartner(PartnerRequest $request)
     {
        
     	$partner=new Partner();
     	$partner->name=$request->name;
     	$partner->email=$request->email;
     	$partner->password=bcrypt($request->password);
     	$partner->address=$request->address;
     	$partner->save();
     	return back()->with('success','Partner Added Successfully');
     }
     public function edit($id)
     {

        $oldpartner=Partner::find($id);
        $gyms=Gymtrait::latestgymes();
        $partners=Partner::all();                                    
        return view('admin.partners.edit-partner',compact('gyms','partners','oldpartner'));
      
     }
     public function update(Request $request,$id)
     {
          $request->validate([
             'name' => 'required',
            'email' => 'required',
        ]);
        $partner=Partner::find($id);
        $partner->name=$request->name;
        $partner->email=$request->email;
        $partner->password=bcrypt($request->password);
        $partner->address=$request->address;
        $partner->save();
        return back()->with('success','Partner updated Successfully');

     }
     public function destroy($id)
     {
        Partner::find($id)->delete();
        return back()->with('success','Partner removed Successfully');

     }
}
