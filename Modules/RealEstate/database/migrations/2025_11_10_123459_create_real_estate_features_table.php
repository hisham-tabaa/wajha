<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('real_estate_features', function (Blueprint $table) {
            $table->id();

            $table->foreignId('real_estate_id')
                  ->constrained('real_estates')
                  ->cascadeOnDelete();

            $table->foreignId('feature_id')
                  ->constrained('features')
                  ->cascadeOnDelete();

            $table->timestamps();

            $table->unique(['real_estate_id', 'feature_id']); // منع التكرار
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('real_estate_features');
    }
};
