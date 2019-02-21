<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'summary' => 'required',
            'source' => 'required',
            'link' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'عنوان',
            'description' => 'متن مقاله',
            'summary' => 'خلاسه',
            'source' => 'منبع',
            'link' => 'لینک',
        ];
    }
}
