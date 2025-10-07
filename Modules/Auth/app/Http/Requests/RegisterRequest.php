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
            'gender'           => 'nullable|in:male,female',
            'email'            => 'required|email|max:255|unique:users,email',
            'password'         => 'required|string|min:6',
            'nationalty_id'    => 'nullable|exists:nationalties,id',
            'birthday'         => 'nullable|date',
            'phone'            => 'nullable|string|max:20|unique:users,phone',
        ];
    }
}
