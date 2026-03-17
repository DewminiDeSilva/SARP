<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('youth_beneficiary_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beneficiary_id');
            $table->string('youth_business_title')->nullable();
            $table->string('youth_category')->nullable();
            $table->date('planting_date')->nullable();
            $table->decimal('total_acres', 8, 2)->nullable();
            $table->decimal('total_livestock_area', 8, 2)->nullable();
            $table->decimal('total_cost', 12, 2)->nullable();
            $table->string('gn_division_name')->nullable();
            $table->timestamps();
        });

        Schema::create('youth_farmer_contributions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('youth_beneficiary_form_id')->constrained('youth_beneficiary_forms')->onDelete('cascade');
            $table->string('farmer_contribution')->nullable();
            $table->decimal('cost', 10, 2)->nullable();
            $table->date('date')->nullable();
            $table->timestamps();
        });

        Schema::create('youth_promoter_contributions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('youth_beneficiary_form_id')->constrained('youth_beneficiary_forms')->onDelete('cascade');
            $table->date('date')->nullable();
            $table->string('description')->nullable();
            $table->decimal('cost', 10, 2)->nullable();
            $table->timestamps();
        });

        Schema::create('youth_grant_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('youth_beneficiary_form_id')->constrained('youth_beneficiary_forms')->onDelete('cascade');
            $table->date('date')->nullable();
            $table->string('description')->nullable();
            $table->decimal('value', 10, 2)->nullable();
            $table->string('grant_issued_by')->nullable();
            $table->timestamps();
        });

        Schema::create('youth_agriculture_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('youth_beneficiary_form_id')->constrained('youth_beneficiary_forms')->onDelete('cascade');
            $table->string('product_name')->nullable();
            $table->decimal('total_production', 10, 2)->nullable();
            $table->decimal('total_income', 10, 2)->nullable();
            $table->decimal('profit', 10, 2)->nullable();
            $table->string('buyer_details')->nullable();
            $table->timestamps();
        });

        Schema::create('youth_credit_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('youth_beneficiary_form_id')->constrained('youth_beneficiary_forms')->onDelete('cascade');
            $table->string('bank_name')->nullable();
            $table->string('branch')->nullable();
            $table->string('account_number')->nullable();
            $table->decimal('interest_rate', 5, 2)->nullable();
            $table->date('credit_issue_date')->nullable();
            $table->date('loan_installment_date')->nullable();
            $table->decimal('credit_amount', 12, 2)->nullable();
            $table->integer('number_of_installments')->nullable();
            $table->date('installment_due_date')->nullable();
            $table->date('credit_balance_on_date')->nullable();
            $table->decimal('credit_balance', 12, 2)->nullable();
            $table->timestamps();
        });

        Schema::create('youth_credit_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('youth_credit_detail_id')->constrained('youth_credit_details')->onDelete('cascade');
            $table->date('payment_date')->nullable();
            $table->decimal('installment_payment', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('youth_credit_payments');
        Schema::dropIfExists('youth_credit_details');
        Schema::dropIfExists('youth_agriculture_products');
        Schema::dropIfExists('youth_grant_details');
        Schema::dropIfExists('youth_promoter_contributions');
        Schema::dropIfExists('youth_farmer_contributions');
        Schema::dropIfExists('youth_beneficiary_forms');
    }
};
