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
            'email' => 'required|email|max:100|exists:users,email',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'حقل البريد الإلكتروني مطلوب.',
            'email.email' => 'يجب أن يكون البريد الإلكتروني بصيغة صحيحة.',
            'email.max' => 'يجب ألا يتجاوز البريد الإلكتروني 100 حرف.',
            'email.exists' => 'البريد الإلكتروني غير مسجل لدينا.',
        ];
    }
}
