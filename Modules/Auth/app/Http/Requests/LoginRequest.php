<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8',
            
        ];
    }

    public function messages()
    {
        return [
            'email.required' => __('auth::validation.email_required'),
            'email.email' => __('auth::validation.email_email'),
            'email.max' => __('auth::validation.email_max', ['max' => 255]),
            'email.exists' => __('auth::validation.email_not_exists'),
            'password.required' => __('auth::validation.password_required'),
            'password.min' => __('auth::validation.password_min', ['min' => 8]),
        ];
    }
}
