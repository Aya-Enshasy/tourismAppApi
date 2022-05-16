<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;


    protected $fillable = ['id','name','address','star','details','map'];
//    protected $appends = ['hotel_image'];
    protected $hidden = ['media'];
    protected $casts = [


    ];

    //------------------------ hotel media relationship ----------------------------

    // relation between media table and Hotel table (same for all tables)
    public function media(){
        return $this->morphOne(Media::class,'mediable');
    }

    public function getHotelImageAttribute(){
        return $this->media ? ($this->media->name? url('/storage/'.$this->media->name) : url('control_panel_styles\images\faces\face2.jpg')) : url('control_panel_styles\images\faces\face4.jpg');
    }


    //------------------------ hotel rooms relationship ----------------------------
    public function rooms(){
        return $this->hasMany(Hotel_Room::class,'hotel_id','id');
    }

    public function getRoomsCountAttribute()
    {
        return $this->rooms()->count();
    }
    public function getHotelRoomsAttribute(){
        return $this->rooms ? $this->rooms : 'rooms not found';
    }


    //------------------------ hotel advatages relationship ----------------------------
    public function advantages(){
        return $this->hasMany(Hotel_Advantage::class,'hotel_id','id');
    }

    public function getAdvantagesCountAttribute()
    {
        return $this->advantages()->count();
    }

    public function getHotelAdvantagesAttribute(){
        return $this->advantages ? $this->advantages : 'advantages not found';
    }

}
