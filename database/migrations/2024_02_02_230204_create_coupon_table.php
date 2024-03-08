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
        Schema::create('coupon', function (Blueprint $table) {
            $table->id();
            $table->string("coupon_name");
            $table->string("coupon_date_start")->date();
            $table->string("coupon_date_end")->date();
            $table->string("coupon_code");
            $table->string("coupon_number");
            $table->integer("coupon_time");
            $table->string("coupon_condition");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon');
    }
};
