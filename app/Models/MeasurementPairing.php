<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeasurementPairing extends Model
{
    use HasFactory;
    protected $fillable = [
        'big_unit_id',
        'small_unit_id',
        'per_unit'
    ];

    function big_unit(){
        return $this->belongsTo(Measurement::class,"big_unit_id","id","measurements");
    }

    function small_unit(){
        return $this->belongsTo(Measurement::class,"small_unit_id","id","measurements");
    }
    
    
}
