<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTotalAcresColumnInAgricultureDataTable extends Migration
{
    public function up()
    {
        Schema::table('agriculture_data', function (Blueprint $table) {
            $table->decimal('total_acres', 8, 2)->change();
        });
    }

    public function down()
    {
        Schema::table('agriculture_data', function (Blueprint $table) {
            $table->float('total_acres', 8, 2)->change();
        });
    }
}

