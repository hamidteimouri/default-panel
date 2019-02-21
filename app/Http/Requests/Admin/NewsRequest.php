<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'category' => 'required',
            'title' => 'required',
            //'pre_title' => 'required|max:190',
            'source' => 'required',
            'link' => 'required|url',
            'summary' => 'required|max:512',
            'description' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'category' => 'دسته بندی',
            'title' => 'عنوان',
            //'pre_title' => 'پیش عنوان',
            'source' => 'منبع',
            'link' => 'لینک',
            'summary' => 'خلاصه',
            'description' => 'توضیحات',
        ];
    }
}
