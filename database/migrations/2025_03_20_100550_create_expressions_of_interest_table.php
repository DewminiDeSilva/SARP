<?php

// Migration: create_expressions_of_interest_table.php
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
            $table->json('risks')->nullable();
            $table->json('mitigations')->nullable();// Store risks and mitigations as JSON
            $table->text('project_coverage')->nullable();
            $table->text('expected_outputs')->nullable();
            $table->text('expected_outcomes')->nullable();
            $table->text('investment_breakdown')->nullable();
            $table->text('funding_source')->nullable();
            $table->text('implementation_plan')->nullable();
            $table->text('assistance_required')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('expressions_of_interest');
    }
}
////////////////////////////////