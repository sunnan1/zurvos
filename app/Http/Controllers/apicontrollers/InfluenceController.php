<?php

namespace App\Http\Controllers\apicontrollers;

use App\Http\Requests\InfluenceRequest as request;
use App\Http\Controllers\Controller;
use App\Influence;
use App\Http\Resources\SingleInfluenceResource;
use App\Http\Resources\InfluenceCollection;

class InfluenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $influence=Influence::all();
        if (!empty($influence)) {


            return  InfluenceCollection::collection($influence);

        }else{
            
           return response(['message' => 'Influence Not Found','status' =>'error']);
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
        $influence=new Influence();
        $influence->name=$request->name;
        $influence->email=$request->email;
        $influence->password=bcrypt($request->password);
        $result=$influence->save();
        if ($result) {
            
            return response([

                'message'=>'Influence Add successfully',
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
        $influence=Influence::find($id);
        if ($influence) {

            return  new SingleInfluenceResource($influence);

         }else{
             
            return response(['message' => 'Influence Not Found','status' =>'error']);
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
        $influence=Influence::find($id);
        $influence->name=$request->name;
        $influence->email=$request->email;
        $influence->password=bcrypt($request->password);
        $result=$influence->save();
        if ($result) {
            
            return response([

                'message'=>'Influence Update successfully',
                'status' =>'success'
            ]);
        }else{

            return response([

                'message'=>'Influence Not Found..',
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
        $influence=Influence::find($id);
        if ($influence) {
            $influence->delete();
            return response([

                'message'=>'Influence Delete successfully',
                'status' =>'success'
            ]);
        }else{

            return response([

                'message'=>'Influence Not Not..',
                'status' =>'error'
            ]);
        }
    }
}
