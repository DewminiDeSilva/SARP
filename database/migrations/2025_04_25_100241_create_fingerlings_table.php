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
        Schema::create('fingerlings', function (Blueprint $table) {
            $table->id();

            // Foreign key to tank_rehabilation table
            $table->unsignedBigInteger('tank_id');

            // 🐟 Stocking Details JSON: [{ stocking_date, variety, stock_number }]
            $table->json('stocking_details')->nullable();

            // 🌾 Harvest Details JSON: [{ harvest_date, variety, variety_harvest_kg }]
            $table->json('harvest_details')->nullable();

            // 📊 Community distribution and financials
            $table->decimal('community_distribution_kg', 10, 2)->nullable();
            $table->decimal('amount_cumulative_kg', 10, 2)->nullable();
            $table->decimal('total_income_rs', 10, 2)->nullable();
            $table->decimal('wholesale_quantity_kg', 10, 2)->nullable(); // ✅ Newly added

            // 👨‍👩‍👧‍👦 Families benefited
            $table->integer('no_of_families_benefited')->nullable();

            $table->timestamps();

            // Foreign key constraint
            $table->foreign('tank_id')->references('id')->on('tank_rehabilation')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fingerlings');
    }
};
