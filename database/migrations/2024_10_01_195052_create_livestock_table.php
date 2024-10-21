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
        // Create the 'livestocks' table
        Schema::create('livestocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('beneficiary_id')->constrained()->onDelete('cascade');
            $table->string('livestock_type');
            $table->string('production_focus');
            $table->decimal('total_livestock_area', 10, 2);
            $table->decimal('total_cost', 10, 2);
            $table->text('inputs');
            
            $table->string('gn_division_name');
            $table->decimal('total_number_of_acres', 10, 2);
            $table->date('livestock_commencement_date'); // Field for the start date of livestock activities
            $table->timestamps();
        });

        // Create the 'live_products' table
        Schema::create('live_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('livestock_id')->constrained('livestocks')->onDelete('cascade');
            $table->string('product_name')->nullable(); // Product details are not required
            $table->decimal('total_production', 10, 2)->nullable(); // Marked as nullable
            $table->decimal('total_income', 10, 2)->nullable(); // Marked as nullable
            $table->decimal('profit', 10, 2)->nullable(); // Marked as nullable
            $table->timestamps();
        });

        // Create the 'live_contributions' table
        Schema::create('live_contributions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('livestock_id')->constrained('livestocks')->onDelete('cascade');
            $table->string('contribution_type')->nullable(); // Marked as nullable
            $table->decimal('cost', 10, 2)->nullable(); // Marked as nullable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('live_contributions');
        Schema::dropIfExists('live_products');
        Schema::dropIfExists('livestocks');
    }
};
