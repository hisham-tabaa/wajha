<?php
// database/migrations/2024_01_01_000001_create_categories_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name_ar'); // Arabic name
            $table->string('name_en')->nullable(); // English name
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->string('color')->default('#ff0000');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->foreignId('parent_id')->nullable()->constrained('categories')->onDelete('cascade');
            $table->timestamps();

            $table->index(['parent_id', 'is_active']);
            $table->index('sort_order');
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
