// database/migrations/Auth/2023_01_01_000010_create_one_time_tokens_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('one_time_tokens', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->unsignedBigInteger('token_type_id');
            $table->text('token_hash');
            $table->text('relates_to');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('token_type_id')->references('id')->on('one_time_token_types');
        });
    }

    public function down()
    {
        Schema::dropIfExists('one_time_tokens');
    }
};