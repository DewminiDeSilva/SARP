<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bene_forms', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('address');
            $table->string('phone_number');
            $table->string('nic_number');
            $table->date('dob');
            $table->string('whatsapp_number')->nullable();
            $table->string('email')->nullable();
            $table->integer('age');
            $table->string('gender');
            $table->json('education_level')->nullable(); // For storing education levels (checkbox)
            $table->string('head_of_household'); // Store as 'Yes' or 'No'
            $table->integer('number_of_household_members');
            $table->string('district');
            $table->string('gramaniladhari_division');
            $table->string('divisional_secretariat');
            $table->string('agrarian_service_division');
            $table->string('cascade_name');
            $table->string('tank_name');
            $table->json('water_facility')->nullable(); // Multiple options checkbox
            $table->string('other_water_facility')->nullable();
            $table->float('land_size'); // Land Ownership
            $table->float('proposed_cultivation_area');
            $table->string('ownership_type');
            $table->string('grown_crop_before'); // Store as 'Yes' or 'No'
            $table->string('participated_training_before'); // Store as 'Yes' or 'No'
            $table->string('harvest_sale_buyers'); // Store as 'Yes' or 'No'
            $table->text('buyer_details')->nullable();
            $table->json('buyer_type')->nullable();
            $table->string('will_store_harvest'); // Store as 'Yes' or 'No'
            $table->json('store_method')->nullable();
            $table->json('machinery')->nullable();  // Storing machinery data as JSON
            $table->json('machinery_number')->nullable(); // Storing machinery details
            $table->string('registered_in_fo'); // Store as 'Yes' or 'No'
            $table->string('fo_name')->nullable();
            $table->string('registration_number')->nullable();
            $table->date('sign_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bene_forms');
    }
}
