<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_Reservation extends Model
{
    use HasFactory;

    protected $table = 'room_reservations';

    protected $fillable = ['id','hotel_room_id','check_in_date','check_out_date','nights','rooms_count','total_price','user_id'];
    protected $hidden = ['hotel_room','created_at','updated_at'];
    protected $appends = ['room_name','room_hotel_name'];
    protected $casts = [

    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function hotel_room(){
        return $this->belongsTo(Hotel_Room::class,'hotel_room_id');
    }

    public function getAvailableRoomsAttribute(){
        return $this->hotel_room ? $this->hotel_room->available_rooms : 'room not found';
    }

    public function getRoomOfferAttribute(){
        return $this->hotel_room ? $this->hotel_room->has_offer : 'room not found';
    }

    public function getRoomHotelAttribute(){
        return $this->hotel_room ? $this->hotel_room->has_offer : 'room not found';
    }

    public function getRoomPriceAttribute(){
        return $this->hotel_room ? $this->hotel_room->price_per_night : 'room not found';
    }

    // appended reserved room data
    public function getRoomNameAttribute(){
        return $this->hotel_room ? $this->hotel_room->name : 'hotel_room not found';
    }

    public function getRoomHotelNameAttribute(){
        return $this->hotel_room ? $this->hotel_room->hotel->name : 'hotel not found';
    }

//    public function getAvailableRoomsValueAttribute(){
//        return $this->hotel_room ? $this->hotel_room->available_rooms ? $this->hotel_room->available_rooms : 0 : 'room not found';
//    }


//    public function hotel_room(){
//        return $this->belongsToMany(Room_Reservation::class, 'room_reservations', 'hotel_room_id', 'id', 'id')->with([
//            'status','payment','has_offer','room_name','room_count'
//        ]);
//    }

//    public function hotel_rooms(){
//        return $this->belongsToMany(Room_Reservation::class,'room_reservations','hotel_room_id', 'id','id')
//            ->withPivot(['status','payment','has_offer','room_name','room_count'])->using(Room_Reservation::class);
//    }



}
