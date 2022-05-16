<?php

namespace App\Http\Requests\Api\Orders;

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
            'user_id'=>'sometimes|numeric'.$this->order_id,
            'status'=>'sometimes|numeric|in:0,1',
            'is_paid'=>'sometimes|numeric',
            'total_price'=>'sometimes|string'
        ];
    }

    public function messages()
    {
        return [

//            'user_id.required' => 'user_id is required!',
            'user_id.numeric' => 'user_id input must be numeric!',
            'status.numeric' => 'status input must be numeric!',
            'status.in:0,1' => 'status input must in:0,1!',
//            'is_paid.required' => 'is_paid is required!',
            'is_paid.numeric' => 'status input must be numeric!',
//            'total_price.required' => 'total_price is required!',
            'total_price.string'=>'total_price name must be string!'
        ];
    }
}
