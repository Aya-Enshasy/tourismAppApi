<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant_Category extends Model
{
    use HasFactory;

    protected $fillable = ['id','name','icon','restaurant_id'];

    protected $casts = [

    ];

}
