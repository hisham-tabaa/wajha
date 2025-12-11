<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeaturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            // Main Features
            ['name_ar' => 'تدفئة مركزية', 'name_en' => 'Central Heating', 'type' => 'main'],
            ['name_ar' => 'مسبح خاص', 'name_en' => 'Private Pool', 'type' => 'main'],
            ['name_ar' => 'سطح كامل', 'name_en' => 'Full Roof', 'type' => 'main'],
            ['name_ar' => 'سكن شعسي', 'name_en' => 'Servant Quarter', 'type' => 'main'],
            ['name_ar' => 'طاقة شمسية', 'name_en' => 'Solar Energy', 'type' => 'main'],
            ['name_ar' => 'هاتف ارضي', 'name_en' => 'Landline Phone', 'type' => 'main'],
            ['name_ar' => 'بوابة', 'name_en' => 'Gate', 'type' => 'main'],

            // Other Features
            ['name_ar' => 'خزائن بوابة', 'name_en' => 'Gate Cabinets', 'type' => 'other'],
            ['name_ar' => 'موقف للسيارات', 'name_en' => 'Parking Lot', 'type' => 'other'],
            ['name_ar' => 'درج خارجي', 'name_en' => 'External Stairs', 'type' => 'other'],
            ['name_ar' => 'انترنت', 'name_en' => 'Internet', 'type' => 'other'],
            ['name_ar' => 'حديقة', 'name_en' => 'Garden', 'type' => 'other'],
        ];

        DB::table('features')->insert($features);
    }
}
