<?php

namespace Modules\System\Http\Requests\Role;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AddRoleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name_ar' => 'required|string|unique:roles,name_ar,' . $this->route('id'),
            'name_en' => 'required|string|unique:roles,name_en,' . $this->route('id'),
            'can_delete' => 'required|boolean|in:1,0',
            'policy' => [
                'required',
                'string',
                Rule::in(array_keys(config('role_policy.policy'))),
            ],
            'permissions' => 'array|nullable',
            'permissions.*' => 'exists:permissions,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name_ar.required' => 'حقل الاسم بالعربية مطلوب.',
            'name_ar.string' => 'يجب أن يكون الاسم بالعربية نصًا.',
            'name_ar.unique' => 'الاسم بالعربية مستخدم من قبل.',

            'name_en.required' => 'حقل الاسم بالإنجليزية مطلوب.',
            'name_en.string' => 'يجب أن يكون الاسم بالإنجليزية نصًا.',
            'name_en.unique' => 'الاسم بالإنجليزية مستخدم من قبل.',
            
            'can_delete.required' => 'حقل إمكانية الحذف مطلوب.',
            'can_delete.boolean' => 'يجب أن تكون إمكانية الحذف true أو false.',
            'can_delete.in' => 'يجب أن تكون قيمة إمكانية الحذف 1 أو 0 فقط.',

            'policy.required' => 'حقل السياسة مطلوب.',
            'policy.string' => 'يجب أن تكون السياسة نصًا.',
            'policy.in' => 'السياسة المحددة غير صالحة. القيم المسموحة: [' . implode(', ', array_keys(config('role_policy.policy'))) . '].',

            'permissions.array' => 'يجب أن تكون الصلاحيات على شكل مصفوفة.',
            'permissions.*.exists' => 'بعض الصلاحيات المحددة غير موجودة في النظام.',
        ];
    }
}
