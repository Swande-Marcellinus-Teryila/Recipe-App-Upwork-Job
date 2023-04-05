<?php

namespace App\Http\Controllers;

use App\Models\Measurement;
use Illuminate\Http\Request;

class MeasurementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $measurements = Measurement::simplePaginate();
    return view("admin.measurements",['measurements'=>$measurements]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $measurement = new Measurement();
        $measurement->measurement= $request->measurement;
     
        $measurement->save();
        return redirect()->back()->with("message","Measurement unit created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function show(Measurement $measurement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function edit(Measurement $measurement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$measurement_id)
    {
        $measurement = Measurement::find($measurement_id);
        $measurement->measurement = $request->measurement;
    
        $measurement->save();
        return redirect()->back()->with("message","Measurement updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function destroy($measurement_id){
   
        $measurement = Measurement::find($measurement_id);
        $measurement->delete();
        return redirect()->back()->with("message","Measurement deleted successfully");
    }

}
