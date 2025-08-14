<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
    public function up()
    {
        Schema::table('expressions_of_interest', function (Blueprint $table) {
            $table->string('eoi_code')->nullable()->after('id');
        });
    }

    public function down()
    {
        Schema::table('expressions_of_interest', function (Blueprint $table) {
            $table->dropColumn('eoi_code');
        });
    }
};

