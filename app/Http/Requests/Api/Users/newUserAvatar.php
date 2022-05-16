<?php

namespace App\Http\Requests\Api\Users;

use Illuminate\Foundation\Http\FormRequest;

class newUserAvatar extends FormRequest
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
            'file'=>'required|mimes:jpg,png,jpeg|nullable'
        ];
    }

    public function messages()
    {
        return [
            'file.required' => 'file is required!',
            'file.mimes' => 'file directory must be jpg or png or jpeg!',
        ];
    }
}
