<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('livestock_training_participants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('livestock_training_id');
            $table->string('name');
            $table->string('nic');
            $table->string('address_institution');
            $table->string('contact_number');
            $table->string('gender', 20);
            $table->string('designation');
            $table->integer('age');
            $table->string('youth');
            $table->timestamps();

            $table->foreign('livestock_training_id', 'livestock_training_part_fk')->references('id')->on('livestock_training_program')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('livestock_training_participants');
    }
};
