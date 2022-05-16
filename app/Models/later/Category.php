<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['id','name','is_cartable'];


    protected $casts = [

    ];

     public function media(){
        return $this->morphOne(Media::class,'mediable');
    }

}
