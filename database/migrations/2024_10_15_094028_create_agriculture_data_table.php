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
        // Create the agriculture_data table
        Schema::create('agriculture_data', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('crop_name');
            $table->string('crop_variety'); // Nullable crop variety column
            $table->date('planting_date'); // Nullable planting date column
            $table->string('inputs'); // Nullable inputs column
            $table->float('total_acres', 8, 2); // Integer total_acres
            $table->timestamps();
        });

        // Create the farmer_contribution table
        Schema::create('farmer_contributions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agriculture_data_id')
                  ->constrained('agriculture_data') // References the `agriculture_data` table
                  ->onDelete('cascade'); // Optional: cascade delete to remove contributions if agriculture data is deleted
            $table->string('farmer_contribution');
            $table->decimal('cost', 10, 2);
            $table->timestamps();
        });

        Schema::create('agricultur_products', function(Blueprint $table){
            $table->id();
            $table->foreignId('agriculture_data_id')
                   ->constrained('agriculture_data')
                   ->onDelete('cascade');
            $table->string('product_name');
            $table->decimal('total_production', 10, 2);
            $table->decimal('total_income', 10, 2);
            $table->decimal('profit', 10, 2);
            $table->timestamps();
        } );

        }




    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop farmer_contributions table first due to foreign key constraint
        Schema::dropIfExists('farmer_contributions');
        // Drop agriculture_data table
        Schema::dropIfExists('agriculture_data');
    }
};
