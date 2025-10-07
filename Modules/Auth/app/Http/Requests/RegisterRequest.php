<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name'       => 'required|string|max:100',
            'last_name'        => 'nullable|string|max:100',
            'google_id'        => 'nullable|string|max:255',
            'avatar'           => 'nullable|string|max:255',
            'gender'           => 'nullable|in:male,female',
            'role_id'          => 'required|exists:roles,id',
            'email'            => 'nullable|email|max:255|unique:users,email',
            'password'         => 'required|string|min:6',
            'last_sign_in_at'  => 'nullable|date',
            'nationalty_id'    => 'nullable|exists:nationalties,id',
            'birthday'         => 'nullable|date',
            'phone'            => 'nullable|string|max:20|unique:users,phone',
            'confirmed_at'     => 'nullable|date',
        ];
    }
}
