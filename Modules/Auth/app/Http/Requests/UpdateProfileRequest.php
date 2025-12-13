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
            'first_name'    => 'required|string|max:100',
            'last_name'     => 'nullable|string|max:100',
            'avatar'        => 'nullable|url', // or 'image' if uploading
            'gender'        => 'nullable|in:male,female',
            'email'         => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->user()?->getKey()),
            ],
            'birthday'      => 'nullable|date',
            'phone'         => 'nullable|string|max:20',
            'nationalty_id' => 'nullable|exists:nationalties,id',
        ];
    }

    public function messages(): array
    {

        return [
            'first_name.required' => __('auth::validation.first_name_required'),
            'first_name.string'   => __('auth::validation.first_name_string'),
            'first_name.max'      => __('auth::validation.first_name_max', ['max' => 100]),

            'last_name.string'    => __('auth::validation.last_name_string'),
            'last_name.max'       => __('auth::validation.last_name_max', ['max' => 100]),

            'avatar.url'          => __('auth::validation.avatar_url'),

            'gender.in'           => __('auth::validation.gender_in'),

            'email.required'      => __('auth::validation.email_required'),
            'email.email'         => __('auth::validation.email_email'),
            'email.unique'        => __('auth::validation.email_unique_update'),

            'birthday.date'       => __('auth::validation.birthday_date'),

            'phone.string'        => __('auth::validation.phone_string'),
            'phone.max'           => __('auth::validation.phone_max', ['max' => 20]),

            'nationality_id.exists' => __('auth::validation.nationality_exists'),
        ];
    }
}
