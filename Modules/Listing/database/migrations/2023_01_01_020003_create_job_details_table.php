// database/migrations/Listing/2023_01_01_020003_create_job_details_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('job_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('listing_id')->unique();
            $table->string('job_title')->nullable();
            $table->unsignedBigInteger('employment_type_id')->nullable();
            $table->decimal('salary_min', 15, 2)->nullable();
            $table->decimal('salary_max', 15, 2)->nullable();
            $table->string('salary_type')->nullable();
            $table->integer('experience_years')->nullable();
            $table->string('education_level')->nullable();
            $table->json('languages')->nullable();
            $table->boolean('cv_required')->default(false);
            $table->string('application_link')->nullable();
            $table->string('application_email')->nullable();
            $table->json('attachments')->default('[]');
            $table->string('job_condition')->default('new');
            $table->timestamps();

            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('cascade');
            $table->foreign('employment_type_id')->references('id')->on('employment_types');
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_details');
    }
};
