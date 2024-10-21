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
        if (!Schema::hasTable('families')) {
            Schema::create('families', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('beneficiary_id'); // Foreign key
                $table->string('name_with_initials'); // Changed from first_name and last_name
                $table->string('phone');
                $table->string('gender');
                $table->string('dob');
                $table->string('nic'); // New column for family member NIC
                $table->string('youth');
                $table->string('education');
                $table->string('income_source'); // Changed from employment
                $table->decimal('income', 10, 2); // New field for income
                $table->string('nutrition_level');
                $table->timestamps();

                $table->foreign('beneficiary_id')->references('id')->on('beneficiaries')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('families');
    }
};
