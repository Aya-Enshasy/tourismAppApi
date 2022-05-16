<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Hotel_RoomResource extends JsonResource
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
            'capacity' => $this->capacity,
            'details' => $this->details,
            'hotel_id' => $this->hotel_id,
            'has_offer' => $this->has_offer,
            'available_rooms' => $this->available_rooms,
            'price_per_night' => $this->price_per_night,
            'room_hotel_name' => $this->room_hotel_name,
            'room_images' => $this->room_images, // -------------------------------------
        ];
    }
}
