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
            $table->foreignId('user_id')->constrained()->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('product_id')->constrained()->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('qty')->default(0);
            $table->integer('total')->default(0);
            $table->date('tgl_kirim')->nullable();
            $table->string('status')->default('diproses');
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
