// database/migrations/Auth/2023_01_01_000014_create_schema_migrations_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('schema_migrations', function (Blueprint $table) {
            $table->string('version')->primary();
        });
    }

    public function down()
    {
        Schema::dropIfExists('schema_migrations');
    }
};