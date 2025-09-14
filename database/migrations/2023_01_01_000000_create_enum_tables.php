// database/migrations/2023_01_01_000000_create_enum_tables.php
<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        // Auth enums
        Schema::create('aal_levels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('code_challenge_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('factor_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('factor_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('oauth_registration_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('one_time_token_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // User enums
        Schema::create('user_roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('verification_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Listing enums
        Schema::create('employment_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('fuel_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('furnished_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('listing_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('listing_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('transmission_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Order enums
        Schema::create('order_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('payment_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Report enums
        Schema::create('report_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Realtime enums
        Schema::create('realtime_actions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('realtime_equality_ops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Insert enum values
        $this->insertEnumValues();
    }

    private function insertEnumValues()
    {
        // Auth enums
        DB::table('aal_levels')->insert([['name' => 'aal1'], ['name' => 'aal2'], ['name' => 'aal3']]);
        DB::table('code_challenge_methods')->insert([['name' => 's256'], ['name' => 'plain']]);
        DB::table('factor_statuses')->insert([['name' => 'unverified'], ['name' => 'verified']]);
        DB::table('factor_types')->insert([['name' => 'totp'], ['name' => 'webauthn'], ['name' => 'phone']]);
        DB::table('oauth_registration_types')->insert([['name' => 'dynamic'], ['name' => 'manual']]);
        DB::table('one_time_token_types')->insert([
            ['name' => 'confirmation_token'], ['name' => 'reauthentication_token'],
            ['name' => 'recovery_token'], ['name' => 'email_change_token_new'],
            ['name' => 'email_change_token_current'], ['name' => 'phone_change_token']
        ]);

        // User enums
        DB::table('user_roles')->insert([
            ['name' => 'user'], ['name' => 'seller'], ['name' => 'admin'], ['name' => 'moderator']
        ]);
        DB::table('verification_statuses')->insert([
            ['name' => 'none'], ['name' => 'pending'], ['name' => 'approved'], ['name' => 'rejected']
        ]);

        // Listing enums
        DB::table('employment_types')->insert([
            ['name' => 'full_time'], ['name' => 'part_time'], ['name' => 'contract'], ['name' => 'freelance']
        ]);
        DB::table('fuel_types')->insert([
            ['name' => 'petrol'], ['name' => 'diesel'], ['name' => 'electric'], ['name' => 'hybrid']
        ]);
        DB::table('furnished_types')->insert([
            ['name' => 'furnished'], ['name' => 'semi_furnished'], ['name' => 'unfurnished']
        ]);
        DB::table('listing_statuses')->insert([
            ['name' => 'draft'], ['name' => 'pending'], ['name' => 'published'],
            ['name' => 'archived'], ['name' => 'flagged'], ['name' => 'removed']
        ]);
        DB::table('listing_types')->insert([
            ['name' => 'product'], ['name' => 'property'], ['name' => 'vehicle'],
            ['name' => 'service'], ['name' => 'job'], ['name' => 'tender'], ['name' => 'request']
        ]);
        DB::table('transmission_types')->insert([
            ['name' => 'manual'], ['name' => 'automatic']
        ]);

        // Order enums
        DB::table('order_statuses')->insert([
            ['name' => 'pending'], ['name' => 'confirmed'], ['name' => 'shipped'],
            ['name' => 'delivered'], ['name' => 'cancelled']
        ]);
        DB::table('payment_statuses')->insert([
            ['name' => 'pending'], ['name' => 'completed'], ['name' => 'failed'], ['name' => 'refunded']
        ]);

        // Report enums
        DB::table('report_statuses')->insert([
            ['name' => 'open'], ['name' => 'processing'], ['name' => 'resolved']
        ]);

        // Realtime enums
        DB::table('realtime_actions')->insert([
            ['name' => 'INSERT'], ['name' => 'UPDATE'], ['name' => 'DELETE'],
            ['name' => 'TRUNCATE'], ['name' => 'ERROR']
        ]);
        DB::table('realtime_equality_ops')->insert([
            ['name' => 'eq'], ['name' => 'neq'], ['name' => 'lt'],
            ['name' => 'lte'], ['name' => 'gt'], ['name' => 'gte'], ['name' => 'in']
        ]);
    }

    public function down()
    {
        // Drop in reverse order
        Schema::dropIfExists('realtime_equality_ops');
        Schema::dropIfExists('realtime_actions');
        Schema::dropIfExists('report_statuses');
        Schema::dropIfExists('payment_statuses');
        Schema::dropIfExists('order_statuses');
        Schema::dropIfExists('transmission_types');
        Schema::dropIfExists('listing_types');
        Schema::dropIfExists('listing_statuses');
        Schema::dropIfExists('furnished_types');
        Schema::dropIfExists('fuel_types');
        Schema::dropIfExists('employment_types');
        Schema::dropIfExists('verification_statuses');
        Schema::dropIfExists('user_roles');
        Schema::dropIfExists('one_time_token_types');
        Schema::dropIfExists('oauth_registration_types');
        Schema::dropIfExists('factor_types');
        Schema::dropIfExists('factor_statuses');
        Schema::dropIfExists('code_challenge_methods');
        Schema::dropIfExists('aal_levels');
    }
};