<?php

namespace App\Http\Requests\Api\Hotels;

use Illuminate\Foundation\Http\FormRequest;

class updateHotelRequest extends FormRequest
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
            'name'=>'sometimes|string'.$this->hotel_id,
            'address'=>'sometimes|string',
            'details'=>'sometimes|max:1000',
            'star'=>'sometimes|numeric',
            'map'=>'sometimes|string',
            'file'=>'sometimes|image|mimes:jpg,png,jpeg'
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'Name must be string!',
            'address.string' => 'address must be string!',
            'details.max:1000' => 'details text max:1000!',
            'star.numeric' => 'star must be numeric!',
            'map.string' => 'map must be string!',
            'file.mimes' => 'file directory must be jpg or png or jpeg!',
            'file.image' => 'file must be an image!'
        ];
    }
}
