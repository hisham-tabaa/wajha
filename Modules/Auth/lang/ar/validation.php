<?php
return [
    //register and login  validation
    'first_name_required' => 'الاسم الأول مطلوب.',
    'first_name_string'   => 'الاسم الأول يجب أن يكون نصًا.',
    'first_name_max'      => 'الاسم الأول يجب ألا يتجاوز :max حرفًا.',
    'last_name_string'    => 'الاسم الأخير يجب أن يكون نصًا.',
    'last_name_max'       => 'الاسم الأخير يجب ألا يتجاوز :max حرفًا.',
    'email_required'      => 'البريد الإلكتروني مطلوب.',
    'email_email'         => 'البريد الإلكتروني يجب أن يكون عنوان بريد إلكتروني صالحًا.',
    'email_unique'        => 'البريد الإلكتروني المدخل موجود بالفعل.',
    'email_max' => 'البريد الإلكتروني يجب ألا يتجاوز :max حرف.',
    'password_required'   => 'كلمة المرور مطلوبة.',
    'password_string'     => 'كلمة المرور يجب أن تكون نصًا.',
    'password_min'        => 'كلمة المرور يجب أن تحتوي على :min أحرف على الأقل.',
    'email_not_exists' => 'هذا البريد الإلكتروني غير مسجل.',

    //end register and login validation

    //verification code and reset passwd
    'code_required' => 'رمز التحقق مطلوب.',
    'code_string' => 'يجب أن يكون رمز التحقق نصياً.',
    'password_confirmed' => 'كلمة المرور وتأكيدها غير متطابقتين.',
    // end verification reset passwd

    //update profile
    'avatar_url' => 'الصورة الشخصية يجب أن تكون رابط صالح.',
    'gender_in' => 'الجنس يجب أن يكون ذكر أو أنثى.',
    'birthday_date' => 'تاريخ الميلاد يجب أن يكون تاريخ صالح.',
    'phone_string' => 'رقم الهاتف يجب أن يكون نصاً.',
    'phone_max' => 'رقم الهاتف يجب ألا يتجاوز :max حرف.',
    'nationality_exists' => 'الجنسية المحددة غير موجودة.',
    'email_unique_update' => 'البريد الإلكتروني مستخدم من قبل مستخدم آخر.',
    //end update profile
    // google auth
    'id_token_required' => 'رمز تعريف Google مطلوب.',
    'id_token_string' => 'رمز تعريف Google يجب أن يكون نصاً صالحاً.',

    //end google auth

    //role
    'role_id_required' => 'معرف الدور مطلوب.',
    'role_id_exists' => 'الدور المحدد غير موجود أو غير مسموح به.',
    'attributes' => [
        'role_id' => 'معرف الدور',
    ],


];
