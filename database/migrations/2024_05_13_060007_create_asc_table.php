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
        Schema::create('asc', function (Blueprint $table) {
            $table->id();
            $table->string('asc_name');
        });

         // Insert the provided asc_centers
         $asc=[
            "Galenbidunuwewa",
"Elayapaththuwa",
"Thantimale",
"Athakada",
"Medawachchiya",
"Poonewa",
"Punewa",
"Mihinthale",
"Gambirigaswewa",
"Anuradhapura",
"Palugaswewa",
"Kallanchiya",
"Thirappane",
"Anamaduwa",
"Nawagaththegama",
"Serukele",
"Wanathawilluwa",
"Cheddikulam",    
"Kovilkulam",
"Kurukkalputhukulam",
"Madukanda",
"Ambanpola",
"Ehatuwewa",
"Maha Nanneriya",
"Galgamuwa",
"Thambuththa",
"Kobeigane",
"Rambe",
"Moragollagama",
"Uyilankulam",
"Manthai",
"potkerni",
"Silawathurai",
"P.P.Potkeny",
"Murunkan",
"Nanattan",
"Uyilankulam",
"Yatawatta",
"Walawela",
        ];

        foreach ($asc as $asc_name) {
            DB::table('asc')->insert([
                'asc_name' => $asc_name,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asc');
    }
};
