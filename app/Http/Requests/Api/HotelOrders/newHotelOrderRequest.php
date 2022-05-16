<?php

namespace App\Http\Requests\Api\HotelOrders;

use Illuminate\Foundation\Http\FormRequest;

class newHotelOrderRequest extends FormRequest
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
            'user_id'=>'required|numeric|exists:users,id',
            'status'=>'required|numeric',
            // payment
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'user_id is required!',
            'status.required' => 'status is required!',
            'user_id.numeric' => 'user_id must be numeric!',
            'status.numeric' => 'status must be numeric!',

        ];
    }
}
