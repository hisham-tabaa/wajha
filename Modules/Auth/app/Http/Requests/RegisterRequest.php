<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    // TODO Validation from Migration the coulmns   Note:From Awad TO RANIA
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'first_name'       => 'required|string|max:100',
            'last_name'        => 'nullable|string|max:100',
            'email'            => 'required|email|max:255|unique:users,email',
            'password'         => 'required|string|min:8', 
           

        ];
    }
     public function messages()
    {
        return [
            'first_name.required' => 'الاسم الأول هو حقل مطلوب.',
            'first_name.string' => 'الاسم الأول يجب أن يكون نصًا.',
            'first_name.max' => 'الاسم الأول يجب أن لا يتجاوز 255 حرفًا.',
            
            'last_name.required' => 'الاسم الأخير هو حقل مطلوب.',
            'last_name.string' => 'الاسم الأخير يجب أن يكون نصًا.',
            'last_name.max' => 'الاسم الأخير يجب أن لا يتجاوز 255 حرفًا.',
            
            'email.required' => 'البريد الإلكتروني هو حقل مطلوب.',
            'email.email' => 'البريد الإلكتروني يجب أن يكون عنوان بريد إلكتروني صالح.',
            'email.unique' => 'البريد الإلكتروني الذي أدخلته موجود بالفعل.',
            
            'password.required' => 'كلمة المرور هي حقل مطلوب.',
            'password.string' => 'كلمة المرور يجب أن تكون نصًا.',
            'password.min' => 'كلمة المرور يجب أن تحتوي على 8 أحرف على الأقل.',
        ];
    }


    
}