<?php

namespace Modules\System\Http\Requests\Permission;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name_ar' => 'required|string|unique:permissions,name_ar,'.$this->route('id'),
            'name_en' => 'required|string|unique:permissions,name_en,'.$this->route('id'),
        ];
    }

    public function messages(): array
    {
        return [
            'name_ar.required' => 'حقل الاسم بالعربية مطلوب.',
            'name_ar.string' => 'يجب أن يكون الاسم بالعربية نصًا.',
            'name_ar.unique' => 'الاسم بالعربية مستخدم مسبقًا.',

            'name_en.required' => 'حقل الاسم بالإنجليزية مطلوب.',
            'name_en.string' => 'يجب أن يكون الاسم بالإنجليزية نصًا.',
            'name_en.unique' => 'الاسم بالإنجليزية مستخدم مسبقًا.',
        ];
    }
}
