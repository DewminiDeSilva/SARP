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
        Schema::create('cdfs', function (Blueprint $table) {
            
            $table->id();
            $table->string("province_name");
            $table->string("district_name");
            $table->string("ds_division_name");
            $table->string("gn_division_name");
            $table->string("as_center");
            $table->string('cascade_name'); // New field added here
            $table->string('cdf_name');
            $table->string('cdf_address');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cdfs');
    }
};
