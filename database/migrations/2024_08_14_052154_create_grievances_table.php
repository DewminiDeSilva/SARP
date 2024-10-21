<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrievancesTable extends Migration
{
    public function up()
    {
        Schema::create('grievances', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nic');
            $table->string('address');
            $table->string('subject');
            $table->text('grievance_description');
            $table->string('contact_number');
            $table->string('province');
            $table->string('district');
            $table->string('dsd');
            $table->string('gnd');
            $table->string('asc');
            $table->string('cascade_name');
            $table->string('tank_name');
            $table->date('date_received');
            $table->string('sub_project_name');
            $table->string('sub_project_gn_division');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grievances');
    }
}
