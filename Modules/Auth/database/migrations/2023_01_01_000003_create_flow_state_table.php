// database/migrations/Auth/2023_01_01_000003_create_flow_state_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('flow_state', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();
            $table->text('auth_code');
            $table->unsignedBigInteger('code_challenge_method_id');
            $table->text('code_challenge');
            $table->text('provider_type');
            $table->text('provider_access_token')->nullable();
            $table->text('provider_refresh_token')->nullable();
            $table->text('authentication_method');
            $table->timestamp('auth_code_issued_at')->nullable();
            $table->timestamps();

            $table->foreign('code_challenge_method_id')->references('id')->on('code_challenge_methods');
        });
    }

    public function down()
    {
        Schema::dropIfExists('flow_state');
    }
};