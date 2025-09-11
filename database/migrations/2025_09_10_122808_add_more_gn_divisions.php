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
        //  if (!Schema::hasTable('gn_divisions')){
        // Schema::create('gn_divisions', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('gn_division_name');
        //     $table->unsignedBigInteger('d_s_division_id');
        //     $table->foreign('d_s_division_id')->references('id')->on('d_s_division_id')->onDelete('cascade');

        // });

        DB::table('gn_divisions')->insert([

   
    ['gn_division_name' => 'Aluthgama', 'd_s_division_id' => 31],
    ['gn_division_name' => 'Hirallugama', 'd_s_division_id' => 1],
    ['gn_division_name' => 'Helambagaswewa', 'd_s_division_id' => 31],
    ['gn_division_name' => 'Kasamaduwa', 'd_s_division_id' => 6],
    ['gn_division_name' => 'Anekattiya', 'd_s_division_id' => 1],
    ['gn_division_name' => 'Medagama', 'd_s_division_id' => 2],
    ['gn_division_name' => 'Meemalwewa', 'd_s_division_id' => 2],
    ['gn_division_name' => 'Sembukulama', 'd_s_division_id' => 3],
    ['gn_division_name' => 'Thuppitiyawa', 'd_s_division_id' => 31],

    ['gn_division_name' => 'Siyabalagashena', 'd_s_division_id' => 32],
   ['gn_division_name' => 'Wadatta', 'd_s_division_id' => 32],

   ['gn_division_name' => 'Girilla', 'd_s_division_id' => 35],
   ['gn_division_name' => 'Hidogama', 'd_s_division_id' => 35],
   ['gn_division_name' => 'Hulawa', 'd_s_division_id' => 35],
   ['gn_division_name' => 'Maha Krinda B', 'd_s_division_id' => 35],
   ['gn_division_name' => 'Moragaswewa', 'd_s_division_id' => 33],
   ['gn_division_name' => 'Olupeliyawea', 'd_s_division_id' => 34],
   ['gn_division_name' => 'Pahalagama', 'd_s_division_id' => 33],
   ['gn_division_name' => 'Sirisethagama', 'd_s_division_id' => 35],
   ['gn_division_name' => 'Yakadapatha', 'd_s_division_id' => 35],

    ['gn_division_name' => 'Valkkaipettankandal', 'd_s_division_id' => 24],
    ['gn_division_name' => 'Achchankulam', 'd_s_division_id' => 24],
    ['gn_division_name' => 'Maluvarayan Kaddaiwadampan', 'd_s_division_id' => 36],
    ['gn_division_name' => 'Nanattan', 'd_s_division_id' => 24],
    ['gn_division_name' => 'Palaikuli', 'd_s_division_id' => 25],
    
    ['gn_division_name' => 'Urulewa', 'd_s_division_id' => 28],
    ['gn_division_name' => 'Galagama', 'd_s_division_id' => 28],



]);

    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
