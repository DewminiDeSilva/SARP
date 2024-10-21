<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShareholdersTable extends Migration
{
    public function up()
    {
        Schema::create('shareholders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agro_id')->constrained('agros')->onDelete('cascade');
            $table->string('name');
            $table->enum('position', ['Chairman', 'Director', 'Executive Committee', 'Shareholder']);
            $table->string('nic');
            $table->enum('gender', ['Male', 'Female']);
            $table->date('date_of_birth');
            $table->string('age');
            $table->string('contact_number');
            $table->integer('number_of_shares');
            $table->decimal('share_capital', 15, 2);
            $table->enum('current_status', ['Active', 'Inactive']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shareholders');
    }
}
