<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerifyEmailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|max:255|email|exists:users,email',
            'code' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => __('auth::validation.email_required'),
            'email.max' => __('auth::validation.email_max', ['max' => 255]),
            'email.email' => __('auth::validation.email_email'),
            'email.exists' => __('auth::validation.email_not_exists'),
            'code.required' => __('auth::validation.code_required'),
            'code.string' => __('auth::validation.code_string'),
        ];
    }
}
