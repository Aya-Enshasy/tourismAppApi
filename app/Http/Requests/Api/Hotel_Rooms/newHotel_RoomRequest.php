<?php

namespace App\Http\Requests\Api\Hotel_Rooms;

use Illuminate\Foundation\Http\FormRequest;

class newHotel_RoomRequest extends FormRequest
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

            'hotel_id'=>'required|numeric|exists:hotels,id',
            // name unique only for one hotel
            'name'=>'required|string|unique:hotel_rooms,name',
            'capacity'=>'required|string',
            'details'=>'required|max:1000',
            'price_per_night'=>'required|numeric',
            'available_rooms'=>'sometimes|numeric',
            'has_offer'=>'sometimes|numeric',
//            'madia'=>'sometimes|array',
//            'madia.*'=>'image|mimes:jpg,png,jpeg'

        ];
    }

    public function messages()
    {
        return [

            'hotel_id.exists' => 'Not an existing hotel ID',
            'hotel_id.required' => 'hotel_id is required!',
            'hotel_id.numeric' => 'hotel_id input must be numeric!',
            'name.required'=>'name should have a name!',
            'name.string'=>'name must be string!',
            'name.unique'=>'name must be unique!',
            'capacity.required' => 'capacity is required!',
            'capacity.string' => 'capacity must be string!',
            'details.required' => 'details is required!',
            'details.max:1000' => 'details text max:1000!',
            'price_per_night.required' => 'price_per_night is required!',
            'price_per_night.numeric' => 'price_per_night must be numeric!',
            'has_offer.numeric' => 'has_offer must be numeric!',
            'available_rooms.required' => 'available_rooms is required!',
            'available_rooms.numeric' => 'available_rooms input must be numeric!',

//            'madia.required'=>'room image is required!',
//            'madia.array'=>'room must have more than one image!',
//            'madia.mimes' => 'file directory must be jpg or png or jpeg!',
//            'madia.image' => 'file must be an image!'
        ];
    }
}
