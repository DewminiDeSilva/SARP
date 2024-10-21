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
        Schema::create('nutrient_details', function (Blueprint $table) {
            $table->id();
            $table->string('program_type');
            $table->date('date');
            $table->string('location');
            $table->string('program_conductor');
            $table->decimal('cost_of_training_program', 10, 2);
            $table->string('province_name');
            $table->string('district_name');
            $table->string('ds_division_name');
            $table->string('gn_division_name');
            $table->string('asc_name');
            $table->string('cascade_name');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nutrient_details');
    }
};
