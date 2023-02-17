<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;
    protected $fillable =[
        'ingredient',
        'cost'
    ];
    public function recipe_ingredient(){
        return $this->belongsTo(RecipeIngrident::class);
    }
    public function getAlreadySelectedIngredient($ingredient_id,$recipe_id){
        $result =RecipeIngrident::where("ingredient_id",$ingredient_id)
        ->where('recipe_id',$recipe_id)
        ->get();
        return $result;
}
    
}
