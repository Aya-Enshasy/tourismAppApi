<?php

namespace App\Http\Requests\Api\Restaurant_Categories;

use Illuminate\Foundation\Http\FormRequest;

class newRestaurant_CategoryRequest extends FormRequest
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
            'name'=>'required|string|unique:restaurant_categories,name',
            'restaurant_id'=>'required|numeric',
            'icon'=>'required|string|unique:restaurant_categories,icon'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'name is required!',
            'restaurant_id.required'=>'restaurant_id is required!',
            'icon.required'=>'icon is required!',
            'name.string'=>'name must be string!',
            'restaurant_id.string'=>'color must be numeric!',
            'icon.string'=>'icon must be string!',
            'name.unique'=>'name must be unique!',
            'icon.unique'=>'icon must be unique!'
        ];
    }
}
