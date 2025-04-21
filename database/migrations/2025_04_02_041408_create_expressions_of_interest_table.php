<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpressionsOfInterestTable extends Migration
{
    public function up()
    {
        Schema::create('expressions_of_interest', function (Blueprint $table) {
            $table->id();
            $table->string('organization_name');
            $table->string('registration_details')->nullable();
            $table->string('contact_person');
            $table->text('address');
            $table->string('office_phone')->nullable();
            $table->string('mobile_phone');
            $table->string('email')->nullable();
            $table->text('market_problem');
            $table->string('business_title');
            $table->text('business_objectives');
            $table->text('background_info')->nullable();
            $table->text('project_justification');
            $table->text('project_benefits');

            // JSON structured fields
            $table->json('risks')->nullable();
            $table->json('mitigations')->nullable();
            $table->json('project_coverage')->nullable();
            $table->json('expected_outputs')->nullable();
            $table->json('expected_outcomes')->nullable();
            $table->json('investment_breakdown')->nullable();
            $table->json('funding_source')->nullable();
            $table->json('assistance_required')->nullable();

            // New fields
            $table->json('risk_factors')->nullable(); // newly added
            $table->string('implementation_plan')->nullable(); // file name (PDF)
            $table->string('status')->nullable(); // newly added

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('expressions_of_interest');
    }
}
