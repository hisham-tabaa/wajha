<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    // TODO Validation from Migration the coulmns   Note:From Awad TO RANIA
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name'       => 'required|string|max:100',
            'last_name'        => 'nullable|string|max:100',
            'email'            => 'required|email|max:255|unique:users,email',
            'password'         => 'required|string|min:8',


        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => __('auth::validation.first_name_required'),
            'first_name.string'   => __('auth::validation.first_name_string'),
            'first_name.max'      => __('auth::validation.first_name_max', ['max' => 100]),

            'last_name.string'    => __('auth::validation.last_name_string'),
            'last_name.max'       => __('auth::validation.last_name_max', ['max' => 100]),

            'email.required'      => __('auth::validation.email_required'),
            'email.email'         => __('auth::validation.email_email'),
            'email.unique'        => __('auth::validation.email_unique'),

            'password.required'   => __('auth::validation.password_required'),
            'password.string'     => __('auth::validation.password_string'),
            'password.min'        => __('auth::validation.password_min', ['min' => 8]),
        ];
    }
}
