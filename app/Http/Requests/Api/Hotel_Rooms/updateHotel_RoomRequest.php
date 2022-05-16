<?php

namespace App\Http\Requests\Api\Hotel_Rooms;

use Illuminate\Foundation\Http\FormRequest;

class updateHotel_RoomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'hotel_id'=>'sometimes|numeric|exists:hotels,id'.$this->hotel_room_id,
            'name'=>'sometimes|string',
            'capacity'=>'sometimes|string',
            'details'=>'sometimes|max:1000',
            'price_per_night'=>'sometimes|numeric',
            'has_offer'=>'sometimes|numeric',
            'available_rooms'=>'sometimes|numeric',
        ];
    }

    public function messages()
    {
        return [
            'hotel_id.exists' => 'Not an existing hotel ID',
            'hotel_id.numeric' => 'hotel_id input must be numeric!',
            'name.string'=>'name must be string!',
            'capacity.string' => 'capacity must be string!',
            'details.max:1000' => 'details text max:1000!',
            'price_per_night.numeric' => 'price_per_night must be numeric!',
            'has_offer.numeric' => 'price_per_night must be numeric!',
            'available_rooms.numeric' => 'available_rooms input must be numeric!',
        ];
    }
}
