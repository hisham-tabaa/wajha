// database/migrations/Auth/2023_01_01_000007_create_mfa_challenges_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mfa_challenges', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('factor_id');
            $table->timestamp('verified_at')->nullable();
            $table->string('ip_address');
            $table->string('otp_code')->nullable();
            $table->json('web_authn_session_data')->nullable();
            $table->timestamps();

            $table->foreign('factor_id')->references('id')->on('mfa_factors')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mfa_challenges');
    }
};