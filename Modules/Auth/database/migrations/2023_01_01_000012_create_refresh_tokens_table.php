// database/migrations/Auth/2023_01_01_000011_create_refresh_tokens_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('refresh_tokens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('instance_id')->nullable();
            $table->string('token')->unique();
            $table->string('user_id')->nullable();
            $table->boolean('revoked')->default(false);
            $table->string('parent')->nullable();
            $table->uuid('session_id')->nullable();
            $table->timestamps();

            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('refresh_tokens');
    }
};