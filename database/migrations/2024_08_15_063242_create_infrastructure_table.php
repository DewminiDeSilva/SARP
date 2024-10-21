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
        Schema::create('infrastructure', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('type_of_infrastructure'); // Updated field
            $table->string('infrastructure_progress'); // Updated field
            $table->text('infrastructure_description'); // New field
            $table->string('river_basin');
            $table->string('cascade_name');
            $table->string('province_name');
            $table->string('district');
            $table->string('ds_division_name');
            $table->string('gn_division_name');
            $table->string('as_centre');
            $table->string('agency');
            $table->string('no_of_family');
            $table->string('longitude');
            $table->string('latitude');
            $table->string('contractor');
            $table->string('payment');
            $table->string('eot');
            $table->string('contract_period');
            $table->string('status');
            $table->string('remarks');
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infrastructure');
    }
};
