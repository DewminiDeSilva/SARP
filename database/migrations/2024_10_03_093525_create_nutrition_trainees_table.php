<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('nutrition_trainees')) {
            Schema::create('nutrition_trainees', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('nutrition_id'); // Ensure this matches the primary key type of nutrient_details
                $table->string('nic');
                $table->string('full_name');
                $table->string('address');
                $table->date('dob');
                $table->string('gender');
                $table->string('age');
                $table->string('mobile_number');
                $table->string('income_level');
                $table->string('education_level');
                $table->text('special_remark')->nullable();
                $table->timestamps();

                // Foreign key constraint
                $table->foreign('nutrition_id')
                      ->references('id')
                      ->on('nutrition_details')
                      ->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nutrition_trainees');
    }
};
