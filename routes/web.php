<?php

use App\Http\Controllers\IngredientController;
use App\Http\Controllers\MeasurementController;
use App\Http\Controllers\MeasurementPairingController;
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

Route::get('get-small-units/{big_unit_id}',[RecipeIngridentController::class,'get_small_units']);

Route::get('/measurements',[MeasurementController::class,'index']);
Route::patch('measurements/{measurement_id}',[MeasurementController::class,'update']);
Route::post('/measurements',[MeasurementController::class,'store']);
Route::delete('measurements/{measurement_id}',[MeasurementController::class,'destroy']);

Route::get('/measurement-pairing',[MeasurementPairingController::class,'index']);
Route::patch('/measurement-pairing/{measurement_id}',[MeasurementPairingController::class,'update']);
Route::post('/measurement-pairing',[MeasurementPairingController::class,'store']);
Route::delete('/measurement-pairing/{measurement_id}',[MeasurementPairingController::class,'destroy']);



Route::patch('profit-margin/{profit_margin_id}',[ProfitMarginController::class,'update']);

Route::patch('overhead/{overhead_id}',[OverheadController::class,'update']);

