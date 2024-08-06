<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSectionRequest extends FormRequest
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
        $id = $this->route('section');
        return [
            'name' => [
                'required',
                'min:3',
                Rule::unique('sections')->ignore($id),
            ],
    ];
    }
    /**
     * validtion messages
     */
    public function messages()
    {
        return [
            'name.required'     => 'عنوان القسم مطلوب',
            'name.min'          => 'يجب ان لا يقل عنوان القسم عن 3 أحرف',
            'name.unique'       => 'عنوان القسم موجود من قبل',
        
        ];
    }
}
