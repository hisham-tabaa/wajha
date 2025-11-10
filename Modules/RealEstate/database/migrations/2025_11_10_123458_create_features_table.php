<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar'); // اسم الميزة
            $table->string('name_en'); // اسم الميزة
            $table->enum('type', ['main', 'other'])->default('main'); // نوع الميزة: رئيسية أو أخرى
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('features');
    }
};
