<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'name' => 'required|max:190',
            'family' => 'required|max:190',
            'email' => 'required|email|max:190',
            'password' => 'nullable|min:6|max:190',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام',
            'family' => 'نام خانوادگی',
            'email' => 'ایمیل',
            'password' => 'رمز عبور',
        ];
    }
}
