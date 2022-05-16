<?php

namespace App\Http\Requests\Api\Order_Details;

use Illuminate\Foundation\Http\FormRequest;

class newOrder_DetailRequest extends FormRequest
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
            'restaurant_dish_id'=>'required|numeric',
            'quantity'=>'required|string',
            'extra_additions'=>'sometimes|max:1000|nullable',
            'order_id'=>'required|numeric'
        ];
    }

    public function messages()
    {
        return [

            'restaurant_dish_id.required'=>'restaurant_dish_id is required!',
            'restaurant_dish_id.numeric'=>'field input must be numeric!',
            'quantity.required' => 'quantity is required!',
            'quantity.string'=>'quantity must be string!',
            'extra_additions.max:1000' => 'extra_additions text max:1000!',
            'order_id.required'=>'order_id is required!',
            'order_id.numeric'=>'field input must be numeric!'
        ];
    }
}
