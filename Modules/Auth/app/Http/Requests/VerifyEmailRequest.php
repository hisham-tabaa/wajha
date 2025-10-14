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
            'email.required' => 'حقل البريد الإلكتروني مطلوب.',
            'email.max' => 'يجب ألا يتجاوز البريد الإلكتروني 100 حرف.',
            'email.email' => 'يجب أن يكون البريد الإلكتروني بصيغة صحيحة.',
            'email.exists' => 'هذا البريد الإلكتروني غير مسجل لدينا.',
            'code.required' => 'رمز التحقق مطلوب.',
            'code.string' => 'يجب أن يكون رمز التحقق نصيًا.',
        ];
    }
}
