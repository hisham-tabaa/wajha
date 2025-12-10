<?php

namespace Modules\System\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name_ar' => 'nullable|string|unique:roles,name_ar,'.$this->route('id'),
            'name_en' => 'nullable|string|unique:roles,name_en,'.$this->route('id'),
            'policy' => [
                'nullable',
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
            'name_ar.string' => 'يجب أن يكون الاسم بالعربية نصًا.',
            'name_ar.unique' => 'الاسم بالعربية مستخدم من قبل.',

            'name_en.string' => 'يجب أن يكون الاسم بالإنجليزية نصًا.',
            'name_en.unique' => 'الاسم بالإنجليزية مستخدم من قبل.',

            'policy.string' => 'يجب أن تكون السياسة نصًا.',
            'policy.in' => 'السياسة المحددة غير صالحة. القيم المسموحة: ['.implode(', ', array_keys(config('role_policy.policy'))).'].',

            'permissions.array' => 'يجب أن تكون الصلاحيات على شكل مصفوفة.',
            'permissions.*.exists' => 'بعض الصلاحيات المحددة غير موجودة في النظام.',
        ];
    }
}
