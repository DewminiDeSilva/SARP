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
        Schema::create('training_program', function (Blueprint $table) {
            $table->id();
            $table->string('program_name');
            $table->string('date');
            $table->string('venue');  // Changed from 'place' to 'venue'
            $table->string('resource_person_name');  // Changed from 'conductor_name' to 'resource_person_name'
            $table->string('training_program_cost');  // Changed from 'conductor_payment' to 'training_program_cost'
            $table->string('resource_person_payment');  // New field added
            $table->string('province_name');
            $table->string('district');
            $table->string('ds_division_name');
            $table->string('gn_division_name');
            $table->string('as_center');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_program');
    }
};
