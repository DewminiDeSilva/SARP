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
        $table->string('gn_division_name')->nullable();
    });
}

public function down()
{
    Schema::table('agriculture_data', function (Blueprint $table) {
        $table->dropColumn('gn_division_name');
    });
}
};
