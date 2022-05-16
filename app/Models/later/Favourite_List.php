<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite_List extends Model
{
    use HasFactory;

    protected $fillable = ['id','restaurant_dish_id','user_id'];
    protected $hidden = ['user_id'];
    protected $casts = [

    ];

}
