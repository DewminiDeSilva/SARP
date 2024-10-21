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
        if (!Schema::hasTable('beneficiaries')){
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->string("nic")->unique();
            $table->string('name_with_initials');
            $table->string("gender");
            $table->string("dob");
            $table->string("age");
            $table->string("address");
            $table->string("email")->nullable();
            $table->string("phone");
            $table->string("education");
            $table->string('bank_name');
            $table->string('bank_branch');
            $table->string('account_number');
            $table->string("land_ownership_total_extent");
            $table->string("land_ownership_proposed_cultivation_area");
            $table->string("province_name");
            $table->string("district_name");
            $table->string("ds_division_name");
            $table->string("gn_division_name");
            $table->string("as_center");
            $table->string("cascade_name");
            $table->string("tank_name");
            $table->string("ai_division");
            $table->string("latitude")->nullable();
            $table->string("longitude")->nullable();
            $table->integer("number_of_family_members");
            $table->string("head_of_householder_name");
            $table->string("householder_number");
            $table->string("income_source");
            $table->decimal("average_income", 10, 2);
            $table->decimal("monthly_household_expenses", 10, 2);
            $table->text("household_level_assets_description");
            $table->string("community_based_organization")->nullable();
            $table->string("type_of_water_resource");
            $table->text("training_details_description")->nullable();
            
            $table->timestamps();
        });
    }
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiaries');
    }
};
