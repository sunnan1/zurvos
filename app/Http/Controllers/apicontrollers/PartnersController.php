<?php

namespace App\Http\Controllers\apicontrollers;

use App\Http\Requests\PartnerRequest as request;
use App\Http\Controllers\Controller;
use App\Partner;
use App\Http\Resources\SinglePartnerResource;
use App\Http\Resources\PartnersCollection;

class PartnersController extends Controller
{
        public function index()
    {
        $partner=Partner::all();
        if (!empty($partner)) {


            return  PartnersCollection::collection($partner);

        }else{
            
           return response(['message' => 'Partner Not Found','status' =>'error']);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $partner=new Partner();
        $partner->name=$request->name;
        $partner->email=$request->email;
        $partner->password=bcrypt($request->password);
        $result=$partner->save();
        if ($result) {
            
            return response([

                'message'=>'Partner Add successfully',
                'status' =>'success'
            ]);
        }else{

            return response([

                'message'=>'Record Not Created..',
                'status' =>'error'
            ]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partner=Partner::find($id);
        if ($partner) {

            return  new SinglePartnerResource($partner);

         }else{
             
            return response(['message' => 'Partner Not Found','status' =>'error']);
         }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $partner=Partner::find($id);
        $partner->name=$request->name;
        $partner->email=$request->email;
        $partner->password=bcrypt($request->password);
        $result=$partner->save();
        if ($result) {
            
            return response([

                'message'=>'Partner Update successfully',
                'status' =>'success'
            ]);
        }else{

            return response([

                'message'=>'Partner Not Found..',
                'status' =>'error'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner=Partner::find($id);
        if ($partner) {
            $partner->delete();
            return response([

                'message'=>'Partner Delete successfully',
                'status' =>'success'
            ]);
        }else{

            return response([

                'message'=>'Partner Not Not..',
                'status' =>'error'
            ]);
        }
    }
}
