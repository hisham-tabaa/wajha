<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('real_estate_photos', function (Blueprint $table) {
            $table->id();

            // Foreign key to real_estates table
            $table->foreignId('real_estate_id')
                  ->constrained('real_estates')
                  ->cascadeOnDelete(); // لو تم حذف العقار، تحذف صوره تلقائياً

            // Photo path (يمكن حفظ المسار أو اسم الملف)
            $table->string('photo_path');

            // يمكن إضافة حقل لتحديد الصورة الأساسية للعقار
            $table->boolean('is_main')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('real_estate_photos');
    }
};
