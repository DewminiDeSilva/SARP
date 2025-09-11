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
        Schema::create('ds_divisions', function (Blueprint $table) {
            $table->id();
            $table->string('division');
            $table->unsignedBigInteger('district_id');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->timestamps();
        });

// Insert provided data
DB::table('ds_divisions')->insert([
    // Anuradhapura (North Central)
    ['division' => 'Medawachchiya', 'district_id' => 1], 
    ['division' => 'Rambewa', 'district_id' => 1], 
    ['division' => 'Thirappane', 'district_id' => 1], 
    ['division' => 'Galenbidunuwewa', 'district_id' => 1], 
    ['division' => 'Palugaswewa', 'district_id' => 1], 
    ['division' => 'Mihintale', 'district_id' => 1], 
    ['division' => 'Mahavilachchiya', 'district_id' => 1], 
    ['division' => 'Na.Nu.Pa', 'district_id' => 1], 
    ['division' => 'Ma.Nu.Pa', 'district_id' => 1], 
    ['division' => 'Nuwaragam Palatha Central', 'district_id' => 1],
    //['division' => 'N.P.C', 'district_id' => 1],

    // Puttalam (North Western)
    ['division' => 'Wanathavilluwa', 'district_id' => 2], 
    ['division' => 'Pallama', 'district_id' => 2], 
    ['division' => 'Anamaduwa', 'district_id' => 2], 
    ['division' => 'Nawagaththegama', 'district_id' => 2],
    //['division' => 'Mahakumbukkadawala', 'district_id' => 2],

    // Vavuniya (Northern)
    ['division' => 'Vengalacheddikulam', 'district_id' => 3], 
    ['division' => 'Vavuniya', 'district_id' => 3], 
    ['division' => 'Vavuniya South', 'district_id' => 3],

    // Kurunegala (North Western)
    ['division' => 'Giribawa', 'district_id' => 4], 
    ['division' => 'Polpithigama', 'district_id' => 4], 
    ['division' => 'Galgamuwa', 'district_id' => 4], 
    ['division' => 'Ehetuwewa', 'district_id' => 4], 
    ['division' => 'Kobeigane', 'district_id' => 4], 
    ['division' => 'Ambanpola', 'district_id' => 4],
    // ['division' => 'Maho', 'district_id' => 4],
    // ['division' => 'Nikaweratiya', 'district_id' => 4],
    // ['division' => 'Kotawehera', 'district_id' => 4],

    // Mannar (Northern)
    ['division' => 'Nanattan', 'district_id' => 5], 
    ['division' => 'Manthai West', 'district_id' => 5], 
    ['division' => 'Musali', 'district_id' => 5], 
    ['division' => 'Mannar Town', 'district_id' => 5],
    // ['division' => 'Madhu', 'district_id' => 5],

    // Mathale (Central)
    ['division' => 'Yatawatta', 'district_id' => 6], 
    ['division' => 'Dambulla', 'district_id' => 6], 
    ['division' => 'Galewela', 'district_id' => 6],
]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ds_divisions');
    }
};