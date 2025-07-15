<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYouthProposalsTable extends Migration
{
    public function up()
    {
        Schema::create('youth_proposals', function (Blueprint $table) {
            $table->id();
            $table->string('organization_name')->nullable();
            $table->string('registration_details')->nullable();
            $table->string('contact_person')->nullable();
            $table->text('address')->nullable();
            $table->string('office_phone')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('email')->nullable();
            $table->text('market_problem')->nullable();
            $table->string('business_title')->nullable();
            $table->text('business_objectives')->nullable();
            $table->string('category')->nullable();

            // ✅ Replaced risks & mitigations with combined field
            $table->json('risk_factors')->nullable(); // { risks: [], mitigations: [] }

            $table->json('investment_breakdown')->nullable(); // [{component, cost}]
            $table->text('background_info')->nullable();
            $table->text('project_justification')->nullable();
            $table->text('project_benefits')->nullable();
            $table->json('project_coverage')->nullable(); // [{area, farmers, acreage}]
            $table->json('expected_outputs')->nullable();
            $table->json('expected_outcomes')->nullable();
            $table->json('funding_source')->nullable(); // [{type, own, credit}]
            $table->string('implementation_plan')->nullable(); // file path
            $table->json('assistance_required')->nullable(); // [{type, sarp, other}]

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('youth_proposals');
    }
}
