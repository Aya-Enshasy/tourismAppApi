<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class newFavouritePlaceRequest extends FormRequest
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

            'place_id'=>'required|numeric',
            'place_type'=>'required|string',
            'user_id'=>'required|numeric|exists:users,id'
        ];
    }

    public function messages()
    {
        return [

//            'hotel_rooms.exists' => 'Not an existing hotel room ID',
            'place_id.required' => 'place_id is required!',
            'user_id.required' => 'user_id is required!',
            'place_id.numeric' => 'place_id input must be numeric!',
            'user_id.numeric' => 'user_id input must be numeric!',
            'user_id.exists' => 'Not an existing user ID',
            'place_type.required' => 'place_type is required!',
            'place_type.string' => 'place_type must be string!'
        ];
    }
}
