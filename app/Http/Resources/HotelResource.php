<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HotelResource extends JsonResource
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
            'address' => $this->address,
            'star' => $this->star,
            'details' => $this->details,
            'map' => $this->map,
            'rooms_count' => $this->rooms_count,
            'advantages_count' => $this->advantages_count,
            'hotel_image' => $this->hotel_image,
            'hotel_advantages' => $this->hotel_advantages,
            'hotel_rooms' => $this->hotel_rooms
        ];
    }
}
