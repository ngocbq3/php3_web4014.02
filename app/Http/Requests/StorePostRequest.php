<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'min:6', 'unique:posts,title'],
            'image' => ['nullable', 'image'],
            'description' => ['required'],
            'content' => ['required'],
            'category_id' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Bạn cần nhập tiêu đề cho bài viết',
            'title.min' => 'Tiêu đề có số ký tự nhỏ nhất là 6',
            'image.image'       => "Bạn cần nhập đúng định dạng ảnh",
            'title.unique' => 'Tiêu đề đã tồn tại'
        ];
    }
}
