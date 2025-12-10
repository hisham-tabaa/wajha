<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();

            // Nullable foreign key to users table
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();

            // Publisher name (could be dealer or individual)
            $table->string('publisher')->nullable();

            // Offer details
            $table->string('offer_type')->nullable(); // e.g., "sale", "rent"
            $table->string('main_address')->nullable();

            // Location coordinates
            $table->decimal('lat', 10, 7)->nullable(); // Latitude
            $table->decimal('lan', 10, 7)->nullable(); // Longitude

            // Pricing and payment details
            $table->decimal('price', 15, 2)->nullable();
            $table->string('payment_type')->nullable(); // e.g., "cash", "installment"
            $table->unsignedInteger('installment_years')->nullable(); // 1, 2, 3, 4 years
            $table->string('rent_type')->nullable(); // e.g., "monthly", "yearly"

            // City
            $table->string('city')->nullable();

            // Vehicle specifications
            $table->string('brand')->nullable(); // e.g., "Toyota", "BMW"
            $table->string('model')->nullable(); // e.g., "Corolla", "X5"
            $table->unsignedInteger('year')->nullable(); // Manufacturing year
            $table->string('color')->nullable(); // e.g., "black", "white"
            $table->string('transmission')->nullable(); // e.g., "automatic", "manual"
            $table->string('fuel_type')->nullable(); // e.g., "petrol", "diesel", "electric"
            $table->string('country_of_origin')->nullable();
            $table->unsignedInteger('cylinder')->nullable(); // 3, 4, 5, 6, 7, 8, 9, 10+
            $table->enum('insurance', ['mandatory', 'optional', 'comprehensive'])->nullable();
            $table->decimal('engine_capacity', 10, 2)->nullable();
            $table->unsignedInteger('power_horses')->nullable();

            // Vehicle condition and status
            $table->decimal('mileage', 10, 2)->nullable(); // Kilometers or miles
            $table->string('condition')->nullable(); // e.g., "new", "used", "refurbished"
            $table->string('body_type')->nullable(); // e.g., "sedan", "suv", "truck"

            // Vehicle features
            $table->unsignedInteger('number_of_seats')->default(0);
            $table->unsignedInteger('number_of_doors')->default(0);

            // Description field
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
