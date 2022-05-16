<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FavouritePlaceResource extends JsonResource
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
//            'place_id' => $this->place_id,
            'place_type' => $this->place_type,
            'user' => new HotelResource($this->user) //user_id
        ];
    }
}
