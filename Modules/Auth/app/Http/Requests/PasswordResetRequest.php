<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordResetRequest extends FormRequest
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
            'password' => 'required|string|min:8|confirmed',
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
            'password.required' => __('auth::validation.password_required'),
            'password.string' => __('auth::validation.password_string'),
            'password.min' => __('auth::validation.password_min', ['min' => 8]),
            'password.confirmed' => __('auth::validation.password_confirmed'),
        ];
    }
}
