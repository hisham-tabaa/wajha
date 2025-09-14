// database/migrations/Auth/2023_01_01_000016_create_sso_domains_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sso_domains', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('sso_provider_id');
            $table->string('domain');
            $table->timestamps();

            $table->foreign('sso_provider_id')->references('id')->on('sso_providers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sso_domains');
    }
};