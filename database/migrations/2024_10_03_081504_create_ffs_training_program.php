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
        Schema::create('ffs_training_program', function (Blueprint $table) {
            $table->id();
            $table->string('program_name');
            $table->string('program_number'); // New field for Program Number
            $table->string('crop_name'); // New field for Crop Name
            $table->string('date');
            $table->string('venue');  // Same as before
            $table->string('resource_person_name');  // Same as before
            $table->string('training_program_cost');  // Same as before
            $table->string('resource_person_payment');  // Same as before
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
        Schema::dropIfExists('ffs_training_program');
    }
};
