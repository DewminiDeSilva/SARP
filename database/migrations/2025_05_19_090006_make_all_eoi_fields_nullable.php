<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeAllEoiFieldsNullable extends Migration
{
    public function up()
    {
        Schema::table('expressions_of_interest', function (Blueprint $table) {
            $table->string('organization_name')->nullable()->change();
            $table->string('registration_details')->nullable()->change();
            $table->string('contact_person')->nullable()->change();
            $table->text('address')->nullable()->change();
            $table->string('office_phone')->nullable()->change();
            $table->string('mobile_phone')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->text('market_problem')->nullable()->change();
            $table->string('business_title')->nullable()->change();
            $table->text('business_objectives')->nullable()->change();
            $table->text('background_info')->nullable()->change();
            $table->text('project_justification')->nullable()->change();
            $table->text('project_benefits')->nullable()->change();

            $table->json('risks')->nullable()->change();
            $table->json('mitigations')->nullable()->change();
            $table->json('project_coverage')->nullable()->change();
            $table->json('expected_outputs')->nullable()->change();
            $table->json('expected_outcomes')->nullable()->change();
            $table->json('investment_breakdown')->nullable()->change();
            $table->json('funding_source')->nullable()->change();
            $table->json('assistance_required')->nullable()->change();
            $table->json('risk_factors')->nullable()->change();
            $table->string('implementation_plan')->nullable()->change();
            $table->string('status')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('expressions_of_interest', function (Blueprint $table) {
            // You can reverse changes here if needed, e.g. remove ->nullable()
        });
    }
}
