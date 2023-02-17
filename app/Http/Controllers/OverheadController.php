<?php

namespace App\Http\Controllers;

use App\Models\Overhead;
use Illuminate\Http\Request;

class OverheadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Overhead  $overhead
     * @return \Illuminate\Http\Response
     */
    public function show(Overhead $overhead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Overhead  $overhead
     * @return \Illuminate\Http\Response
     */
    public function edit(Overhead $overhead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Overhead  $overhead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$overhead_id)
    {
        $overhead = Overhead::find($overhead_id);
        $overhead->overhead = $request->overhead;
        $overhead->save();
        return redirect()->back()->with('message','Overhead updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Overhead  $overhead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Overhead $overhead)
    {
        //
    }
}
