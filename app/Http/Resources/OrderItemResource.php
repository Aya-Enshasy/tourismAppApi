<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id'=>$this->order_user_id,
            'order_id'=>$this->order_id,
            'room_id'=>$this->room_id,
            'check_in'=>$this->check_in,
            'check_out'=>$this->check_out,
            'room_count'=>$this->room_count,
            'total_nights'=>$this->total_nights,
            'room_price_per_night'=>$this->room_price_per_night,
            'room_has_offer'=>$this->room_offer,
            'savings_per_room'=>$this->savings,
            'order_total_price'=>$this->room_total_price,

        ];
    }
}
