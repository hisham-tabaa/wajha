// database/migrations/Listing/2023_01_01_020005_create_property_details_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('property_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('listing_id')->unique();
            $table->decimal('area_m2', 10, 2)->nullable();
            $table->integer('rooms_count')->nullable();
            $table->integer('bathrooms_count')->nullable();
            $table->integer('floor')->nullable();
            $table->integer('total_floors')->nullable();
            $table->unsignedBigInteger('furnished_type_id')->nullable();
            $table->integer('completion_percent')->nullable();
            $table->date('delivery_date')->nullable();
            $table->json('features')->nullable();
            $table->string('project_status')->nullable();
            $table->string('space_type')->nullable();
            $table->string('property_type')->nullable();
            $table->integer('building_age_years')->nullable();
            $table->string('legal_status')->nullable();
            $table->timestamps();

            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('cascade');
            $table->foreign('furnished_type_id')->references('id')->on('furnished_types');
        });
    }

    public function down()
    {
        Schema::dropIfExists('property_details');
    }
};