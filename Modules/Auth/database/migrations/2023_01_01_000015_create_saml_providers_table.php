// database/migrations/Auth/2023_01_01_000012_create_saml_providers_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('saml_providers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('sso_provider_id');
            $table->text('entity_id')->unique();
            $table->text('metadata_xml');
            $table->text('metadata_url')->nullable();
            $table->json('attribute_mapping')->nullable();
            $table->string('name_id_format')->nullable();
            $table->timestamps();

            $table->foreign('sso_provider_id')->references('id')->on('sso_providers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('saml_providers');
    }
};