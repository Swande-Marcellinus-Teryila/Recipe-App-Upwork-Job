<?php

namespace App\Http\Controllers;

use App\Models\Overhead;
use App\Models\ProfitMargin;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profit_margin = ProfitMargin::all();
        $overhead = Overhead::all();
        $recipes = Recipe::with('recipe_ingredients')->paginate(10);
  
        return view('admin.recipes',[
            'overhead'=>$overhead,
            'recipes'=>$recipes,
            'profit_margin'=>$profit_margin
        ]);
    }

    
    public function store(Request $request)
    { try {
        $recipes = new Recipe();
       
        $recipes->recipe_name  = ucfirst($request->recipe);
        $recipes->save();
        return redirect()->back()->with('message','Recipe addded successfully');

    } catch (\Throwable $th) {
        return redirect()->back()->with('errmsg','Sorry, something went wrong');
    }

    
    }

  
  

    public function update(Request $request,$id){ try {
        $recipes = Recipe::find($id);
       
        $recipes->recipe_name  = ucfirst($request->recipe);

        $recipes->save();
        return redirect()->back()->with('message','Recipe updated successfully');

    } catch (\Throwable $th) {
        return redirect()->back()->with('errmsg','Sorry, something went wrong');
    }
       
    }
       
    public function destroy($id)
    {
      $recipe = Recipe::find($id);
      $recipe->delete();
      return redirect()->back()->with("message",'Record deleted successfully');
}
}
