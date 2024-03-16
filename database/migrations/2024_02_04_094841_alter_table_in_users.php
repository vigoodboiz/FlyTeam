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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('role_id')->constrained();
            $table->string('phone');
            $table->string('profile_picture')->nullable();
            $table->string('otp')->nullable();
            $table->timestamp('otp_verified_at')->nullable();
            $table->timestamp('otp_expiry')->nullable();
            $table->string('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role_id');
            $table->dropColumn('phone');
            $table->dropColumn('profile_picture');
            $table->dropColumn('address');
            $table->dropColumn('otp');
            $table->dropColumn('otp_verified_at');
            $table->dropColumn('otp_expiry');
        });
    }
};