<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Authorization logic can be added here
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'avatar' => 'nullable|url', // or 'image' if uploading
            'gender' => 'nullable|in:male,female',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->user()?->getKey()),
            ],
            'birthday' => 'nullable|date',
            'phone' => 'nullable|string|max:20',
            'nationalty_id' => 'nullable|exists:nationalties,id',
        ];
    }

    public function messages(): array
    {

        return [
            'first_name.required' => 'First name is required',
            'first_name.string' => 'First name must be a string',
            'first_name.max' => 'First name must not exceed 255 characters',

            'last_name.string' => 'Last name must be a string',
            'last_name.max' => 'Last name must not exceed 255 characters',

            'avatar.url' => 'Avatar must be a valid URL',

            'gender.in' => 'Gender must be either male or female',

            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'email.unique' => 'This email is already taken',

            'birthday.date' => 'Birthday must be a valid date',

            'phone.string' => 'Phone number must be a string',
            'phone.max' => 'Phone number must not exceed 20 characters',

            'nationality_id.exists' => __('auth::validation.nationality_exists'),
        ];
    }
}
