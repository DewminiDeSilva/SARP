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
        if (!Schema::hasTable('gn_divisions')){
        Schema::create('gn_divisions', function (Blueprint $table) {
            $table->id();
            $table->string('gn_division_name');
            $table->unsignedBigInteger('d_s_division_id');
            $table->foreign('d_s_division_id')->references('id')->on('d_s_division_id')->onDelete('cascade');

        });

       // Insert provided data
DB::table('gn_divisions')->insert([

    ['gn_division_name' => 'Medawachchiya', 'd_s_division_id' => 1],
    ['gn_division_name' => 'Kebithigollewa', 'd_s_division_id' => 1],
    ['gn_division_name' => 'Thalawa', 'd_s_division_id' => 1],
    ['gn_division_name' => 'Horowpathana', 'd_s_division_id' => 1],
    ['gn_division_name' => 'Nochchiyagama', 'd_s_division_id' => 1],
    //['gn_division_name' => 'Aluthgama', 'd_s_division_id' => 1],

    ['gn_division_name' => 'Rambewa', 'd_s_division_id' => 2],
    //['gn_division_name' => 'Hirallugama', 'd_s_division_id' => 2],


    ['gn_division_name' => 'Thirappane', 'd_s_division_id' => 3],
    // ['gn_division_name' => 'Helambagaswewa', 'd_s_division_id' => 3],
    

    ['gn_division_name' => 'Galenbidunuwewa', 'd_s_division_id' => 4],

    ['gn_division_name' => 'Palugaswewa', 'd_s_division_id' => 5],

    ['gn_division_name' => 'Mihintale', 'd_s_division_id' => 6],

    ['gn_division_name' => 'Mahavilachchiya', 'd_s_division_id' => 7],

    ['gn_division_name' => 'Na.Nu.Pa', 'd_s_division_id' => 8],

    ['gn_division_name' => '73 - Kidagalegama', 'd_s_division_id' => 1],
    ['gn_division_name' => 'Lindawewa', 'd_s_division_id' => 1],
    ['gn_division_name' => 'Karambankulama', 'd_s_division_id' => 1],
    ['gn_division_name' => 'Lindawewa', 'd_s_division_id' => 1],
    ['gn_division_name' => '68 Madawachchiya East', 'd_s_division_id' => 1],
    ['gn_division_name' => '78 Sangilikanadarawa', 'd_s_division_id' => 1],
    ['gn_division_name' => '62 - Puleliya', 'd_s_division_id' => 1],
    ['gn_division_name' => 'Prabodhagama', 'd_s_division_id' => 1],
    ['gn_division_name' => 'Kidawarankulama', 'd_s_division_id' => 1],
    ['gn_division_name' => 'Poonewa', 'd_s_division_id' => 1],
    ['gn_division_name' => 'Maha Kumbukgollewa', 'd_s_division_id' => 1],
    ['gn_division_name' => 'Kadawath Rambewa', 'd_s_division_id' => 1],
    ['gn_division_name' => '42 kidawarankulama', 'd_s_division_id' => 1],
    ['gn_division_name' => '43 - Prabodagama', 'd_s_division_id' => 1],

    ['gn_division_name' => '89, -Kallanachiya', 'd_s_division_id' => 2],
    ['gn_division_name' => '98, -Kapiriggama', 'd_s_division_id' => 2],
    ['gn_division_name' => '81, Pihimbiyagollewa', 'd_s_division_id' => 2],

    ['gn_division_name' => '555, -Labunoruwa', 'd_s_division_id' => 3],

    ['gn_division_name' => '184 - Manankattiya', 'd_s_division_id' => 4],

    ['gn_division_name' => '603 - Horiwila', 'd_s_division_id' => 5],

    ['gn_division_name' => '569 - Katukeliyawa', 'd_s_division_id' => 6],
    ['gn_division_name' => '566 - Seeppukulama', 'd_s_division_id' => 6],

    ['gn_division_name' => '369-Sadamaleliya', 'd_s_division_id' => 7],

    ['gn_division_name' => '275, -Kawarakkulama', 'd_s_division_id' => 8],

    ['gn_division_name' => 'Maha Ehetuwewa', 'd_s_division_id' => 9],

    ['gn_division_name' => '305 - Galpottegama', 'd_s_division_id' => 10],

    ['gn_division_name' => 'Alankulama', 'd_s_division_id' => 13],
    ['gn_division_name' => 'Kottukachchiya Colony 1', 'd_s_division_id' => 13],

    ['gn_division_name' => 'Mahameddewa', 'd_s_division_id' => 14],
    ['gn_division_name' => 'Rambakanayagama', 'd_s_division_id' => 14],
    ['gn_division_name' => 'Miyellewa', 'd_s_division_id' => 14],
    ['gn_division_name' => 'Amunuwewa', 'd_s_division_id' => 14],

    ['gn_division_name' => 'Wathupola', 'd_s_division_id' => 12],

    ['gn_division_name' => 'Mailankulama', 'd_s_division_id' => 11],

    ['gn_division_name' => 'Unit-9,10', 'd_s_division_id' => 15],
    ['gn_division_name' => 'Periyapuliyalankulam', 'd_s_division_id' => 15],
    ['gn_division_name' => 'Sinnasippikulam', 'd_s_division_id' => 15],
    ['gn_division_name' => 'kankankulam', 'd_s_division_id' => 15],
    ['gn_division_name' => 'Kiristhavakulam', 'd_s_division_id' => 15],
    ['gn_division_name' => 'Neriyakulam', 'd_s_division_id' => 15],
    ['gn_division_name' => 'Cheddikulam', 'd_s_division_id' => 15],
    ['gn_division_name' => 'Muthaliyarkulam', 'd_s_division_id' => 15],
    ['gn_division_name' => 'Periyakaddu', 'd_s_division_id' => 15],
    ['gn_division_name' => 'Andiyapuliankulam', 'd_s_division_id' => 15],
    ['gn_division_name' => 'Kanthasaminager', 'd_s_division_id' => 15],
    ['gn_division_name' => 'Sooduventhapulavu', 'd_s_division_id' => 15],
    ['gn_division_name' => 'Kannadi', 'd_s_division_id' => 15],

    ['gn_division_name' => 'Asikulam', 'd_s_division_id' => 16],

    ['gn_division_name' => 'Kalukunnammaduwa', 'd_s_division_id' => 17],
    ['gn_division_name' => 'Allagalla', 'd_s_division_id' => 17],

    ['gn_division_name' => 'Sangappalaya', 'd_s_division_id' => 18],
    ['gn_division_name' => 'Wannikuda Wewa', 'd_s_division_id' => 18],
    ['gn_division_name' => 'Gampola', 'd_s_division_id' => 18],
    ['gn_division_name' => 'Aliyawetunawewa', 'd_s_division_id' => 18],

    ['gn_division_name' => 'Niyandawanaya', 'd_s_division_id' => 19],
    ['gn_division_name' => 'Galgiriyawa', 'd_s_division_id' => 19],
    ['gn_division_name' => 'Kambuwatawana', 'd_s_division_id' => 19],
    ['gn_division_name' => 'Ihala Thimbiriyawa', 'd_s_division_id' => 19],
    ['gn_division_name' => 'Kambuwatawana', 'd_s_division_id' => 19],
    ['gn_division_name' => 'Nikawewa', 'd_s_division_id' => 19],
    ['gn_division_name' => 'Moragollagama', 'd_s_division_id' => 19],
    ['gn_division_name' => 'Kubukkadawala', 'd_s_division_id' => 19],
    ['gn_division_name' => 'Serugasyaya', 'd_s_division_id' => 19],

    ['gn_division_name' => 'Nahettikulama', 'd_s_division_id' => 20],
    ['gn_division_name' => 'Madadombe', 'd_s_division_id' => 20],

    ['gn_division_name' => 'Thimbiriyawa', 'd_s_division_id' => 21],
    ['gn_division_name' => 'Hunugallewa', 'd_s_division_id' => 21],
    ['gn_division_name' => 'Ethinimole', 'd_s_division_id' => 21],
    ['gn_division_name' => 'Galapitadigana', 'd_s_division_id' => 21],
    ['gn_division_name' => 'Ihala Embogama', 'd_s_division_id' => 21],
    ['gn_division_name' => 'Kaduruwewa', 'd_s_division_id' => 21],
    ['gn_division_name' => 'Eriyawa', 'd_s_division_id' => 21],
    ['gn_division_name' => 'Ratnadivulwewa', 'd_s_division_id' => 21],
    ['gn_division_name' => 'Hiddewa', 'd_s_division_id' => 21],

    ['gn_division_name' => 'Mawathagama', 'd_s_division_id' => 22],

    ['gn_division_name' => 'Bakmeewewa', 'd_s_division_id' => 23],

    ['gn_division_name' => 'Sirukkandal', 'd_s_division_id' => 24],
    ['gn_division_name' => 'Ilahadipiddy', 'd_s_division_id' => 24],
    ['gn_division_name' => 'Vanchiyankulam', 'd_s_division_id' => 24],
    ['gn_division_name' => 'Isamalaithalvu', 'd_s_division_id' => 24],
    ['gn_division_name' => 'Valkkaipettankandal', 'd_s_division_id' => 24],
    ['gn_division_name' => 'Parikarikandal', 'd_s_division_id' => 24],
    ['gn_division_name' => 'Razoolputhuveli', 'd_s_division_id' => 24],
    ['gn_division_name' => 'Ilanthaimoddai', 'd_s_division_id' => 24],

    ['gn_division_name' => 'Minnukkan', 'd_s_division_id' => 25],
    ['gn_division_name' => 'Pappamoddai', 'd_s_division_id' => 25],

    ['gn_division_name' => 'Veppankulam', 'd_s_division_id' => 26],
    ['gn_division_name' => 'S.P Potkerni', 'd_s_division_id' => 26],
    ['gn_division_name' => 'Veppankulam', 'd_s_division_id' => 26],
    ['gn_division_name' => 'Puthuveli', 'd_s_division_id' => 26],
    ['gn_division_name' => 'Maruthamadu', 'd_s_division_id' => 26],
    ['gn_division_name' => 'Poonochchi', 'd_s_division_id' => 26],
    ['gn_division_name' => 'P.P Potkerni', 'd_s_division_id' => 26],
    ['gn_division_name' => 'Kondachchi', 'd_s_division_id' => 26],
    ['gn_division_name' => 'Pandaraveli', 'd_s_division_id' => 26],
    ['gn_division_name' => 'Arippu west', 'd_s_division_id' => 26],
    ['gn_division_name' => 'Koolankulam', 'd_s_division_id' => 26],
    ['gn_division_name' => 'Akathimurippu', 'd_s_division_id' => 26],
    ['gn_division_name' => 'Sirukkandal', 'd_s_division_id' => 26],
    ['gn_division_name' => 'Ilahadipiddy', 'd_s_division_id' => 26],
    ['gn_division_name' => 'Vanchiyankulam', 'd_s_division_id' => 26],
    ['gn_division_name' => 'Parikarikandal', 'd_s_division_id' => 26],
    ['gn_division_name' => 'Isamalaithalvu', 'd_s_division_id' => 26],
    ['gn_division_name' => 'Razoolputhuveli', 'd_s_division_id' => 26],
    ['gn_division_name' => 'Ilanthaimoddai', 'd_s_division_id' => 26],

    ['gn_division_name' => 'Puthukkamam', 'd_s_division_id' => 27],
    ['gn_division_name' => 'Periyanavatkulam', 'd_s_division_id' => 27],

    ['gn_division_name' => 'Udagama West', 'd_s_division_id' => 28],
    ['gn_division_name' => 'Aluthwatta', 'd_s_division_id' => 28],
    ['gn_division_name' => 'Mathalapitiya', 'd_s_division_id' => 28],
    ['gn_division_name' => 'Mathalapitiya South', 'd_s_division_id' => 28],
    ['gn_division_name' => 'Raththinda', 'd_s_division_id' => 28]
]);

    }
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gn_divisions');
    }
};
