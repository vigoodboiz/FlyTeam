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
            $table->string('user_code')->unique();
            $table->string('gender')->default('0');
            $table->string('phone');
            $table->string('profile_picture')->nullable();
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
            $table->dropColumn('user_code');
            $table->dropColumn('gender');
            $table->dropColumn('phone');
            $table->dropColumn('profile_picture');
            $table->dropColumn('address');
        });
    }
};