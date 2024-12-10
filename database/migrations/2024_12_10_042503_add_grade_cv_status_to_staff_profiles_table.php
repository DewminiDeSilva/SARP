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
        Schema::table('staff_profiles', function (Blueprint $table) {
            $table->string('grade')->nullable(); // Grade input
            $table->string('cv')->nullable(); // Path to uploaded CV
            $table->enum('status', ['in_service', 'resigned'])->default('in_service'); // Status toggle
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('staff_profiles', function (Blueprint $table) {
            $table->dropColumn('grade');
            $table->dropColumn('cv');
            $table->dropColumn('status');
        });
    }
};

