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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ad_id');
            $table->unsignedBigInteger('user_id');
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_phone_number');
            $table->string('user_city');
            $table->string('user_address');
            $table->string('price');
            $table->string('ad_title');
            $table->text('comment')->nullable();
            $table->boolean('is_approved')->default(false);
            $table->string('email');
            $table->string('phone');
            $table->string('name');
            $table->string('city');
            $table->string('address');
            $table->string('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
