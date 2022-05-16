<?php

namespace App\Http\Requests\Api\Hotel_Advantages;

use Illuminate\Foundation\Http\FormRequest;

class updateHotel_AdvantageRequest extends FormRequest
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
            'name'=>'sometimes|string'.$this->hotel_advantage_id,
            'color'=>'sometimes|string',
            'icon'=>'sometimes|string',
            'hotel_id'=>'sometimes|numeric|exists:hotels,id'
        ];
    }

    public function messages()
    {
        return [
            'hotel_id.exists' => 'Not an existing hotel ID',
            'hotel_id.numeric' => 'hotel_id input must be numeric!',
            'name.string'=>'name must be string!',
            'color.string'=>'color must be string!',
            'icon.string'=>'icon must be string!',
        ];
    }
}
