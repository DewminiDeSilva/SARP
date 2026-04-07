<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('feeder_road_developments', function (Blueprint $table) {
            $table->id();
            $table->string('feeder_road_id')->nullable();
            $table->string('feeder_road_name')->nullable();
            $table->string('type_of_feeder_road')->nullable();
            $table->string('feeder_road_progress')->nullable();
            $table->string('river_basin')->nullable();
            $table->string('cascade_name')->nullable();
            $table->string('province_name')->nullable();
            $table->string('district')->nullable();
            $table->string('ds_division_name')->nullable();
            $table->string('gn_division_name')->nullable();
            $table->string('as_centre')->nullable();
            $table->string('agency')->nullable();
            $table->string('no_of_family')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('contractor')->nullable();
            $table->string('payment')->nullable();
            $table->string('eot')->nullable();
            $table->string('contract_period')->nullable();
            $table->string('status')->nullable();
            $table->string('remarks')->nullable();
            $table->string('open_ref_no')->nullable();
            $table->date('awarded_date')->nullable();
            $table->decimal('cumulative_amount', 15, 2)->nullable();
            $table->decimal('paid_advanced_amount', 15, 2)->nullable();
            $table->string('recommended_ipc_no')->nullable();
            $table->decimal('recommended_ipc_amount', 15, 2)->nullable();
            $table->string('pre_construction_image')->nullable();
            $table->string('during_construction_image')->nullable();
            $table->string('post_construction_image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feeder_road_developments');
    }
};
