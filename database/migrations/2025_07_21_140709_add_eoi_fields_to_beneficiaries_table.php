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
    Schema::table('beneficiaries', function (Blueprint $table) {
        $table->string('eoi_business_title')->nullable()->after('project_type');
        $table->string('eoi_category')->nullable()->after('eoi_business_title');
    });
}

public function down()
{
    Schema::table('beneficiaries', function (Blueprint $table) {
        $table->dropColumn('eoi_business_title');
        $table->dropColumn('eoi_category');
    });
}
};
