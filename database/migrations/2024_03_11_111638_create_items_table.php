<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cart_id');
            $table->integer('quantity');
            $table->decimal('total_price', 10, 2);
            // Thêm các cột khác của bảng (nếu có)
            $table->timestamps();

            // Tạo ràng buộc khóa ngoại
            $table->foreign('cart_id')->references('id')->on('carts');
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
}