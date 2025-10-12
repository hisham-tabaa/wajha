<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendVerificationCodeRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'email' => 'required|email|max:100',
        ];
    }
    public function messages(): array
    {
        return [
            'email.required'=>'The email field is required',
            'email.email'=>'The email must be a valid email address',
            'email.max'=>'The email must be less than 100 character ',
        ];
    }
}