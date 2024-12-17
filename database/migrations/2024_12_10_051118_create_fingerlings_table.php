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
            $table->unsignedBigInteger('tank_id'); // Foreign key referencing tank_rehabilation.id
            $table->string('livestock_type');
            $table->string('stocking_type');
            $table->date('stocking_date');
            $table->json('stocking_details')->nullable();
            $table->date('harvest_date')->nullable();
            $table->decimal('variety_harvest_kg', 10, 2)->nullable();
            $table->decimal('amount_cumulative_kg', 10, 2)->nullable();
            $table->decimal('unit_price_rs', 10, 2)->nullable();
            $table->decimal('total_income_rs', 10, 2)->nullable();
            $table->decimal('wholesale_quantity_kg', 10, 2)->nullable();
            $table->decimal('wholesale_unit_price_rs', 10, 2)->nullable();
            $table->decimal('wholesale_total_income_rs', 10, 2)->nullable();
            $table->timestamps();

            // Define foreign key constraint
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
