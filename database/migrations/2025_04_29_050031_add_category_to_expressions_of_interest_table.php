<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryToExpressionsOfInterestTable extends Migration
{
    public function up()
    {
        Schema::table('expressions_of_interest', function (Blueprint $table) {
            $table->string('category')->nullable()->after('status'); 
            // You can place it after 'status' or anywhere else you want
        });
    }

    public function down()
    {
        Schema::table('expressions_of_interest', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
}
