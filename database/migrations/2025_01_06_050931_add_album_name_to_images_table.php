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
        $table->string('album_name')->after('folder_id')->nullable(); // Add album_name column
    });
}

public function down()
{
    Schema::table('images', function (Blueprint $table) {
        $table->dropColumn('album_name'); // Drop album_name column if rolled back
    });
}
};
