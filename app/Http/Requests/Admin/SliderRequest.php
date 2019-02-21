<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'title' => 'required|max:190',
//            'category' => 'required|max:190',
//            'description' => 'required|max:128',
            'link' => 'nullable|max:1024',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'عنوان',
            'category' => 'دسته بندی',
            'description' => 'توضیحات',
            'link' => 'لینک',
        ];
    }
}
