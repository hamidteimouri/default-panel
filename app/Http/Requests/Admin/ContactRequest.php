<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'mobile' => 'required',
            'tel' => 'required',
            'fax' => 'required',
            'telegram' => 'required',
            'instagram' => 'required',
            'twitter' => 'required',
            'email' => 'required',
            'address' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'mobile' => 'تلفن همراه',
            'tel' => 'تلفن ثابت',
            'fax' => 'فکس',
            'telegram' => 'تلگرام',
            'instagram' => 'ایسنتاگرام',
            'twitter' => 'تویتتر',
            'email' => 'ایمیل',
            'address' => 'آدرس',
        ];
    }
}
