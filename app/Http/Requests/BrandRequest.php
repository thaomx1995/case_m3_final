<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'brand_name' => 'required',
            'brand_desc' => 'required',
            'brand_status' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'brand_name.required' => 'không được bỏ trống !',
            'brand_desc.required' => 'Mô tả không được bỏ trống!',
            'brand_status.required' => 'Trạng thái không được bỏ trống!',
        ];
    }
}
