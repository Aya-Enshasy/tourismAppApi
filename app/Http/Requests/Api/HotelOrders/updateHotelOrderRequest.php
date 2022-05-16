<?php

namespace App\Http\Requests\Api\HotelOrders;

use Illuminate\Foundation\Http\FormRequest;

class updateHotelOrderRequest extends FormRequest
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
            'user_id' => 'sometimes|numeric|exists:users,id',
            'status' => 'sometimes|numeric',
            // payment
        ];
    }

    public function messages()
    {
        return [

            'user_id.numeric' => 'user_id must be numeric!',
            'status.numeric' => 'status must be numeric!',

        ];
    }
}
