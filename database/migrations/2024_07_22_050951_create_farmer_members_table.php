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
        Schema::create('farmer_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('farmerorganization_id'); // Updated to match the error
            $table->string('member_name');
            $table->string('member_id');
            $table->string('member_position');
            $table->string('contact_number');
            $table->string('address');
            $table->string('gender');
            $table->string('dob');
            $table->string('youth');
            $table->timestamps();

            $table->foreign('farmerorganization_id')->references('id')->on('farmer_organizations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmer_members');
    }
};
