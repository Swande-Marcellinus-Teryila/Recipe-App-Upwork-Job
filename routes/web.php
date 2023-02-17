<?php

use App\Http\Controllers\IngredientController;
use App\Http\Controllers\OverheadController;
use App\Http\Controllers\ProfitMarginController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RecipeIngridentController;
use App\Models\Ingredient;
use App\Models\Overhead;
use App\Models\Recipe;
use Illuminate\Support\Facades\Route;



Route::get('home', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('admin.index',[
        "ingredients"=>Ingredient::all(),
        "overhead" =>Overhead::all(),
        "recipes" =>Recipe::all()
]);
});

Route::get('ingredients/',[IngredientController::class,'index']);

Route::post('ingredients/',[IngredientController::class,'store']);
Route::patch('ingredients/{id}',[IngredientController::class,'update']);
Route::delete('ingredients/{id}',[IngredientController::class,'destroy']);

Route::get('recipes/',[RecipeController::class,'index']);
Route::post('recipes/',[RecipeController::class,'store']);
Route::patch('recipes/{id}',[RecipeController::class,'update']);
Route::delete('recipes/{id}',[RecipeController::class,'destroy']);

Route::get('recipe-ingredient/{recipe_id}',[RecipeIngridentController::class,'show']);
Route::post('recipe-ingredient/{recipe_id}',[RecipeIngridentController::class,'store']);
Route::get('recipe-ingredient/delete/{id}',[RecipeIngridentController::class,'destroy']);

Route::patch('profit-margin/{profit_margin_id}',[ProfitMarginController::class,'update']);

Route::patch('overhead/{overhead_id}',[OverheadController::class,'update']);

