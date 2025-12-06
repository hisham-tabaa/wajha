<?php

namespace Modules\Auth\Http\Requests\Google;

use Illuminate\Foundation\Http\FormRequest;

class GoogleLoginRequest extends FormRequest
{
    /**
     * تحديد ما إذا كان المستخدم مخولًا لإرسال هذا الطلب.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * القواعد التي سيتم تطبيقها على الطلب.
     */
    public function rules(): array
    {
        return [
            'id_token' => 'required|string',
        ];
    }

    /**
     * الرسائل المخصصة لأخطاء التحقق.
     */
    public function messages(): array
    {
        return [
            'id_token.required' => __('auth::validation.id_token_required'),
            'id_token.string'   => __('auth::validation.id_token_string'),
        ];
    }
}
