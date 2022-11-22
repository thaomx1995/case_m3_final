<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_desc' => 'required',
            'product_content' => 'required',
            'product_price' => 'required',
            'product_image' => 'required',
            'product_status' => 'required',
            'product_name' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'product_desc.required' => 'Mô tả không được bỏ trống !',
            'product_content.required' => 'Nội dung không được bỏ trống!',
            'product_price.required' => 'Giá không được bỏ trống!',
            'product_image.required' => 'Ảnh không được bỏ trống!',
            'product_status.required' => 'Trạng thái không được bỏ trống!',
            'product_name.required' => 'Tên không được bỏ trống!',
        ];
    }
}
