// database/migrations/Auth/2023_01_01_000008_create_mfa_factors_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mfa_factors', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->string('friendly_name')->nullable();
            $table->unsignedBigInteger('factor_type_id');
            $table->unsignedBigInteger('status_id');
            $table->text('secret')->nullable();
            $table->string('phone')->nullable();
            $table->timestamp('last_challenged_at')->nullable()->unique();
            $table->json('web_authn_credential')->nullable();
            $table->uuid('web_authn_aaguid')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('factor_type_id')->references('id')->on('factor_types');
            $table->foreign('status_id')->references('id')->on('factor_statuses');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mfa_factors');
    }
};