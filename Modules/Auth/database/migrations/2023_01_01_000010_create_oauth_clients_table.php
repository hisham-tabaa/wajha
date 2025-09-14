// database/migrations/Auth/2023_01_01_000009_create_oauth_clients_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('oauth_clients', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('client_id')->unique();
            $table->text('client_secret_hash');
            $table->unsignedBigInteger('registration_type_id');
            $table->text('redirect_uris');
            $table->text('grant_types');
            $table->string('client_name', 1024)->nullable();
            $table->string('client_uri', 2048)->nullable();
            $table->string('logo_uri', 2048)->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            $table->foreign('registration_type_id')->references('id')->on('oauth_registration_types');
        });
    }

    public function down()
    {
        Schema::dropIfExists('oauth_clients');
    }
};