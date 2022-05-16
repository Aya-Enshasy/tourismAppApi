<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Room_ReservationResource extends JsonResource
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
            'check_in_date' => $this->check_in_date,
            'check_out_date' => $this->check_out_date,
            'nights' => $this->nights,
            'total_price' => $this->total_price,
            'rooms_count' => $this->rooms_count,
            'hotel_room' => new Hotel_RoomResource($this->hotel_room),
            'user' => new UserResource($this->user)
        ];
    }
}
