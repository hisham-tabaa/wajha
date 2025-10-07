// database/migrations/Listing/2023_01_01_020008_create_vehicle_details_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('vehicle_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('listing_id')->unique();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->integer('year')->nullable();
            $table->integer('mileage_km')->nullable();
            $table->unsignedBigInteger('fuel_type_id')->nullable();
            $table->unsignedBigInteger('transmission_type_id')->nullable();
            $table->string('color')->nullable();
            $table->integer('engine_cc')->nullable();
            $table->integer('seats')->nullable();
            $table->boolean('insurance_required')->default(false);
            $table->integer('allowed_rental_distance')->nullable();
            $table->integer('min_rent_days')->nullable();
            $table->string('price_per')->nullable();
            $table->string('vehicle_condition')->default('used');
            $table->string('registration_status')->nullable();
            $table->json('features')->nullable();
            $table->timestamps();

            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('cascade');
            $table->foreign('fuel_type_id')->references('id')->on('fuel_types');
            $table->foreign('transmission_type_id')->references('id')->on('transmission_types');
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicle_details');
    }
};
