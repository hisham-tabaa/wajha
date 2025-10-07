// database/migrations/Order/2023_01_01_030001_create_orders_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->unsignedBigInteger('buyer_id');
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('status_id')->default(1);
            $table->decimal('total_amount', 15, 2);
            $table->string('currency')->default('SYP');
            $table->unsignedBigInteger('shipping_address_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->unsignedBigInteger('payment_status_id')->default(1);
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('buyer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('shipping_address_id')->references('id')->on('addresses')->onDelete('set null');
            $table->foreign('status_id')->references('id')->on('order_statuses');
            $table->foreign('payment_status_id')->references('id')->on('payment_statuses');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
