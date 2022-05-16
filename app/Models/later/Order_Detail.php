<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    use HasFactory;

    protected $fillable = ['id','restaurant_dish_id', 'quantity', 'order_id', 'extra_additions'];
    protected $hidden = ['user_id'];
    protected $casts = [

    ];

}
