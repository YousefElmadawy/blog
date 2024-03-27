<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'category_id'=>'required',
            'title' => 'required|unique:posts|max:255',
            'content' => 'required|max:255',
            'image' => 'required'|'mimes:png,jpg',
            'tags'=>'required'
        ];
    }
    public function messages(): array
    {
        return [
            'category_id'=>'Category Field is Requeird',
             
        ];
    }
}
