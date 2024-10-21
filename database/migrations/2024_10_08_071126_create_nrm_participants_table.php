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
        Schema::create('nrm_participants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nrm_training_id'); // Foreign key column
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
            $table->foreign('nrm_training_id')->references('id')->on('nrm_training_program')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nrm_participants');
    }
};
