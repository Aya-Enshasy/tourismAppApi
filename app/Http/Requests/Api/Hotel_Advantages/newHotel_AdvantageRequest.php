<?php

namespace App\Http\Requests\Api\Hotel_Advantages;

use Illuminate\Foundation\Http\FormRequest;

class newHotel_AdvantageRequest extends FormRequest
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
            'name'=>'required|string|unique:hotel_advantages,name',
            'color'=>'required|string|unique:hotel_advantages,color',
            'icon'=>'required|string|unique:hotel_advantages,icon',
            'hotel_id'=>'required|numeric|exists:hotels,id',

        ];
    }

    public function messages()
    {
        return [
            'hotel_id.exists' => 'Not an existing hotel ID',
            'hotel_id.required' => 'hotel_id is required!',
            'hotel_id.numeric' => 'hotel_id input must be numeric!',
            'name.required'=>'name is required!',
            'color.required'=>'color is required!',
            'icon.required'=>'icon is required!',
            'name.string'=>'name must be string!',
            'color.string'=>'color must be string!',
            'icon.string'=>'icon must be string!',
            'name.unique'=>'name must be unique!',
            'color.unique'=>'color must be unique!',
            'icon.unique'=>'icon must be unique!'
        ];
    }
}
