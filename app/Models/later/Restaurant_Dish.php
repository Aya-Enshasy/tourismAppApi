<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant_Dish extends Model
{
    use HasFactory;

    protected $fillable = ['id','name','restaurant_name','details','calories','preparation_time','price','ingredients','has_offer'];

    protected $casts = [

    ];


}
