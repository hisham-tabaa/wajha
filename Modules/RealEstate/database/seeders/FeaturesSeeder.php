<?php

namespace Modules\RealEstate\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\RealEstate\Models\Feature;
use Illuminate\Support\Facades\DB;

class FeaturesSeeder extends Seeder
{
    public function run(): void
    {
        $features = [
            // الميزات الرئيسية
            ['name_ar' => 'مسبح', 'name_en' => 'Swimming Pool', 'type' => 'main'],
            ['name_ar' => 'جراج', 'name_en' => 'Garage', 'type' => 'main'],
            ['name_ar' => 'حديقة', 'name_en' => 'Garden', 'type' => 'main'],
            ['name_ar' => 'مصعد', 'name_en' => 'Elevator', 'type' => 'main'],
            ['name_ar' => 'تكييف مركزي', 'name_en' => 'Central AC', 'type' => 'main'],
            ['name_ar' => 'موقف سيارات', 'name_en' => 'Parking', 'type' => 'main'],
            ['name_ar' => 'شرفة', 'name_en' => 'Balcony', 'type' => 'main'],
            ['name_ar' => 'تأثيث فاخر', 'name_en' => 'Luxury Furniture', 'type' => 'main'],

            // ميزات أخرى
            ['name_ar' => 'انترنت', 'name_en' => 'Internet', 'type' => 'other'],
            ['name_ar' => 'أمن 24 ساعة', 'name_en' => '24/7 Security', 'type' => 'other'],
            ['name_ar' => 'صالة ألعاب رياضية', 'name_en' => 'Gym', 'type' => 'other'],
            ['name_ar' => 'غرفة ساونا', 'name_en' => 'Sauna Room', 'type' => 'other'],
            ['name_ar' => 'تراس', 'name_en' => 'Terrace', 'type' => 'other'],
            ['name_ar' => 'نظام إنذار', 'name_en' => 'Alarm System', 'type' => 'other'],
            ['name_ar' => 'كاميرات مراقبة', 'name_en' => 'CCTV', 'type' => 'other'],
            ['name_ar' => 'خدمة تنظيف', 'name_en' => 'Cleaning Service', 'type' => 'other'],
        ];

        foreach ($features as $feature) {
            Feature::firstOrCreate(
                ['name_ar' => $feature['name_ar']],
                $feature
            );
        }

        $this->command->info('تم إنشاء الميزات بنجاح!');
    }
}
