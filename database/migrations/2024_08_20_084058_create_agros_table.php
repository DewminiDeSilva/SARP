<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgrosTable extends Migration
{
    public function up()
    {
        Schema::create('agros', function (Blueprint $table) {
            $table->id();
            $table->string('enterprise_name');
            $table->string('registration_number');
            $table->string('institute_of_registration');
            $table->string('address');
            $table->string('email');
            $table->string('phone_number');
            $table->string('website_name')->nullable();
            $table->text('description_of_certificates')->nullable();
            $table->string('nature_of_business');
            $table->text('products_available');
            $table->text('yield_collection_details');
            $table->text('marketing_information');
            $table->text('list_of_distributors');
            $table->string('business_plan')->nullable(); // To store the PDF path
            $table->timestamps();
        });

        Schema::create('agro_assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agro_id')->constrained('agros')->onDelete('cascade');
            $table->string('asset_name');
            $table->decimal('asset_value', 15, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('agro_assets');
        Schema::dropIfExists('agros');
    }
}
