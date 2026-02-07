<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Drop table if it was partially created with wrong schema so create_livestock_training_program can run.
     */
    public function up(): void
    {
        Schema::dropIfExists('livestock_training_program');
    }

    public function down(): void
    {
        // No-op
    }
};
