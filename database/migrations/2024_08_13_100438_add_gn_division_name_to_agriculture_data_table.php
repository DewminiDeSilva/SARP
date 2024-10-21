<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('agriculture_data', function (Blueprint $table) {
            $table->string('gn_division_name')->after('beneficiary_id'); // Add the column after beneficiary_id
        });
    }

    public function down(): void {
        Schema::table('agriculture_data', function (Blueprint $table) {
            $table->dropColumn('gn_division_name');
        });
    }
};
