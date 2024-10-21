<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; 

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cascades', function (Blueprint $table) {
            $table->id();
            $table->string('cascade_name');
            
        });
    

    DB::table('cascades')->insert([
        ['cascade_name' => 'N/A'],
        ['cascade_name' => 'Manankattiya'],
        ['cascade_name' => 'Kuda Halmillawa Ela'],
        ['cascade_name' => 'Tambiriyawa'],
        ['cascade_name' => 'Dumminnegama'],
        ['cascade_name' => 'Kardan Kulam'],
        ['cascade_name' => 'Lidawewa'],
        ['cascade_name' => 'Medawachchiya Wewa'],
        ['cascade_name' => 'Sangilikanadarawa'],
        ['cascade_name' => 'Pulleiliya'],
        ['cascade_name' => 'Nawak Kulam'],
        ['cascade_name' => 'Kidewaran Kulam'],
        ['cascade_name' => 'Boo Oya'],
        ['cascade_name' => 'Katukeliyawa'],
        ['cascade_name' => 'malvatu m̆baya'],
        ['cascade_name' => 'Galpoththegama'],
        ['cascade_name' => 'Pahala Moragollagama wewa'],
        ['cascade_name' => 'Kawarakkulama'],
        ['cascade_name' => 'Horuwila Wewa'],
        ['cascade_name' => 'Kapiriggama Wewa'],
        ['cascade_name' => 'Pihimbiyagollewa Wewa'],
        ['cascade_name' => 'Labunoruwa Wewa'],
        ['cascade_name' => 'Siyambalawatta'],
        ['cascade_name' => 'Individual tank.-12'],
        ['cascade_name' => 'Maha wewa'],
        ['cascade_name' => 'E /Alankulama'],
        ['cascade_name' => 'Merungoda'],
        ['cascade_name' => 'Wagayamaduwa'],
        ['cascade_name' => 'Kadawala wewa'],
        ['cascade_name' => 'Achirigama'],
        ['cascade_name' => 'Individual tank.-2'],
        ['cascade_name' => 'Kuruluwewa'],
        ['cascade_name' => 'Kal Aru Sub water shed'],
        ['cascade_name' => 'Nedungkaraichenaikulam'],
        ['cascade_name' => 'Koolankulam'],
        ['cascade_name' => 'Sinnasippikulam'],
        ['cascade_name' => 'Kankankulam'],
        ['cascade_name' => 'Kirishthavakulam'],
        ['cascade_name' => 'Musalkuththikulam'],
        ['cascade_name' => 'Mullikulam'],
        ['cascade_name' => 'Cheddikulam'],
        ['cascade_name' => 'Udaiyarkulam'],
        ['cascade_name' => 'Nochchikulam'],
        ['cascade_name' => 'Nithikulam'],
        ['cascade_name' => 'Ranoruwa'],
        ['cascade_name' => 'Kattaragama'],
        ['cascade_name' => 'Palukadawala Wewa'],
        ['cascade_name' => 'Atharagalla'],
        ['cascade_name' => 'Nahettikulama'],
        ['cascade_name' => 'Andara wewa'],
        ['cascade_name' => 'Gampola Wewa'],
        ['cascade_name' => 'Mawathagama'],
        ['cascade_name' => 'Pothuwepitiya (makulla gaha mula)'],
        ['cascade_name' => 'Mahagale Wewa'],
        ['cascade_name' => 'Mamunugama'],
        ['cascade_name' => 'Adaikkalamoddai'],
        ['cascade_name' => 'Sinnaudaippu'],
        ['cascade_name' => 'Kandal kulam'],
        ['cascade_name' => 'Alankulam'],
        ['cascade_name' => 'SP Potkerni'],
        ['cascade_name' => 'Ithikulam'],
        ['cascade_name' => 'Sadayappan'],
        ['cascade_name' => 'Paliyadikulam'],
        ['cascade_name' => 'Thandikulam'],
        ['cascade_name' => 'Koolankulam'],
        ['cascade_name' => 'Alankam'],
        ['cascade_name' => 'Sonaka nedunkulam'],
        ['cascade_name' => '14th Mile'],
        ['cascade_name' => '11th Mile'],
        ['cascade_name' => '12th Mile'],
        ['cascade_name' => '13th Mile'],
        ['cascade_name' => 'Issaimalaithalvu'],
        ['cascade_name' => 'Kovilkulam'],
        ['cascade_name' => 'Individual tank']
    ]);


}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cascades');
    }
};
