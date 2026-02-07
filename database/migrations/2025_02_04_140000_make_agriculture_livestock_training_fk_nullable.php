<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('agriculture_training_program', function (Blueprint $table) {
            $table->dropForeign(['agriculture_data_id']);
            $table->unsignedBigInteger('agriculture_data_id')->nullable()->change();
            $table->foreign('agriculture_data_id')->references('id')->on('agriculture_data')->onDelete('cascade');
        });
        Schema::table('livestock_training_program', function (Blueprint $table) {
            $table->dropForeign(['livestock_id']);
            $table->unsignedBigInteger('livestock_id')->nullable()->change();
            $table->foreign('livestock_id')->references('id')->on('livestocks')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('agriculture_training_program', function (Blueprint $table) {
            $table->dropForeign(['agriculture_data_id']);
            $table->unsignedBigInteger('agriculture_data_id')->nullable(false)->change();
            $table->foreign('agriculture_data_id')->references('id')->on('agriculture_data')->onDelete('cascade');
        });
        Schema::table('livestock_training_program', function (Blueprint $table) {
            $table->dropForeign(['livestock_id']);
            $table->unsignedBigInteger('livestock_id')->nullable(false)->change();
            $table->foreign('livestock_id')->references('id')->on('livestocks')->onDelete('cascade');
        });
    }
};
