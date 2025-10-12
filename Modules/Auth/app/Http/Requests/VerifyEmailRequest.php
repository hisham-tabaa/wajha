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
            'email' => 'required|max:100|email|exists:users,email',
            'code' => 'required|string',
        ];
    }
        public function messages(): array
    {
        return [
            'email.required' => 'The email field is required',
            'email.max'=>'The email must be less than 100 character ',
            'email.email' => 'The email must be a valid email address',
            'email.exists' => 'This email is not registered in our system',
            'code.required' => 'The verification code is required',
            'code.string' => 'The verification code must be a string',
        ];
    }
}