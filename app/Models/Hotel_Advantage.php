<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel_Advantage extends Model
{
    use HasFactory;

    protected $table = 'hotel_advantages';

    protected $fillable = ['id','name','color','icon','hotel_id'];
    protected $hidden = ['created_at','updated_at'];
    protected $casts = [

    ];

    // advantages belongs to hotel
    public function hotel(){
        return $this->belongsTo(Hotel::class, 'hotel_id','id')->withDefault(['name' => 'no related hotel']);
    }

    public function getAdvantageHotelNameAttribute(){
        return $this->hotel ? $this->hotel->name : 'hotel not found';
    }


}
