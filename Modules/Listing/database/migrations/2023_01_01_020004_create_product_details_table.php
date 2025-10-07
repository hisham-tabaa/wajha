// database/migrations/Listing/2023_01_01_020004_create_product_details_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('listing_id')->unique();
            $table->string('sku')->nullable();
            $table->integer('stock_quantity')->nullable();
            $table->decimal('weight', 10, 2)->nullable();
            $table->json('dimensions')->nullable();
            $table->json('shipping_info')->nullable();
            $table->string('condition')->default('new');
            $table->decimal('weight_kg', 10, 2)->nullable();
            $table->timestamps();

            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_details');
    }
};
