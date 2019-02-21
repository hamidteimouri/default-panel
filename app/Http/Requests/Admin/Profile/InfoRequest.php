<?php

namespace App\Http\Requests\Admin\Profile;

use Illuminate\Foundation\Http\FormRequest;

class InfoRequest extends FormRequest
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
            'mobile' => 'required|max:190',
            'national_code' => 'required|max:190',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام',
            'family' => 'نام خانوادگی',
            'mobile' => 'تلفن همراه',
            'national_code' => 'کد ملی',
        ];
    }
}
