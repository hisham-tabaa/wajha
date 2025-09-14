// database/migrations/Auth/2023_01_01_000001_create_users_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('instance_id')->nullable();
            $table->string('aud')->nullable();
            $table->string('role')->nullable();
            $table->string('email')->nullable();
            $table->string('encrypted_password')->nullable();
            $table->timestamp('email_confirmed_at')->nullable();
            $table->timestamp('invited_at')->nullable();
            $table->string('confirmation_token')->nullable();
            $table->timestamp('confirmation_sent_at')->nullable();
            $table->string('recovery_token')->nullable();
            $table->timestamp('recovery_sent_at')->nullable();
            $table->string('email_change_token_new')->nullable();
            $table->string('email_change')->nullable();
            $table->timestamp('email_change_sent_at')->nullable();
            $table->timestamp('last_sign_in_at')->nullable();
            $table->json('raw_app_meta_data')->nullable();
            $table->json('raw_user_meta_data')->nullable();
            $table->boolean('is_super_admin')->default(false);
            $table->string('phone')->unique()->nullable();
            $table->timestamp('phone_confirmed_at')->nullable();
            $table->string('phone_change')->default('');
            $table->string('phone_change_token')->default('');
            $table->timestamp('phone_change_sent_at')->nullable();
            $table->timestamp('confirmed_at')->nullable();
            $table->string('email_change_token_current')->default('');
            $table->smallInteger('email_change_confirm_status')->default(0);
            $table->timestamp('banned_until')->nullable();
            $table->string('reauthentication_token')->default('');
            $table->timestamp('reauthentication_sent_at')->nullable();
            $table->boolean('is_sso_user')->default(false);
            $table->softDeletes();
            $table->boolean('is_anonymous')->default(false);
            $table->timestamps();

            $table->index('instance_id');
            $table->index('email');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};