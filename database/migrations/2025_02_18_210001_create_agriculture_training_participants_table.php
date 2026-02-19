<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('agriculture_training_participants')) {
            Schema::create('agriculture_training_participants', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('agriculture_training_id');
                $table->string('name');
                $table->string('nic');
                $table->string('address_institution');
                $table->string('contact_number');
                $table->string('gender', 20);
                $table->string('designation');
                $table->integer('age');
                $table->string('youth');
                $table->timestamps();

                $table->foreign('agriculture_training_id', 'agri_training_part_fk')->references('id')->on('agriculture_training_program')->onDelete('cascade');
            });
        } else {
            try {
                Schema::table('agriculture_training_participants', function (Blueprint $table) {
                    $table->foreign('agriculture_training_id', 'agri_training_part_fk')->references('id')->on('agriculture_training_program')->onDelete('cascade');
                });
            } catch (\Throwable $e) {
                // FK may already exist (e.g. from fresh migrate)
            }
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('agriculture_training_participants');
    }
};
