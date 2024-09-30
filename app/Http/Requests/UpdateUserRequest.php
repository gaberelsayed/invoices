<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $id = $this->route('user');
        
        return [
            'name' => 'required|string|max:255', // التأكد من أن الاسم مطلوب وله طول محدد
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id), // التحقق من تفرد البريد الإلكتروني مع استثناء المستخدم الحالي
            ],
            'password' => 'nullable|min:8|same:confirm-password', // كلمة المرور مطلوبة عند الإنشاء، اختيارية عند التحديث، ويجب أن تكون متطابقة مع تأكيد كلمة المرور
            'roles_name' => 'required', // التأكد من أن الأدوار مطلوبة ويتم تمريرها كـ array
        ];
    }
}
