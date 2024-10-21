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
        Schema::create('tank_rehabilation', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('tank_id')->nullable(); // Nullable
            $table->string('tank_name')->nullable(); // Nullable
            $table->string('river_basin')->nullable(); // Nullable
            $table->string('cascade_name')->nullable(); // Nullable
            $table->string('province_name')->nullable(); // Nullable
            $table->string('district')->nullable(); // Nullable
            $table->string('ds_division_name')->nullable(); // Nullable
            $table->string('gn_division_name')->nullable(); // Nullable
            $table->string('as_centre')->nullable(); // Nullable
            $table->string('agency')->nullable(); // Nullable
            $table->string('no_of_family')->nullable(); // Nullable
            $table->string('longitude')->nullable(); // Nullable
            $table->string('latitude')->nullable(); // Nullable
            $table->string('progress')->nullable(); // Nullable
            $table->string('contractor')->nullable(); // Nullable
            $table->string('payment')->nullable(); // Nullable
            $table->string('eot')->nullable(); // Nullable
            $table->string('contract_period')->nullable(); // Nullable
            $table->string('status')->nullable(); // Nullable
            $table->string('remarks')->nullable(); // Nullable

            // New fields added as per your request
            $table->string('open_ref_no')->nullable();  // Open reference number
            $table->date('awarded_date')->nullable();  // Awarded date
            $table->decimal('cumulative_amount', 15, 2)->nullable();  // Cumulative amount
            $table->decimal('paid_advanced_amount', 15, 2)->nullable();  // Paid advanced amount
            $table->string('recommended_ipc_no')->nullable();  // Recommended IPC number
            $table->decimal('recommended_ipc_amount', 15, 2)->nullable();  // Recommended IPC amount

            // Handling multiple images (Pre-construction, During construction, Post-construction)
            $table->string('pre_construction_image')->nullable();  // Pre-construction image path
            $table->string('during_construction_image')->nullable();  // During-construction image path
            $table->string('post_construction_image')->nullable();  // Post-construction image path

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tank_rehabilation');
    }
};

