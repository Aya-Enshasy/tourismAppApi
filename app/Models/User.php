<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','name','image','email','address','password','fcm_token'];
    protected $appends = ['user_avatar'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'media',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function sendPasswordResetNotification($token)
    {

        $url = 'https://spa.test/reset-password?token=' . $token;

        $this->notify(new ResetPasswordNotification($url));
    }

    // relation with media table
    public function media(){
        return $this->morphOne(Media::class,'mediable');
    }

    public function getUserAvatarAttribute(){
        return $this->media ? ($this->media->name? url('/storage/'.$this->media->name) : url('/user.jpg')) : url('/user.jpg');
    }

    // relation with favourite places lists table
    public function favouritePlacesList(){
        return $this->hasMany(FavouritePlacesList::class,'user_id');
    }

    // relation with room reservations table
    public function roomReservation(){
        return $this->hasMany(Room_Reservation::class,'user_id');
    }


    //----------------------------------------

    public function userReservedRooms(){
        return $this->hasMany(Room_Reservation::class);
    }

    public function hotel_orders(){
        return $this->hasMany(HotelOrder::class,'user_id');
    }
    public function getUserHotelOrdersCountAttribute()
    {
        return $this->hotel_orders()->count();
    }

    public function getCurrentHotelOrderAttribute(){
        return $this->hotel_orders ? $this->hotel_orders->where('status',0)->first() : 0 ;
    }
    public function getUserOrderItemsCountAttribute()
    {
        return $this->hotel_orders ? $this->currentHotelOrder->orderItems()->count() : 0 ;
    }
    public function getCurrentOrderHotelIdAttribute(){
        return $this->hotel_orders->count() ? $this->hotel_orders[0]->current_hotel_id : 0 ;
    }
    public function getCurrentOrderHotelNameAttribute(){
        return $this->hotel_orders->count() ? $this->hotel_orders[0]->current_hotel_name : 0 ;
    }

    public function SendFcmNotification($title, $message, $datapayload=[]){
        $msg = urlencode($message);
        $data = array(
            'title'=>$title,
            'sound' => "default",
            'msg'=>$msg,
            'data'=>$datapayload,
            'body'=>$message,
            'color' => "#79bc64"
        );
        $fields = array(
            'to'=>Auth::user()->fcm_token,
            'notification'=>$data,
//        'data'=>$datapayload,
            "priority" => "high",
        );
        $headers = array(
            'Authorization: key=AAAA_48PLwo:APA91bET6FPjklkSc_gDLG_4lwFfp5Spk9zcMow5u8m-n0flc9apQhZ8hZ1c7yo6u_xvQxpSvosVxzpZ2IXziONX6jA98pHX61lRfs08Ca2B2EueJVaxsOuzvbZHUaSF7gKwXp-upHrC',
            'Content-Type: application/json'

        );
//    dd(json_encode($fields));
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close( $ch );
        return $result;
    }

}
