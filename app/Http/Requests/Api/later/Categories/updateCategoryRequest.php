<?php

namespace App\Http\Requests\Api\Categories;

use Illuminate\Foundation\Http\FormRequest;

class updateCategoryRequest extends FormRequest
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
            'name'=>'sometimes|string|unique:categories,name'.$this->category_id,
            'is_cartable'=>'sometimes|numeric|in:0,1|nullable',
            'file'=>'sometimes|image|mimes:jpg,png,jpeg'

        ];
    }

    public function messages()
    {
        // if lang condition E
        return [
//            'name.required'=>'Category should have a name!',
            'name.string'=>'Category must be string!',
            'name.unique'=>'Category must be unique!',
//            'is_cartable.required'=>'this field is required!',
            'is_cartable.numeric'=>'field input must be numeric!',
            'is_cartable.in:0,1'=>'field input must be in 0,1,or null !',
            'file.mimes' => 'file directory must be jpg or png or jpeg!',
//            'file.required' => 'image file is required!',
            'file.image' => 'file must be and image is required!'
        ];

        // else A
//        return [
//              'name.required'=>'يجب أن يكون للصنف اسم !',
//              'name.string'=>'يجب أن يكون اسم الصنف نصاً!',
//              'name.unique'=>'اسم الصنف يجب أن يكون فريداً!',
//              'is_cartable.required'=>هذا الحقل مطلوب!',
//              'is_cartable.numeric'=>'مدخل هذا الحقل يجب أن يكون رقمياً!',
//              'is_cartable.in:0,1,2'=>'مدخل هذا الحقل يجب ان يكون ضمن 0,1, أو فارغ !'
//        ];
    }
}
