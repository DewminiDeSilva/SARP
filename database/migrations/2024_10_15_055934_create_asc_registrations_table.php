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
        Schema::create('asc_registrations', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('province_name')->nullable(); // Province name can be null
            $table->string('district_name')->nullable(); // District name can be null
            $table->string('ds_division_name')->nullable(); // DS Division name can be null
            $table->string('gn_division_name')->nullable(); // GN Division name can be null
            $table->string('as_center')->nullable(); // AS Center name can be null
            $table->string('asc_name')->nullable(); // ASC name can be null
            // $table->string('asc_id')->unique(); // Uncomment if 'asc_id' needs to be unique
            $table->string('officer_incharge')->nullable(); // Officer in charge can be null
            $table->string('contact_email', 255)->nullable(); // Email can be null, 255 character limit
            $table->string('contact_number', 15)->nullable(); // Phone number can be null, 15 character limit (adjust if needed)
            $table->text('services_available')->nullable(); // Services available can be null, stored as text for larger data
            $table->timestamps(); // Laravel's created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asc_registrations'); // Drop the table if it exists
    }
};
