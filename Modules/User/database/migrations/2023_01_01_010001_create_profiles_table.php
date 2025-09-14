// database/migrations/User/2023_01_01_010001_create_profiles_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->unique();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('avatar_url')->nullable();
            $table->unsignedBigInteger('user_role_id')->default(1);
            $table->unsignedBigInteger('verification_status_id')->default(1);
            $table->timestamp('verification_requested_at')->nullable();
            $table->text('bio')->nullable();
            $table->string('company_name')->nullable();
            $table->decimal('rating_avg', 3, 2)->default(0);
            $table->integer('ratings_count')->default(0);
            $table->json('work_hours')->nullable();
            $table->uuid('business_address_id')->nullable();
            $table->json('specialties')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_role_id')->references('id')->on('user_roles');
            $table->foreign('verification_status_id')->references('id')->on('verification_statuses');
        });
    }

    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};