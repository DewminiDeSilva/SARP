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
        Schema::create('logframe_indicators', function (Blueprint $table) {
            $table->id();
            $table->string('section_key')->index(); // e.g., 'outreach', 'project-goal', 'dev-obj', etc.
            $table->string('indicator_name');
            $table->text('indicator_description');
            $table->string('indicator_type')->default('number'); // number, percentage, etc.
            
            // Meta data
            $table->unsignedInteger('baseline')->default(0);
            $table->unsignedInteger('mid_term')->default(0);
            $table->unsignedInteger('end_target')->default(0);
            $table->string('source')->nullable();
            $table->string('frequency')->nullable();
            $table->string('responsibility')->nullable();
            $table->text('assumptions')->nullable();
            
            // Yearly targets and results (JSON format for flexibility)
            $table->json('yearly_targets')->nullable(); // {2024: 100, 2025: 150, ...}
            $table->json('yearly_results')->nullable(); // {2024: 95, 2025: 120, ...}
            
            $table->timestamps();
            
            // Indexes for better performance
            $table->index(['section_key', 'indicator_name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logframe_indicators');
    }
};
