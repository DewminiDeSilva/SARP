<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fourp_training_participants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fourp_training_id');
            $table->string('name');
            $table->string('nic');
            $table->string('address_institution');
            $table->string('contact_number');
            $table->enum('gender', ['male', 'female']);
            $table->string('designation');
            $table->integer('age');
            $table->string('youth');
            $table->timestamps();

            $table->foreign('fourp_training_id')->references('id')->on('fourp_training_program')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fourp_training_participants');
    }
};
