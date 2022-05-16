<?php

namespace App\Http\Requests\Api\RoomOrderItems;

use Illuminate\Foundation\Http\FormRequest;

class updateOrderRequest extends FormRequest
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
//            'room_id'=>'sometimes|numeric|exists:hotel_rooms,id'
            'check_in'=>'sometimes|date|date_format:d-m-Y|after_or_equal:today'.$this->order_items_id,
            'check_out'=>'sometimes|date|date_format:d-m-Y|after:check_in',
            'room_count'=>'required|numeric',
        ];
    }

    public function messages()
    {
        return [

            'check_in.date' => 'check_in must be date!',
            'check_in.date_format:d-m-Y' => 'check_in format must be d-m-Y!',
            'check_in.after_or_equal:today' => 'check_in date must be after or equal current date !',
            'check_out.after:check_in' => 'check_out date must be after check_in date !',
            'check_out.date_format:Y-m-d' => 'check_out format must be Y-m-d!',
            'room_count.numeric' => 'room_count must be numeric!',
            'room_count.required' => 'room_count is required!',

        ];
    }
}
