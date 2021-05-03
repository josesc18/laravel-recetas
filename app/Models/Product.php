<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'serie',
        'sku',
        'memory' ,
        's/o',
        'disk',
        'technology',
        'observation',
        'area_id',
        'model_id',
        'property_id',
        'brand_id',
        'location_id',
    ];
}
