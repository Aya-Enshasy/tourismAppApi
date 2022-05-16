<?php

namespace App\Http\Requests\Api\Media;

use Illuminate\Foundation\Http\FormRequest;

class newMediaRequest extends FormRequest
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
            'mediable_id'=>'required|numeric',
            'mediable_type'=>'required|string'
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'name.string' => 'Name name must be string!',
            'mediable_id.required' => 'mediable_id is required!',
            'mediable_id.numeric'=>'field input must be numeric!',
            'mediable_type.string' => 'mediable_type name must be string!',
            'mediable_type.required' => 'mediable_type is required!'
        ];
    }
}
