// database/migrations/Auth/2023_01_01_000013_create_saml_relay_states_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('saml_relay_states', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('sso_provider_id');
            $table->text('request_id');
            $table->string('for_email')->nullable();
            $table->text('redirect_to')->nullable();
            $table->uuid('flow_state_id')->nullable();
            $table->timestamps();

            $table->foreign('sso_provider_id')->references('id')->on('sso_providers')->onDelete('cascade');
            $table->foreign('flow_state_id')->references('id')->on('flow_state')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('saml_relay_states');
    }
};