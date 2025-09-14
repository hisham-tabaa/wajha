// database/migrations/Auth/2023_01_01_000002_create_audit_log_entries_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('audit_log_entries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('instance_id')->nullable();
            $table->json('payload')->nullable();
            $table->string('ip_address')->default('');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('audit_log_entries');
    }
};