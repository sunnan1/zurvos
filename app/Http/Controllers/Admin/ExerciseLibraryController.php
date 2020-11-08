<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Gymtrait;
use App\models\ExerciseLib;
use App\models\Customer;
use App\Http\Requests\ExerciseLibRequest;

class ExerciseLibraryController extends Controller
{
    use Gymtrait;
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gyms=Gymtrait::latestgymes();
        $exerciselibs=ExerciseLib::all();
        return view('admin.library.index',compact('gyms','exerciselibs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gyms=Gymtrait::latestgymes();
        $influences=Customer::all();
        return view('admin.library.create',compact('gyms','influences'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExerciseLibRequest $request)
    {
        $request->validate([
            'video'=>'required',
            ]);
            if($request->file('video'))
            {
            $fileName = time().'-'.$request->video->getClientOriginalName();
            $filePath = $request->file('video')->storeAs('uploads', $fileName, 'public');
            $request['video_name']=$fileName;
            
            }
            $request['customer_id']=$request->customer;
            ExerciseLib::create($request->all());
             return redirect()->route('exercise-lib.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gyms=Gymtrait::latestgymes();
        $influences=Customer::all();
        $exerciselib=ExerciseLib::find($id);
        return view('admin.library.edit',compact('exerciselib','influences','gyms'));
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

        $exerciselib=ExerciseLib::find($id);
        if($request->file('video'))
            {
            $fileName = time().'-'.$request->video->getClientOriginalName();
            $filePath = $request->file('video')->storeAs('uploads', $fileName, 'public');
            $request['video_name']=$fileName;
            
            }
            $request['customer_id']=$request->customer;
            $exerciselib->update($request->all());
        return redirect()->route('exercise-lib.index')->with(['success'=>'Record updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ExerciseLib::find($id)->delete();
        return back()->with(['success'=>'Exercise library Removed Successfully']);
    }
}
