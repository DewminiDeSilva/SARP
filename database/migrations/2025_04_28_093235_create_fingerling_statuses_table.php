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
        Schema::create('fingerling_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tank_id');
            $table->string('status')->nullable(); // status can be null initially
            $table->timestamps();
        
            $table->foreign('tank_id')->references('id')->on('tank_rehabilation')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fingerling_statuses');
    }
};
