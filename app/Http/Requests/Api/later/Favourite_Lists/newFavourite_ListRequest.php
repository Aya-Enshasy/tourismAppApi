<?php

namespace App\Http\Requests\Api\Favourite_Lists;

use Illuminate\Foundation\Http\FormRequest;

class newFavourite_ListRequest extends FormRequest
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
            'user_id'=>'required|numeric'
        ];
    }

    public function messages()
    {
        return [

            'restaurant_dish_id.required'=>'restaurant_dish_id is required!',
            'restaurant_dish_id.numeric'=>'field input must be numeric!',
            'user_id.required' => 'user_id is required!',
            'user_id.numeric' => 'user_id input must be numeric!'
        ];
    }
}
