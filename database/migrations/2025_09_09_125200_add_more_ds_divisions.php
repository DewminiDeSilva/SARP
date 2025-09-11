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
    DB::table('ds_divisions')->insert([
        ['division' => 'N.P.C', 'district_id' => 1],
        ['division' => 'Mahakumbukkadawala', 'district_id' => 2],
        ['division' => 'Maho', 'district_id' => 4],
        ['division' => 'Nikaweratiya', 'district_id' => 4],
        ['division' => 'Kotawehera', 'district_id' => 4],
        ['division' => 'Madhu', 'district_id' => 5],
    ]);
}

public function down(): void
{
    DB::table('ds_divisions')->whereIn('division', [
     'Mahakumbukkadawala','N.P.C', 'Maho', 'Nikaweratiya', 'Kotawehera', 'Madhu'
    ])->delete();
}
};
