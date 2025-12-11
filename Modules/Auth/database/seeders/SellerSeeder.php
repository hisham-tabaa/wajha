<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Auth\Models\User;
use Spatie\Permission\Models\Role;

class SellerSeeder extends Seeder
{
    public function run(): void
    {
        // البحث عن دور Seller إذا كان موجوداً أو إنشاؤه
        $sellerRole = Role::firstOrCreate([
            'name' => 'seller',
        ], [
            'name_ar' => 'بائع',
            'name_en' => 'Seller',
            'policy' => 'seller',
            'guard_name' => 'web'
        ]);

        // إنشاء مستخدمين بائعين إذا لم يكونوا موجودين
        $sellers = [
            [
                'first_name' => 'ahmad',
                'last_name' => 'sel',
                'email' => 'ahmed@seller.com',
                'password' => '12345678', // نص عادي - سيتم تشفيره تلقائياً
                'role_id' => $sellerRole->id,
                'phone' => '0512345678',
                'confirmed_at' => now(),
            ],
            [
                'first_name' => 'mohamad',
                'last_name' => 'tar',
                'email' => 'seller2@example.com',
                'password' => '12345678', // نص عادي - سيتم تشفيره تلقائياً
                'role_id' => $sellerRole->id,
                'phone' => '0512345679',
                'confirmed_at' => now(),
            ],
        ];

        foreach ($sellers as $sellerData) {
            $seller = User::firstOrCreate(
                ['email' => $sellerData['email']],
                $sellerData
            );

            // تعيين الدور إذا لم يكن معيناً
            if (!$seller->hasRole('seller')) {
                $seller->assignRole($sellerRole);
            }
        }

        $this->command->info('تم التحقق من البائعين بنجاح!');
    }
}
