<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['id','user_id', 'status', 'is_paid', 'total_price'];
    protected $hidden = ['user_id'];
    protected $casts = [

    ];

}
