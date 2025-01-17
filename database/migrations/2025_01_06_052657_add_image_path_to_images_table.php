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
    Schema::table('images', function (Blueprint $table) {
        $table->string('image_path')->after('album_name'); // Add the image_path column
    });
}

public function down()
{
    Schema::table('images', function (Blueprint $table) {
        $table->dropColumn('image_path'); // Rollback the column
    });
}

};
