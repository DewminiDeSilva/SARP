<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNutrientRichHomeGardensTable  extends Migration
{
    public function up()
    {
        Schema::create('nutrient_home_gardens', function (Blueprint $table) {
            $table->id();

            // Beneficiary Relationship
            $table->foreignId('beneficiary_id')->constrained()->onDelete('cascade');

            // 1. Beneficiary & Crop Info
            $table->string('crop_name'); // ✅ Required
            $table->string('production_focus')->nullable();
            $table->date('planting_date')->nullable();
            $table->decimal('total_acres', 10, 2)->nullable();
            $table->decimal('total_livestock_area', 10, 2)->nullable();
            $table->decimal('total_cost', 12, 2)->nullable();

            // 2. Farmer Contributions
            $table->json('farmer_contributions')->nullable();

            // 3. Promoter Contributions
            $table->json('promoter_contributions')->nullable();

            // 4. Grant Details
            $table->json('grant_details')->nullable();

            // 5. Credit Details
            $table->string('bank_name')->nullable();
            $table->string('branch')->nullable();
            $table->string('account_number')->nullable();
            $table->decimal('interest_rate', 5, 2)->nullable();
            $table->date('credit_issue_date')->nullable();
            $table->date('loan_installment_date')->nullable();
            $table->decimal('credit_amount', 12, 2)->nullable();
            $table->integer('number_of_installments')->nullable();
            $table->date('installment_due_date')->nullable();


            // 6. Credit Payments
            $table->json('credit_payments')->nullable();

            // 7. Credit Balance
            $table->date('credit_balance_on_date')->nullable();
            $table->decimal('credit_balance', 12, 2)->nullable();

            // 8. Agriculture Products
            $table->json('agriculture_products')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nutrient_home_gardens');
    }
}
