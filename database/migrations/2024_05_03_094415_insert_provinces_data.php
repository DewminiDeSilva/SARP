<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing primary key column named `id`
            $table->string('name')->unique(); // Unique province name
            $table->timestamps(); // Creates `created_at` and `updated_at` columns
        });

        // Insert the provided provinces
        $provinces = [
            'Eastern',
            'Western',
            'Northern',
            'Southern',
            'Central',
            'North Western',
            'North Central',
            'Sabaragamuwa',
            'Uva'
        ];

        foreach ($provinces as $province) {
            DB::table('provinces')->insert(['name' => $province]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provinces');
    }
};