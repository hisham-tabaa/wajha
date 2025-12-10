<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('nationalties', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->timestamps();
        });

        Schema::create('phone_codes', function (Blueprint $table) {
            $table->id();
            $table->string('country_name_en');
            $table->string('country_name_ar');
            $table->string('phone_code');
            $table->timestamps();
        });

        $this->insertEnumValues();
    }

    private function insertEnumValues()
    {
        DB::table('nationalties')->insert([
            ['name_en' => 'Saudi', 'name_ar' => 'سعودي'],
            ['name_en' => 'Egyptian', 'name_ar' => 'مصري'],
            ['name_en' => 'Emirati', 'name_ar' => 'إماراتي'],
            ['name_en' => 'Jordanian', 'name_ar' => 'أردني'],
            ['name_en' => 'Kuwaiti', 'name_ar' => 'كويتي'],
            ['name_en' => 'Bahraini', 'name_ar' => 'بحريني'],
            ['name_en' => 'Qatari', 'name_ar' => 'قطري'],
            ['name_en' => 'Omani', 'name_ar' => 'عماني'],
            ['name_en' => 'Yemeni', 'name_ar' => 'يمني'],
            ['name_en' => 'Iraqi', 'name_ar' => 'عراقي'],
            ['name_en' => 'Syrian', 'name_ar' => 'سوري'],
            ['name_en' => 'Lebanese', 'name_ar' => 'لبناني'],
            ['name_en' => 'Palestinian', 'name_ar' => 'فلسطيني'],
            ['name_en' => 'American', 'name_ar' => 'أمريكي'],
            ['name_en' => 'British', 'name_ar' => 'بريطاني'],
            ['name_en' => 'Canadian', 'name_ar' => 'كندي'],
            ['name_en' => 'Australian', 'name_ar' => 'أسترالي'],
            ['name_en' => 'Indian', 'name_ar' => 'هندي'],
            ['name_en' => 'Pakistani', 'name_ar' => 'باكستاني'],
            ['name_en' => 'Filipino', 'name_ar' => 'فلبيني'],
        ]);

        DB::table('phone_codes')->insert([
            ['country_name_en' => 'Saudi Arabia', 'country_name_ar' => 'السعودية', 'phone_code' => '+966'],
            ['country_name_en' => 'Egypt', 'country_name_ar' => 'مصر', 'phone_code' => '+20'],
            ['country_name_en' => 'United Arab Emirates', 'country_name_ar' => 'الإمارات', 'phone_code' => '+971'],
            ['country_name_en' => 'Jordan', 'country_name_ar' => 'الأردن', 'phone_code' => '+962'],
            ['country_name_en' => 'Kuwait', 'country_name_ar' => 'الكويت', 'phone_code' => '+965'],
            ['country_name_en' => 'Bahrain', 'country_name_ar' => 'البحرين', 'phone_code' => '+973'],
            ['country_name_en' => 'Qatar', 'country_name_ar' => 'قطر', 'phone_code' => '+974'],
            ['country_name_en' => 'Oman', 'country_name_ar' => 'عمان', 'phone_code' => '+968'],
            ['country_name_en' => 'Yemen', 'country_name_ar' => 'اليمن', 'phone_code' => '+967'],
            ['country_name_en' => 'Iraq', 'country_name_ar' => 'العراق', 'phone_code' => '+964'],
            ['country_name_en' => 'Syria', 'country_name_ar' => 'سوريا', 'phone_code' => '+963'],
            ['country_name_en' => 'Lebanon', 'country_name_ar' => 'لبنان', 'phone_code' => '+961'],
            ['country_name_en' => 'Palestine', 'country_name_ar' => 'فلسطين', 'phone_code' => '+970'],
            ['country_name_en' => 'United States', 'country_name_ar' => 'الولايات المتحدة', 'phone_code' => '+1'],
            ['country_name_en' => 'United Kingdom', 'country_name_ar' => 'المملكة المتحدة', 'phone_code' => '+44'],
            ['country_name_en' => 'Canada', 'country_name_ar' => 'كندا', 'phone_code' => '+1'],
            ['country_name_en' => 'Australia', 'country_name_ar' => 'أستراليا', 'phone_code' => '+61'],
            ['country_name_en' => 'India', 'country_name_ar' => 'الهند', 'phone_code' => '+91'],
            ['country_name_en' => 'Pakistan', 'country_name_ar' => 'باكستان', 'phone_code' => '+92'],
            ['country_name_en' => 'Philippines', 'country_name_ar' => 'الفلبين', 'phone_code' => '+63'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('nationalties');
        Schema::dropIfExists('phone_codes');
    }
};
