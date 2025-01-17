<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateKurunegalaTable extends Migration
{
    public function up()
    {
        Schema::table('kurunegala', function (Blueprint $table) {
            $table->string('image_path')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('kurunegala', function (Blueprint $table) {
            $table->string('image_path')->nullable(false)->change(); // Revert back if necessary
        });
    }
}




