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
        Schema::create('staff_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('staff_type'); // Type of staff
            $table->string('photo')->nullable(); // File path for photo
            $table->string('name_with_initials'); // Name with initials
            $table->string('nic_number')->unique(); // NIC number (unique)
            $table->string('designation'); // Designation
            $table->text('permanent_address'); // Permanent address
            $table->string('contact_number')->nullable(); // Contact number
            $table->string('mobile_fixed')->nullable(); // Mobile or fixed number
            $table->string('email_address')->nullable(); // Email address
            $table->date('date_of_birth'); // Date of birth
            $table->string('gender'); // Gender
            $table->string('w_and_op_number')->nullable(); // W and OP number (nullable)
            $table->string('highest_education_qualifications'); // Highest education qualifications
            $table->decimal('salary', 10, 2)->nullable(); // Salary (nullable)
            $table->date('salary_increment_date')->nullable(); // Salary increment date (nullable)
            $table->string('personal_file_number'); // Personal file number
            $table->string('appointment_letter')->nullable(); // File path for appointment letter
            $table->date('first_appointment_date'); // First appointment date
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_profiles');
    }
};
