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
        Schema::create('c_d_f_members', function (Blueprint $table) {
            $table->id();
            $table->string("member_name");
            $table->string("member_nic");
            $table->string('address');
            $table->string("contact_number");
            $table->string('gender');
            $table->string("dob");
            $table->string('youth');
            $table->string('position'); // New field added here
            $table->string('representing_organization');
            $table->string('area')->nullable();
            // In the migration file for CDF Members
            $table->string('cdf_name')->nullable(); // Ensure this column is created
            $table->string('cdf_address')->nullable(); // Ensure this column is created


          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_d_f_members');
    }
};
