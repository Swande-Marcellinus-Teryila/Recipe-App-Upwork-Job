<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeIngrident extends Model
{
    use HasFactory;
    protected $fillable =[
        'ingredient_id',
        'recipe_id'
    ];
    public function ingredient(){
        return $this->belongsTo(Ingredient::class);
    }
    
    public function recipe(){
        return $this->belongsTo(Recipe::class);
    }

  
}
