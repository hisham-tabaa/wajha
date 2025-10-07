// database/migrations/Order/2023_01_01_030003_create_payments_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->string('gateway');
            $table->string('gateway_transaction_id')->nullable();
            $table->json('gateway_response_json')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->decimal('amount', 15, 2);
            $table->string('currency')->default('SYP');
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('payment_statuses');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
