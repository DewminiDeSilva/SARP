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
        if (!Schema::hasTable('farmer_organizations')){
        Schema::create('farmer_organizations', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number');
            $table->string('organization_name');
            $table->string('address');
            $table->string('registration_institute');
            $table->string('edate');
            $table->string('province_name');
            $table->string('district_name');
            $table->string('ds_division_name');
            $table->string('gn_division_name');
            $table->string('as_center');
            $table->string('tank_name');
            $table->string('cascade_name');
            $table->timestamps();
        });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmer_organizations');
    }
};
