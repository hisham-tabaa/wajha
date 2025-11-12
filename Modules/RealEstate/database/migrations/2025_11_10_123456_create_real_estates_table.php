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
        Schema::create('real_estates', function (Blueprint $table) {
            $table->id();

            // Nullable foreign key to users table
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();

            // Publisher name (could be company or individual)
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
            $table->string('rent_type')->nullable(); // e.g., "monthly", "yearly"

            // Other information
            $table->string('rate_allowed_for')->nullable(); // e.g., "families", "bachelors"
            $table->string('city')->nullable();

            // Space in square meters
            $table->decimal('space', 10, 2)->nullable();

            // Real estate characteristics
            $table->string('brushes_status')->nullable(); // e.g., "furnished", "unfurnished"
            $table->string('facade')->nullable(); // e.g., "north", "south"
            $table->string('type')->nullable(); // e.g., "apartment", "villa"

            // Counters with default values
            $table->unsignedInteger('number_of_rooms')->default(0);
            $table->unsignedInteger('number_of_bathrooms')->default(0);
            $table->unsignedInteger('floor')->default(0);

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
        Schema::dropIfExists('real_estates');
    }
};
