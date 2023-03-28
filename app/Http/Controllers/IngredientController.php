<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Measurement;
use App\Models\Overhead;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    
    public function index()
    {
        $ingredients  = Ingredient::with("measurement")->get();
        $overhead     = Overhead::all();
        $measurements = Measurement::all();
        return view('admin.ingredients',[
            "ingredients"  => $ingredients,
            "overhead"     => $overhead,
            "measurements" => $measurements
        ]);
    }

    public function create()
    {
        //s
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { try {
        $ingredients = new Ingredient();
       
        $ingredients->ingredient     = ucfirst($request->ingredient);
        $ingredients->cost           = $request->cost;
        $ingredients->measurement_id = $request->measurement_id;
        $ingredients->quantity       = $request->quantity;
        $ingredients->save();
        return redirect()->back()->with('message','Ingredient addded successfully');

    } catch (\Throwable $th) {
        return redirect()->back()->with('errmsg','Sorry, something went wrong');
    }
       
    }




    public function edit(Ingredient $ingredient)
    {
        //
    }
    public function update(Request $request,$id){ try {
        $ingredients = Ingredient::find($id);
       
        $ingredients->ingredient = ucfirst($request->ingredient);
        $ingredients->cost       = $request->cost;
        $ingredients->measurement_id = $request->measurement_id;
        $ingredients->quantity       = $request->quantity;
        $ingredients->save();
        return redirect()->back()->with('message','Ingredient updated successfully');

    } catch (\Throwable $th) {
        return redirect()->back()->with('errmsg','Sorry, something went wrong');
    }
       
    }
       

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $ingredient = Ingredient::find($id);
      $ingredient->delete();
      return redirect()->back()->with("message",'Record deleted successfully');
}
}