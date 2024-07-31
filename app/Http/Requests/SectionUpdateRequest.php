<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionUpdateRequest extends FormRequest
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
        $sectionId = $this->route('sections');

        return [
            'name' => 'required|min:3|unique:sections,name,' . $sectionId,
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
