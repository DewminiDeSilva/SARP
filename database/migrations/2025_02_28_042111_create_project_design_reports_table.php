<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('project_design_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('version')->unique();
            $table->string('file_path'); // Store the file path
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_design_reports');
    }
};
