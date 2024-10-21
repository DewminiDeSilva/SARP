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
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->string('district');
            $table->unsignedBigInteger('province_id');
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->timestamps();
        });

        // Insert provided data
        DB::table('districts')->insert([
            ['district' => 'Anuradhapura', 'province_id' => 7], // North Central
            ['district' => 'Puttalam', 'province_id' => 6], // North Western
            ['district' => 'Vavuniya', 'province_id' => 3], // Northern
            ['district' => 'Kurunegala', 'province_id' => 6], // North Western
            ['district' => 'Mannar', 'province_id' => 3], // Northern
            ['district' => 'Mathale', 'province_id' => 5], // Central
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('districts');
    }
};
