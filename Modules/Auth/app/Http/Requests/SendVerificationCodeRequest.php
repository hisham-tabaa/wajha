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
            'email' => 'required|email|max:100',
        ];
    }


    public function messages(): array
    {
        return [
            'email.required'=>'The Email is required',
            'email.email'=>'The Field Shoud Be Email',
            'email.max'=>'The Email Must Be Less Than 100 Character ',
        ];
    }
}
