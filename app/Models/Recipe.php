<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'recipe_name'
    ];

    public function recipe_ingredients(){
        return $this->hasMany(RecipeIngrident::class);
    }

    public function getIngredient($id){
        $ingredient = Ingredient::where("id","=",$id)->first(['ingredient','cost']);
        return $ingredient;
    }
}
