// database/migrations/Listing/2023_01_01_020006_create_service_details_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('service_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('listing_id')->unique();
            $table->string('delivery_time')->nullable();
            $table->string('service_area')->nullable();
            $table->integer('service_duration_minutes')->nullable();
            $table->string('service_location')->default('on_site');
            $table->string('cancellation_policy')->nullable();
            $table->json('availability_json')->nullable();
            $table->timestamps();

            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_details');
    }
};
