<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChurchResource extends JsonResource
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
            'details' => $this->details,
            'available_time' => $this->available_time,
            'available_day' => $this->available_day,
            'visitors_count' => $this->visitors_count,
            'area_space' => $this->area_space,
            'phone_number' => $this->phone_number,
            'map' => $this->map,
            'church_image' => $this->church_image,

        ];
    }
}
