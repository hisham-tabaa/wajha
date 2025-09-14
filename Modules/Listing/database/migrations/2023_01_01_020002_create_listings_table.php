// database/migrations/Listing/2023_01_01_020002_create_listings_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('seller_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->unsignedBigInteger('listing_type_id');
            $table->unsignedBigInteger('status_id')->default(1);
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->string('currency')->default('SYP');
            $table->string('city')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->json('images')->default('[]');
            $table->json('attributes')->nullable();
            $table->boolean('featured')->default(false);
            $table->integer('view_count')->default(0);
            $table->boolean('is_negotiable')->default(false);
            $table->string('area')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->integer('images_count')->default(0);
            $table->integer('favorites_count')->default(0);
            $table->timestamps();

            $table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('subcategory_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('listing_type_id')->references('id')->on('listing_types');
            $table->foreign('status_id')->references('id')->on('listing_statuses');
        });
    }

    public function down()
    {
        Schema::dropIfExists('listings');
    }
};
