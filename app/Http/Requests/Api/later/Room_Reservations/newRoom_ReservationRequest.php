<?php

namespace App\Http\Requests\Api\later\Room_Reservations;

use Illuminate\Foundation\Http\FormRequest;

class newRoom_ReservationRequest extends FormRequest
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
            'hotel_room_id'=>'required|numeric|exists:hotel_rooms,id',
            'check_in_date'=>'required|date',
            'check_out_date'=>'required|date',
            'nights'=>'sometimes|numeric',
            'total_price'=>'required|numeric', // nights * price
            'rooms_count'=>'required|numeric',
            'user_id'=>'sometimes|numeric|exists:users,id'
        ];
    }

    public function messages()
    {
        return [

            'hotel_rooms.exists' => 'Not an existing hotel room ID',
            'hotel_room_id.required' => 'hotel_room_id is required!',
            'user_id.required' => 'user_id is required!',
            'hotel_room_id.numeric' => 'hotel_room_id input must be numeric!',
            'user_id.numeric' => 'user_id input must be numeric!',
            'user_id.exists' => 'Not an existing user ID',
            'check_in_date.required' => 'check_in_date is required!',
            'check_in_date.date' => 'check_in_date must be date!',
            'check_out_date.required' => 'check_out_date is required!',
            'check_out_date.date' => 'check_in_date must be date!',
            'nights.required' => 'nights is required!',
            'nights.numeric'=>'field input must be numeric!',
            'total_price.required' => 'total_price is required!',
            'total_price.numeric' => 'total_price must be numeric!',
            'rooms_count.required' => 'rooms_count is required!',
            'rooms_count.numeric' => 'rooms_count must be numeric!'
        ];
    }
}
