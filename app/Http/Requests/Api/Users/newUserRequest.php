<?php

namespace App\Http\Requests\Api\Users;

use Illuminate\Foundation\Http\FormRequest;

class newUserRequest extends FormRequest
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
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'address'=>'required|string',
            'file'=>'sometimes|image|mimes:jpg,png,jpeg|nullable'
        ];
    }

    public function messages()
    {
        return [

            'name.required'=>'name is required!',
            'email.required'=>'email is required!',
            'address.required'=>'address is required!',
            'name.string'=>'name must be string!',
            'email.string'=>'email must be string!',
            'address.string'=>'address must be string!',
            'email.unique'=>'email must be unique!',
            'file.mimes' => 'file directory must be jpg or png or jpeg!',
            'file.image' => 'file must be image!',
        ];
    }
}
