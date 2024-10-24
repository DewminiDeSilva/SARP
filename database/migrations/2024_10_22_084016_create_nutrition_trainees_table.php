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
                $table->unsignedBigInteger('nutrition_id'); // This matches the type of id in nutrient_details (bigIncrements)
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

                // Composite unique constraint on nic and nutrition_id
                $table->unique(['nic', 'nutrition_id']);

                // Foreign key constraint
                $table->foreign('nutrition_id')
                      ->references('id')
                      ->on('nutrient_details')  // Make sure the table name is correct
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
