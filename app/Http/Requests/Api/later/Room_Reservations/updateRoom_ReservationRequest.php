<?php

namespace App\Http\Requests\Api\later\Room_Reservations;

use Illuminate\Foundation\Http\FormRequest;

class updateRoom_ReservationRequest extends FormRequest
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

            'hotel_room_id'=>'sometimes|numeric|exists:hotel_rooms,id'.$this->room_reservation_id,
            'check_in_date'=>'sometimes|date',
            'check_out_date'=>'sometimes|date',
            'nights'=>'sometimes|numeric',
            'total_price'=>'sometimes|numeric',
            'rooms_count'=>'sometimes|numeric',
            'user_id'=>'sometimes|numeric|exists:users,id'
        ];
    }

    public function messages()
    {
        return [

            'hotel_rooms.exists' => 'Not an existing hotel room ID',
            'hotel_room_id.numeric' => 'hotel_room_id input must be numeric!',
            'user_id.numeric' => 'user_id input must be numeric!',
            'user_id.exists' => 'Not an existing user ID',
            'check_in_date.date' => 'check_in_date must be date!',
            'check_out_date.date' => 'check_in_date must be date!',
            'nights.numeric'=>'field input must be numeric!',
            'total_price.numeric' => 'total_price must be numeric!',
            'rooms_count.numeric' => 'rooms_count must be numeric!'
        ];
    }
}
