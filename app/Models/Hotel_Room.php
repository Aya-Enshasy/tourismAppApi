<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel_Room extends Model
{
    use HasFactory;

    protected $table = 'hotel_rooms';
    protected $fillable = ['id','name','capacity','hotel_id','details','price_per_night','available_rooms','has_offer'];
    protected $appends = ['room_hotel_name'];
    protected $hidden = ['hotel','created_at','updated_at'];
    protected $casts = [

    ];

    public function media(){
        return $this->hasMany(Media::class ,'mediable_id');
    }

    public function orderItem(){
        return $this->hasMany(OrderItem::class ,'room_id');
    }

    public function roomReservation(){
        return $this->hasMany(Room_Reservation::class,'hotel_room_id');
    }

//    public function getRoomImagesAttribute(){
//        return $this->media->count() ? ($this->media->name? url('/storage/'.$this->media->name) : url('control_panel_styles\images\faces\face2.jpg')) : url('control_panel_styles\images\faces\face4.jpg');
//    }

    public function getRoomImagesAttribute(){
        $media = [] ;
        if( $this->media->count()){
            foreach($this->media as $roomMedia){ array_push($media,url('/storage/'. $roomMedia->name)); }
        }else{
            array_push( $media,url('control_panel_styles\images\faces\face2.jpg')); }
    return $media;
    }

    public function hotel(){
        return $this->belongsTo(Hotel::class, 'hotel_id','id')->withDefault(['name' => 'no related hotel']);
    }

    public function getRoomHotelNameAttribute(){
        return $this->hotel ? $this->hotel->name : 'hotel not found';
    }

}
