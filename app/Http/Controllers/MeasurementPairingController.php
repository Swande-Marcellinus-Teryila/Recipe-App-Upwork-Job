<?php

namespace App\Http\Controllers;

use App\Models\Measurement;
use App\Models\MeasurementPairing;
use Illuminate\Http\Request;

class MeasurementPairingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $measurement_pairing = MeasurementPairing::with("big_unit","small_unit")->get();
        $measuurements = Measurement::all();

        return view("admin.measurement-pairing",
        ['measurement_pairing'=>$measurement_pairing,
    "measurements"=>$measuurements]);
    }

   
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
        $measurement_pairing = new MeasurementPairing();
        $measurement_pairing->big_unit_id = $request->big_unit_id;
        $measurement_pairing->small_unit_id = $request->small_unit_id;
        $measurement_pairing->per_unit = $request->per_unit;
        $measurement_pairing->save();
        return redirect()->back()->with("message",'Record added successfully');
    
    }

   
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
        //
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
        $measurement_pairing = MeasurementPairing::find($id);
        $measurement_pairing->big_unit_id = $request->big_unit_id;
        $measurement_pairing->small_unit_id = $request->small_unit_id;
        $measurement_pairing->per_unit = $request->per_unit;
        $measurement_pairing->save();
        return redirect()->back()->with("message",'Record updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $measurement_pairing = MeasurementPairing::find($id);
        $measurement_pairing->delete();
        return redirect()->back()->with("message",'Record deleted successfully');
    }
    
}
