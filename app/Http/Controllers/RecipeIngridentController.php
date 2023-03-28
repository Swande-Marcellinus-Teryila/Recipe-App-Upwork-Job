<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Measurement;
use App\Models\MeasurementPairing;
use App\Models\RecipeIngrident;
use Illuminate\Http\Request;

class RecipeIngridentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipe_ingredents = RecipeIngrident::with('ingredient', 'recipe')->get();
        return view('admin.add-recipe-ingredient');
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
    public function store(Request $request, $recipe_id)
    {
        $recipe_ingredent = new RecipeIngrident();
      
        $qty_index =0;
        if (is_array($request->ingredient)) {
            foreach ($request->ingredient as $ingr) {
                if (!RecipeIngrident::where("ingredient_id", $ingr)
                    ->where("recipe_id", $recipe_id)->exists()) {
                    RecipeIngrident::create([
                        'ingredient_id' => $ingr,
                        'quantity'=>$request->quantity[$qty_index],
                        'recipe_id' => $recipe_id
                    ]);
                }
                $qty_index++;
            }
        }
            return redirect()->back();
        
    }


    public function show($recipe_id)
    {   $measurements = Measurement::all();
        $ingredents = Ingredient::all();
        $already_selected_recipe_ingredients = RecipeIngrident::with('ingredient')
        ->where('recipe_id',$recipe_id)
        ->get();


        // return response()->json($already_selected_recipe_ingredients);
        return view(
            'admin.add-recipe-ingredient',
            [   'recipe_id' =>$recipe_id,
                'ingredients' => $ingredents,
                'measurements'=>$measurements,
                'already_selected_recipe_ingredients'=>$already_selected_recipe_ingredients
            ]
        );
    }

    
    public function edit(RecipeIngrident $recipeIngrident)
    {
        //
    }
    function get_small_units($big_unit_id){
        $small_recepe_units  =MeasurementPairing::with("small_unit")
        ->Where("big_unit_id",$big_unit_id)->get();
        #return response()->json($small_recepe_units);
         return view("admin.components.get-ingredients",["small_recepe_units"=>$small_recepe_units]);    
    

    }


    public function update(Request $request, RecipeIngrident $recipeIngrident)
    {
        //
    }


    public function destroy($id)
    {
        $ingr = RecipeIngrident::find($id);
        $ingr->delete();
        return redirect()->back()->with("message","Unchecked");
    }
}
