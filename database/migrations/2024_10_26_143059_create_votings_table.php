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
        Schema::create('votings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('program_id'); // UUID dari program
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->uuid('participant_id'); // UUID dari program
            $table->foreign('participant_id')->references('id')->on('participants')->onDelete('cascade');
            $table->uuid('voteType_id'); // UUID dari program
            $table->foreign('voteType_id')->references('id')->on('vote_types')->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('proof_payment');
            $table->enum('state',['pending','success'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votings');
    }
};
