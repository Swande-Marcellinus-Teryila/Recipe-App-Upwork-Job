<?php

namespace App\Http\Controllers;

use App\Models\ProfitMargin;
use Illuminate\Http\Request;

class ProfitMarginController extends Controller
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
     * @param  \App\Models\ProfitMargin  $profitMargin
     * @return \Illuminate\Http\Response
     */
    public function show(ProfitMargin $profitMargin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfitMargin  $profitMargin
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfitMargin $profitMargin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfitMargin  $profitMargin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$profit_margin_id)
    {
        $profit_margin = ProfitMargin::find($profit_margin_id);
        $profit_margin->profit_margin = $request->profit_margin;
        $profit_margin->save();
        return redirect()->back()->with('message','profit margin updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfitMargin  $profitMargin
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfitMargin $profitMargin)
    {
        //
    }
}
