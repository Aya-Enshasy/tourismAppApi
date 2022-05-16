<?php

namespace App\Http\Requests\Api\Hotels;

use Illuminate\Foundation\Http\FormRequest;

class newHotelRequest extends FormRequest
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
            'name'=>'required|string|unique:hotels,name',
            'address'=>'required|string',
            'details'=>'required|max:1000',
            'star'=>'required|numeric|between:1,7',
            'map'=>'required|string',
            'file'=>'sometimes|image|mimes:jpg,png,jpeg'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'name.string' => 'Name must be string!',
            'name.unique'=>'name must be unique!',
            'address.required' => 'address is required!',
            'address.string' => 'address must be string!',
            'details.required' => 'details is required!',
            'details.max:1000' => 'details text max:1000!',
            'star.required' => 'star is required!',
            'star.numeric' => 'star must be numeric!',
            'star.between:1,7' => 'star must be between:1,7!',
            'map.required' => 'map is required!',
            'map.string' => 'map must be string!',
            'file.mimes' => 'file directory must be jpg or png or jpeg!',
//            'file.image' => 'file must be an image!'
        ];
    }
}

