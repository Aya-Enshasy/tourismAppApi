<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelOrder extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','status'];

    protected $hidden = ['updated_at'];

    public function orderItems(){
        return $this->hasMany(OrderItem::class,'order_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id','id')->withDefault(['name' => 'no related user']);
    }

    public function getTotalPriceAttribute(){
        return $this->orderItems ? $this->orderItems->sum('room_total_price') : 0 ;

    }
    public function getCurrentHotelIdAttribute(){
        return $this->orderItems->count() ? $this->orderItems[0]->hotel_id : 0 ;

    }
    public function getCurrentHotelNameAttribute(){
        return $this->orderItems->count() ? $this->orderItems[0]->hotel_name : 0 ;
    }

    public function getHotelOrderItemsAttribute(){
        return $this->orderItems ? $this->orderItems : 'order items not found';
    }

    public function getOrderItemsCountAttribute()
    {
        return $this->orderItems->count();
    }
}
