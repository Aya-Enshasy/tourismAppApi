<?php

namespace App\Http\Requests\Api\RoomOrderItems;

use Illuminate\Foundation\Http\FormRequest;

class newOrderRequest extends FormRequest
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
            'room_id'=>'required|numeric|exists:hotel_rooms,id',
            'check_in'=>'required|date|date_format:d-m-Y|after_or_equal:today',
            'check_out'=>'required|date|date_format:d-m-Y|after:check_in',
            'room_count'=>'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'room_id.required' => 'room_id is required!',
            'check_in.required' => 'check_in is required!',
            'check_in.date' => 'check_in must be date!',
            'check_in.date_format:d-m-Y' => 'check_in format must be d-m-Y!',
            'check_in.after_or_equal:today' => 'check_in date must be after or equal current date !',
            'check_out.after:check_in' => 'check_out date must be after check_in date !',
            'check_out.date_format:d-m-Y' => 'check_out format must be d-m-Y',
            'check_out.date' => 'check_out must be date!',
            'check_out.required' => 'check_out is required!',
            'room_count.required' => 'room_count is required!',
            'room_id.numeric' => 'room_id must be numeric!',

        ];
    }
}
