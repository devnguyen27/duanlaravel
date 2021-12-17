<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CosoEdit extends FormRequest
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
            'name' => ['required', 'min:3', 'max:50'],
            'diachi' => ['required', 'min:3', 'max:300'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên cơ sở',
            'name.min' => 'Cơ sở phải lớn hơn 3 kí tự',
            'name.max' => 'Cơ sở phải nhỏ hơn 300 kí tự',
            'diachi.required' => 'Bạn chưa nhập địa chỉ',
            'diachi.min' => 'Địa chỉ phải lớn hơn 3 kí tự',
            'diachi.max' => 'Địa chỉ phải nhỏ hơn 300 kí tự',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên cơ sở',
            'diachi' => 'địa chỉ cụ thể',
        ];
    }
}
