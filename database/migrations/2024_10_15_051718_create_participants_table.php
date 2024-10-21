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
            $table->id();
            $table->unsignedBigInteger('training_id')->nullable();
            $table->string('name')->nullable();
            $table->string('nic')->nullable();
            $table->string('address_institution')->nullable(); // Changed from 'address' to 'address/institution'
            $table->string('contact_number')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('designation')->nullable(); // New field for Designation
            $table->integer('age')->nullable(); // New field for Age
            $table->string('youth')->nullable(); // New field for Youth Status
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('training_id')->references('id')->on('training_program')->onDelete('cascade');
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
