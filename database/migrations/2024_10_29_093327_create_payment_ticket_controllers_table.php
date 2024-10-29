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
        Schema::create('payment_tickets', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->uuid('ticket_id'); // UUID dari program
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
            $table->uuid('program_id'); // UUID dari program
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->string('proof_payments');
            $table->boolean('state')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_tickets');
    }
};
