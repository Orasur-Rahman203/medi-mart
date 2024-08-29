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
            $table->string('name');
            $table->string('status')->default('pending');
            $table->text('address');
            $table->integer('mobile_no');
            $table->text('additional_info');
            $table->string('product_name');
            $table->integer('quantity');
            $table->integer('price');
            $table->string('prescription_image')->default('Null');
            $table->string('delivery_system');
            $table->unsignedBigInteger('user_id')->nullable;
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
