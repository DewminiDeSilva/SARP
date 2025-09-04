<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('agro_forests', function (Blueprint $table) {
            $table->id();

            // Dropdowns (keep as plain IDs; index for speed)
            $table->string('river_basin')->nullable();
            $table->string('province_name')->nullable();
            $table->string('district')->nullable();
            $table->string('gn_division_name')->nullable();

            // "Tanks to forest re-planning spots" (three dropdowns)
           $table->string('tank_name')->nullable();
           $table->string('tank_name_2')->nullable();
           $table->string('tank_name_3')->nullable();

            // Core fields
            $table->string('replanting_forest_beat_name')->nullable();
            $table->decimal('number_of_hectares', 10, 2)->nullable();

            // GPS (lon/lat)
            $table->decimal('gps_longitude', 11, 7)->nullable();
            $table->decimal('gps_latitude', 10, 7)->nullable();

            // // Species + plants
            // // For simple cases you can store a single line:
            // $table->text('species_names')->nullable();              // comma-separated or JSON text
            // $table->unsignedInteger('no_of_plants')->nullable();    // total plants (if single value)

            // // For "Add more" (multiple rows), use these JSON arrays:
            // // e.g., [{"name":"Teak","count":500},{"name":"Mahogany","count":300}]
            // $table->json('species_rows')->nullable();

            // // Nursery locations: three inputs + ability to add more
            // $table->string('nursery_location_1')->nullable();
            // $table->string('nursery_location_2')->nullable();
            // $table->string('nursery_location_3')->nullable();
            // $table->json('nursery_locations_extra')->nullable();    // array of extra locations

            // Cost
            $table->decimal('establish_cost', 16, 2)->nullable();

            // Reforest project proposal (PDF upload path)
            $table->string('project_proposal_path')->nullable();

            $table->timestamps();
        });

           Schema::create('agro_forest_species', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agro_forest_id')
                  ->constrained('agro_forests')
                  ->onDelete('cascade');
            $table->string('species_name');
            $table->unsignedInteger('no_of_plants')->nullable();
            $table->timestamps();

            $table->index(['agro_forest_id', 'species_name']);
        });

         Schema::create('agro_forest_nurseries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agro_forest_id')
                  ->constrained('agro_forests')
                  ->onDelete('cascade');
            $table->string('location');
            $table->timestamps();

            $table->index(['agro_forest_id', 'location']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('agro_forests');
    }
};

