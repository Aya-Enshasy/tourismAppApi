<?php

namespace App\Http\Requests\Api\Restaurants;

use Illuminate\Foundation\Http\FormRequest;

class updateRestaurantRequest extends FormRequest
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

            'name'=>'required|string'.$this->restaurant_id,
            'address'=>'required|string',
            'details'=>'required|max:1000',
            'latitude'=>'required|string',
            'longitude'=>'required|string'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'name.string' => 'Name must be string!',
            'address.required' => 'address is required!',
            'address.string' => 'address name must be string!',
            'details.required' => 'details is required!',
            'details.max:1000' => 'details text max:1000!',
            'latitude.required' => 'latitude is required!',
            'latitude.string' => 'latitude name must be string!',
            'longitude.required' => 'longitude is required!',
            'longitude.string' => 'longitude name must be string!'
        ];
    }
}
