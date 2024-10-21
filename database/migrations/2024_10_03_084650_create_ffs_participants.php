<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ffs_participants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ffs_training_id'); // Foreign key column
            $table->string('name');
            $table->string('nic');
            $table->string('address_institution');
            $table->string('contact_number');
            $table->enum('gender', ['male', 'female']);
            $table->string('designation');
            $table->integer('age');
            $table->string('youth');
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('ffs_training_id')->references('id')->on('ffs_training_program')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ffs_participants');
    }
};

