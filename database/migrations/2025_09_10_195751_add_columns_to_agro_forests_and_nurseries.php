<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Update agro_forests table
        Schema::table('agro_forests', function (Blueprint $table) {
            $table->string('gn_division_name_2')->nullable()->after('gn_division_name');
            $table->string('gn_division_name_3')->nullable()->after('gn_division_name_2');
            $table->string('ds_division_name')->nullable()->after('district');
            $table->unsignedInteger('no_of_trees_plans')->nullable()->after('number_of_hectares');
            $table->decimal('paid_amount', 16, 2)->nullable()->after('establish_cost');
        });

        // Update agro_forest_nurseries table
        Schema::table('agro_forest_nurseries', function (Blueprint $table) {
            $table->unsignedInteger('number_of_plants')->nullable()->after('location');
        });
    }

    public function down(): void
    {
        Schema::table('agro_forests', function (Blueprint $table) {
            $table->dropColumn([
                'gn_division_name_2',
                'gn_division_name_3',
                'ds_division_name',
                'no_of_trees_plans',
                'paid_amount'
            ]);
        });

        Schema::table('agro_forest_nurseries', function (Blueprint $table) {
            $table->dropColumn('number_of_plants');
        });
    }
};
