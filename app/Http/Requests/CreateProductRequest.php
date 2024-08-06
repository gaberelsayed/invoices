<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'name'          => 'required|max:255',
            'section_id'    => 'required'
        ];
    }
    /**
     * validtion messages
     */
    public function messages()
    {
        return [
            'name.required' =>'يرجي ادخال اسم المنتج',
            'section_id.required'   => 'اسم القسم مطلوب'        
        ];
    }
}
