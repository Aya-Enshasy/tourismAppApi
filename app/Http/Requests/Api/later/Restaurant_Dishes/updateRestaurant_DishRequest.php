<?php

namespace App\Http\Requests\Api\Restaurant_Dishes;

use Illuminate\Foundation\Http\FormRequest;

class updateRestaurant_DishRequest extends FormRequest
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
            'name'=>'required|string'.$this->restaurant_dish_id,
            'restaurant_name'=>'required|string',
            'details'=>'required|max:1000',
            'calories'=>'required|string',
            'preparation_time'=>'required|string',
            'price'=>'required|string',
            'ingredients'=>'required|string',
            'has_offer'=>'sometimes|string|nullable'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'name.string' => 'Name must be string!',
            'restaurant_name.required' => 'restaurant_name is required!',
            'restaurant_name.string' => 'restaurant_name must be string!',
            'details.required' => 'details is required!',
            'details.max:1000' => 'details text max:1000!',
            'calories.required' => 'calories is required!',
            'calories.string' => 'calories must be string!',
            'price.required' => 'price is required!',
            'price.string' => 'price must be string!',
            'ingredients.required' => 'ingredients is required!',
            'ingredients.string' => 'ingredients must be string!',
            'has_offer.string' => 'has_offer must be string!'
        ];
    }
}

