<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ChangeUserRoleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'role_id' => [
                'required',
                Rule::exists('roles', 'id')->where(function ($query) {
                    $query->whereIn('name', ['user', 'seller']);
                }),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'role_id.required' => 'حقل الدور مطلوب.',
            'role_id.exists' => 'يجب أن يكون الدور المحدد إما مستخدم أو بائع.',
        ];
    }

    public function attributes(): array
    {
        return [
            'role_id' => 'الدور',
        ];
    }
}
