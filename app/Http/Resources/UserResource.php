<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'user_avatar' => $this->user_avatar,
//            'user_hotel_orders_count' => $this->user_hotel_orders_count,
//            'user_order_items_count' => $this->user_order_items_count,

        ];
    }
}
