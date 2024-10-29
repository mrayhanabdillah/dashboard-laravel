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
        Schema::create('guests', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('payment_id'); // UUID dari program
            $table->foreign('payment_id')->references('id')->on('payment_tickets')->onDelete('cascade');
            $table->string('username');
            $table->string('password');
            $table->enum('state',['Belum CheckIn','Sudah CheckIn'])->default('Belum CheckIn');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
