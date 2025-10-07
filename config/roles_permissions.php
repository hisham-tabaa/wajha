<?php
return [
    'permissions' => [
        //User
        ['name' => 'update_profile', 'group' => 'user', 'group_en' => 'user', 'group_ar' => 'مستخدم', 'order' => 0, 'name_en' => 'update profile', 'name_ar' => 'تعديل الملف السخصي'],

    ],
    'roles' => [
        ['name' => 'admin', 'name_ar' => 'المدير', 'name_en' => 'Admin'],
        ['name' => 'user', 'name_ar' => 'مستخدم', 'name_en' => 'User'],
        ['name' => 'default', 'name_ar' => 'افتراضي', 'name_en' => 'Default'],
    ],


    'user' => ['update_profile'],
];
