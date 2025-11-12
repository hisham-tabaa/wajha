<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('google_id')->nullable();
            $table->string('avatar')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->unsignedBigInteger('role_id');
            $table->string('email');
            $table->string('password');
            $table->timestamp('last_sign_in_at')->nullable();
            $table->unsignedBigInteger('nationalty_id')->nullable();
            $table->timestamp('birthday')->nullable();
            $table->string('phone')->nullable();
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('role_id')->references('id')->on('roles')->cascadeOnDelete();
            $table->foreign('nationalty_id')->references('id')->on('nationalties')->cascadeOnDelete();
            $table->index('email');
            $table->index('role_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
