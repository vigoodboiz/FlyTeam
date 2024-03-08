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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('cart_id');
<<<<<<< HEAD
            $table->integer('product_id');
            $table->integer('total_price');
            $table->integer('quantity');
            $table->string('delivery_status')->default('Đang Xử Lý');
            $table->string('payment_status')->default('Đang Xác Nhận');
=======
            $table->foreign('cart_id')->references('id')->on('carts');
            $table->string('payment_status')->default('Đang Xác Nhận');
            $table->string('deleivery_status')->default('Đang Xử Lý');
>>>>>>> f9a4bb0406c1a2a100ebaf658ae85900c9147293
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};