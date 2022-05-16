<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = ['room_id','order_id','check_in','check_out','room_count'];
    protected $hidden = ['created_at','updated_at'];


    public function room(){
        return $this->belongsTo(Hotel_Room::class,'room_id','id')->withDefault(['name' => 'no related room']);
    }

    public function hotelOrder(){
        return $this->belongsTo(HotelOrder::class,'order_id','id')->withDefault(['name' => 'no related hotelOrder']);
    }

    public function getTotalNightsAttribute(){
        return ($this->check_in && $this->check_out) ? Carbon::parse($this->check_out)->diffInDays(Carbon::parse($this->check_in)) : 0;
    }
    public function getRoomPricePerNightAttribute(){
        return $this->room ? $this->room->price_per_night : 0 ;
    }
    public function getRoomOfferAttribute(){
        return $this->room ? $this->room->has_offer : 0 ;
    }

    public function getSavingsAttribute(){
        return ($this->room->price_per_night * $this->room->has_offer)/100;
    }

    public function getRoomTotalPriceAttribute(){
        return (($this->room->price_per_night - $this->savings ) * ($this->total_nights * $this->room_count) );
    }

    public function getAvailableRoomsAttribute(){
        return $this->room ? $this->room->available_rooms : 0;
    }

    public function getOrderUserIdAttribute(){
        return $this->hotelOrder ? $this->hotelOrder->user_id : 0;
    }

    public function getHotelIdAttribute(){
        return $this->room ? $this->room->hotel_id : 0;
    }

    public function getHotelNameAttribute(){
        return $this->room ? $this->room->room_hotel_name : 0;
    }


}
