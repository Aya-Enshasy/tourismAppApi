<?php

namespace App\Http\Requests\Api\Users;

use Illuminate\Foundation\Http\FormRequest;

class updateUserRequest extends FormRequest
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
            'name'=>'sometimes|string'.$this->user_id,
            'address'=>'sometimes|string',
            'file'=>'sometimes|image|mimes:jpg,png,jpeg|nullable'
        ];
    }

    public function messages()
    {
        return [

            'name.string'=>'name must be string!',
            'address.string'=>'address must be string!',
            'file.mimes' => 'file directory must be jpg or png or jpeg!',
            'file.image' => 'file must be image!',
        ];
    }
}
