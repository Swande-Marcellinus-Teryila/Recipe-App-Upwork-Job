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

    public function measurement(){
        return $this->belongsTo(measurement::class);
    }
    

    function big_unit(){
        return $this->belongsTo(Measurement::class,"big_unit_id","id","measurements");
    }

    function small_unit(){
        return $this->belongsTo(Measurement::class,"small_unit_id","id","measurements");
    }
    
    public function getAlreadySelectedIngredient($ingredient_id,$recipe_id){
        $result =RecipeIngrident::where("ingredient_id",$ingredient_id)
        ->where('recipe_id',$recipe_id)
        ->get();
        return $result;
}
    
}
