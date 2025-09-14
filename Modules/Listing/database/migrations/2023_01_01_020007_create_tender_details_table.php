// database/migrations/Listing/2023_01_01_020007_create_tender_details_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tender_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('listing_id')->unique();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->json('attachments')->default('[]');
            $table->string('contact_email')->nullable();
            $table->string('application_link')->nullable();
            $table->timestamps();

            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tender_details');
    }
};