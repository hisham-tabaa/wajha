<?php
return [
    'permissions' => [

        // Role
        ['name' => 'read_all_roles', 'group' => 'role', 'group_en' => 'Users Management | Roles', 'group_ar' => 'إدارة المستخدمين | الادوار',  'order' => 0, 'name_ar' => 'عرض', 'name_en' => 'Read'],
        ['name' => 'create_role', 'group' => 'role', 'group_en' => 'Users Management | Roles', 'group_ar' => 'إدارة المستخدمين | الادوار',  'order' => 0, 'name_ar' => 'إضافة', 'name_en' => 'Create'],
        ['name' => 'update_role', 'group' => 'role', 'group_en' => 'Users Management | Roles', 'group_ar' => 'إدارة المستخدمين | الادوار',  'order' => 0, 'name_ar' => 'تعديل', 'name_en' => 'Update'],
        ['name' => 'delete_role', 'group' => 'role', 'group_en' => 'Users Management | Roles', 'group_ar' => 'إدارة المستخدمين | الادوار',  'order' => 0, 'name_ar' => 'حذف', 'name_en' => 'Delete'],



        //User
        ['name' => 'update_profile', 'group' => 'user', 'group_en' => 'user', 'group_ar' => 'مستخدم', 'order' => 1, 'name_en' => 'update profile', 'name_ar' => 'تعديل الملف السخصي'],


    ],
    'roles' => [
        ['name' => 'admin', 'name_ar' => 'المدير', 'name_en' => 'Admin'],
        ['name' => 'user', 'name_ar' => 'مستخدم', 'name_en' => 'User'],
        ['name' => 'default', 'name_ar' => 'افتراضي', 'name_en' => 'Default'],
    ],


    'user' => ['update_profile'],
];
