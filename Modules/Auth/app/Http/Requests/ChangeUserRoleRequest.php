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

            'role_id.required' => __('auth::validation.role_id_required'),
            'role_id.exists' => __('auth::validation.role_id_exists'),

        ];
    }

    public function attributes(): array
    {
        return [
            'role_id' => __('auth::validation.attributes.role_id'),
        ];
    }
}
