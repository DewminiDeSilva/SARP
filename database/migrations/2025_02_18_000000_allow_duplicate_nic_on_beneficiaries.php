<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Allow multiple beneficiary records with the same NIC (for CSV upload and index display).
     */
    public function up(): void
    {
        try {
            Schema::table('beneficiaries', function (Blueprint $table) {
                $table->dropUnique(['nic']);
            });
        } catch (\Throwable $e) {
            // Index may already be missing or have different name (e.g. already migrated)
            if (strpos($e->getMessage(), '1091') === false && strpos($e->getMessage(), 'check that it exists') === false) {
                throw $e;
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('beneficiaries', function (Blueprint $table) {
            $table->unique('nic');
        });
    }
};
