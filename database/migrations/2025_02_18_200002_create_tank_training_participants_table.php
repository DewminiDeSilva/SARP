<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tank_training_participants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tank_training_id');
            $table->string('name');
            $table->string('nic');
            $table->string('address_institution');
            $table->string('contact_number');
            $table->enum('gender', ['male', 'female']);
            $table->string('designation');
            $table->integer('age');
            $table->string('youth');
            $table->timestamps();

            $table->foreign('tank_training_id')->references('id')->on('tank_training_program')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tank_training_participants');
    }
};
