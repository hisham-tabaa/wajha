<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerifyPasswordResetCodeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email|max:255|exists:users,email',
            'code' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => __('auth::validation.email_required'),
            'email.email' => __('auth::validation.email_email'),
            'email.max' => __('auth::validation.email_max', ['max' => 255]),
            'email.exists' => __('auth::validation.email_not_exists'),
            'code.required' => __('auth::validation.code_required'),
            'code.string' => __('auth::validation.code_string'),
        ];
    }
}
