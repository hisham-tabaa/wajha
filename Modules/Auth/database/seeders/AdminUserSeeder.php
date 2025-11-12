<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Auth\Models\User;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // تحقق من وجود دور "admin" أو أنشئه
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // تحقق من وجود المستخدم بالفعل
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@wajha.com'], // البريد الإلكتروني الفريد
            [
                'first_name' => 'Admin',
                'last_name' => 'User',
                'password' => 'password123', // سيتم تشفيره تلقائيًا في setPasswordAttribute
                'role_id' => $adminRole->id,
                'confirmed_at' => now(),
            ]
        );
        $userUser = User::firstOrCreate(
            ['email' => 'user@wajha.com'], // البريد الإلكتروني الفريد
            [
                'first_name' => 'User',
                'last_name' => 'User',
                'password' => 'password123', // سيتم تشفيره تلقائيًا في setPasswordAttribute
                'role_id' => $userRole->id,
                'confirmed_at' => now(),
            ]
        );

        // إذا لم يتم ربط الدور بعد
        if (! $adminUser->hasRole('admin')) {
            $adminUser->assignRole('admin');
        }
        if (! $userUser->hasRole('user')) {
            $userUser->assignRole('user');
        }

        $this->command->info('Admin user created successfully.');
    }
}
