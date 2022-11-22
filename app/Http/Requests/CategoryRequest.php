<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category_name' => 'required',
            'category_desc' => 'required',
            'category_status' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'category_name.required' => 'Tênkhông được bỏ trống !',
            'category_desc.required' => 'Mô tả không được bỏ trống!',
            'category_status.required' => 'Trạng tháikhông được bỏ trống!',
        ];
    }
}
