<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Measurement;
use App\Models\Overhead;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    
    public function index($recipe_id)
    {
        $ingredients  = Ingredient::with("measurement")->where("recipe_id",$recipe_id)->get();
        $overhead     = Overhead::all();
        $measurements = Measurement::all();
        return view('admin.add-recipe-ingredient',[
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
        $ingredients->user_id = 1;
        $ingredients->recipe_id =$request->recipe_id;
        $ingredients->ingredient = $request->ingredient;
        $ingredients->quantity = $request->quantity;
        $ingredients->measurement_id = $request->measurement_id;
        $ingredients->cost = $request->cost;
        $ingredients->package_size =$request->package_size;
        $ingredients->serving_cost = $request->serving_cost;
        $small_unit =explode(",",$request->small_unit_id);
        $ingredients->small_unit_id  = $small_unit[0];

        $ingredients->save();

        return redirect()->back()->with('message','Ingredient added successfully');

    } catch (\Throwable $th) {
        echo $th;
       
    }
}




    public function edit(Ingredient $ingredient)
    {
        //
    }
    public function update(Request $request,$id){ try {
        $ingredients = Ingredient::find($id);
       
        $ingredients->user_id = 1;
        $ingredients->recipe_id =$request->recipe_id;
        $ingredients->ingredient = $request->ingredient;
        $ingredients->quantity = $request->quantity;
        $ingredients->measurement_id = $request->measurement_id;
        $ingredients->cost = $request->cost;
        $ingredients->package_size =$request->package_size;
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