<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('agriculture_data', function (Blueprint $table) {
        $table->unsignedBigInteger('beneficiary_id')->nullable()->after('gn_division_name');

        // If there's a beneficiaries table and foreign key is needed:
        // $table->foreign('beneficiary_id')->references('id')->on('beneficiaries')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('agriculture_data', function (Blueprint $table) {
        $table->dropColumn('beneficiary_id');
    });
}
};
