<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficersTable extends Migration
{
    public function up()
    {
        Schema::create('officers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grievance_id');
            $table->string('name');
            $table->string('designation');
            $table->string('institution');
            $table->text('actions_taken');
            $table->date('action_taken_date');
            $table->string('status');
            $table->timestamps();

            $table->foreign('grievance_id')->references('id')->on('grievances')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('officers');
    }
}
