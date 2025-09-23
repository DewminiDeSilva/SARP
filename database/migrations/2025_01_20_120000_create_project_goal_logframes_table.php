<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('project_goal_logframes', function (Blueprint $table) {
            $table->id();
            $table->string('indicator_key')->index();     // e.g., 'project_goal_income', 'project_goal_food_security'
            $table->unsignedSmallInteger('year')->index();
            $table->unsignedInteger('year_target')->default(0);
            $table->unsignedInteger('year_result')->default(0);

            // Meta (duplicated per row for simplicity)
            $table->unsignedInteger('baseline')->default(0);
            $table->unsignedInteger('mid_term')->default(0);
            $table->unsignedInteger('end_target')->default(0);
            $table->string('source')->nullable();          // Reference studies, FIES assessment, etc.
            $table->string('frequency')->nullable();       // Baseline, MTR, End-line
            $table->string('responsibility')->nullable();  // PMU
            $table->text('assumptions')->nullable();

            $table->timestamps();

            $table->unique(['indicator_key', 'year']);    // one record per indicator per year
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_goal_logframes');
    }
};

