<?php

namespace App\Http\Requests\Api\Mosques;

use Illuminate\Foundation\Http\FormRequest;

class newMosqueRequest extends FormRequest
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

            'name'=>'required|string|unique:mosques,name',
            'address'=>'required|string',
            'details'=>'required|max:1000',
            'available_time'=>'required|string',
            'available_day'=>'required|string',
            'area_space'=>'required|string',
            'phone_number'=>'required|numeric',
            'visitors_count'=>'required|string',
            'map'=>'required|string',
            'file'=>'sometimes|image|mimes:jpg,png,jpeg'

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'name.string' => 'Name must be string!',
            'name.unique' => 'Name must be unique!',
            'address.required' => 'address is required!',
            'address.string' => 'address must be string!',
            'details.required' => 'details is required!',
            'details.max:1000' => 'details text max:1000!',
            'available_time.required' => 'available_time is required!',
            'available_time.string' => 'available_time must be string!',
            'available_day.required' => 'available_day is required!',
            'available_day.string' => 'available_day must be string!',
            'area_space.required' => 'area_space is required!',
            'area_space.string' => 'area_space must be string!',
            'phone_number.required' => 'phone_number is required!',
            'phone_number.numeric' => 'phone_number must be numeric!',
            'map.required' => 'map is required!',
            'map.string' => 'map must be string!',
            'file.mimes' => 'file directory must be jpg or png or jpeg!',
            'file.image' => 'file must be an image !'
        ];
    }
}
