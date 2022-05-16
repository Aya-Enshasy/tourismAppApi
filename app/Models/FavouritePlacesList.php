<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavouritePlacesList extends Model
{
    use HasFactory;

    protected $fillable = ['id','place_id','place_type','user_id'];
//    protected $hidden = ['user_id'];
    protected $casts = [

    ];


    // FavouritePlacesList belongs to one user
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
