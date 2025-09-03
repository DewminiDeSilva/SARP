<?php

// database/migrations/2025_08_26_000000_create_progress_reports_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('progress_reports', function (Blueprint $table) {
            $table->id();

            // monthly | quarterly | annual
            $table->enum('type', ['monthly', 'quarterly', 'annual']);

            // Period fields (use nullable, only one set will be filled depending on 'type')
            $table->unsignedTinyInteger('period_month')->nullable();   // 1-12
            $table->unsignedTinyInteger('period_quarter')->nullable(); // 1-4
            $table->unsignedSmallInteger('period_year');               // 2021-2027 etc.

            // Meta
            $table->string('institution');           // requested "Insition" field as Institution
            $table->date('submission_date')->nullable();
            $table->string('file_path');             // storage path
            $table->unsignedInteger('version')->default(1); // auto per period

            $table->timestamps();

            // ✅ Use short names for indexes to avoid MySQL 64-char identifier limit
            $table->index(['type', 'period_year', 'period_month', 'period_quarter'], 'pr_idx');
            $table->unique(['type', 'period_year', 'period_month', 'period_quarter', 'version'], 'pr_uniq_ver');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('progress_reports');
    }
};
