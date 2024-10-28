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
        Schema::create('participants', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('program_id'); // UUID dari program
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('restrict');
            $table->string('name');
            $table->string('photo');
            $table->string('origin');
            $table->date('dob');
            $table->string('pob');
            $table->text('description');
            $table->integer('votes')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
