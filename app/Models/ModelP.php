<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelP extends Model
{
    use HasFactory;

    protected $table = 'models';

    protected $fillable = [
        'Modeldescription',
    ];
}
