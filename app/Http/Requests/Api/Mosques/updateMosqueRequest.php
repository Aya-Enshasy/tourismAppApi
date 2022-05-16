<?php

namespace App\Http\Requests\Api\Mosques;

use Illuminate\Foundation\Http\FormRequest;

class updateMosqueRequest extends FormRequest
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
            'name'=>'sometimes|string'.$this->mosque_id,
            'address'=>'sometimes|string',
            'details'=>'sometimes|max:1000',
            'available_time'=>'sometimes|string',
            'available_day'=>'sometimes|string',
            'area_space'=>'sometimes|string',
            'phone_number'=>'sometimes|numeric',
            'visitors_count'=>'sometimes|string',
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
            'available_time.string' => 'available_time must be string!',
            'available_day.string' => 'available_day must be string!',
            'area_space.string' => 'area_space must be string!',
            'phone_number.numeric' => 'phone_number must be numeric!',
            'map.string' => 'map must be string!',
            'file.mimes' => 'file directory must be jpg or png or jpeg!',
            'file.image' => 'file must be and image!'
        ];
    }
}
