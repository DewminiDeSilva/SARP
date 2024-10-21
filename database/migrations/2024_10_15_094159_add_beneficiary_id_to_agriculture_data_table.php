<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
/*
class AddBeneficiaryIdToAgricultureDataTable extends Migration
{
    /**
     * Run the migrations.
     */
    /*public function up(): void
    {
        Schema::table('agriculture_data', function (Blueprint $table) {
            $table->unsignedBigInteger('beneficiary_id')->nullable()->after('id');
            $table->foreign('beneficiary_id')->references('id')->on('beneficiaries')->onDelete('cascade');
        });
        if (!Schema::hasColumn('agriculture_data', 'beneficiary_id')) {
            Schema::table('agriculture_data', function (Blueprint $table) {
                $table->unsignedBigInteger('beneficiary_id')->nullable()->after('id');
            })
    }

    /**
     * Reverse the migrations.
     */
    /*public function down(): void
    {
        Schema::table('agriculture_data', function (Blueprint $table) {
            $table->dropForeign(['beneficiary_id']);
            $table->dropColumn('beneficiary_id');
        });
    }
}
    <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;*/

class AddBeneficiaryIdToAgricultureDataTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Check if the 'beneficiary_id' column already exists before adding it
        if (!Schema::hasColumn('agriculture_data', 'beneficiary_id')) {
            Schema::table('agriculture_data', function (Blueprint $table) {
                $table->unsignedBigInteger('beneficiary_id')->nullable()->after('id');
                $table->foreign('beneficiary_id')->references('id')->on('beneficiaries')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agriculture_data', function (Blueprint $table) {
            $table->dropForeign(['beneficiary_id']);
            $table->dropColumn('beneficiary_id');
        });
    }
}

