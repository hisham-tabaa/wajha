// database/migrations/Messaging/2023_01_01_040001_create_conversations_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('listing_id')->nullable();
            $table->uuid('participant1_id');
            $table->uuid('participant2_id');
            $table->string('subject')->nullable();
            $table->timestamp('last_message_at')->useCurrent();
            $table->timestamps();

            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('set null');
            $table->foreign('participant1_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('participant2_id')->references('id')->on('users')->onDelete('cascade');
            $table->index(['participant1_id', 'participant2_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('conversations');
    }
};