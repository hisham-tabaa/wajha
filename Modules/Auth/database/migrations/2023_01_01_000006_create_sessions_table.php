// database/migrations/Auth/2023_01_01_000015_create_sessions_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->uuid('factor_id')->nullable();
            $table->unsignedBigInteger('aal_level_id')->nullable();
            $table->timestamp('not_after')->nullable();
            $table->timestamp('refreshed_at')->nullable();
            $table->text('user_agent')->nullable();
            $table->string('ip', 45)->nullable();
            $table->string('tag')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('aal_level_id')->references('id')->on('aal_levels');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sessions');
    }
};