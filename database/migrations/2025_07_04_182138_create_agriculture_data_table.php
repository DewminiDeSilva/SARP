<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Main agriculture_data table
        Schema::create('agriculture_data', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable();
            $table->string('crop_name')->nullable();
            $table->date('planting_date')->nullable();
            $table->decimal('total_acres', 8, 2)->nullable();
            $table->decimal('total_livestock_area', 8, 2)->nullable();
            $table->decimal('total_cost', 12, 2)->nullable();
            $table->timestamps();
        });

        // Farmer Contributions
        Schema::create('farmer_contributions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agriculture_data_id')->constrained('agriculture_data')->onDelete('cascade');
            $table->string('farmer_contribution')->nullable();
            $table->decimal('cost', 10, 2)->nullable();
            $table->date('date')->nullable();
            $table->timestamps();
        });

        // Promoter Contributions
        Schema::create('promoter_contributions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agriculture_data_id')->constrained('agriculture_data')->onDelete('cascade');
            $table->date('date')->nullable();
            $table->string('description')->nullable();
            $table->decimal('cost', 10, 2)->nullable();
            $table->timestamps();
        });

        // Grant Details
        Schema::create('grant_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agriculture_data_id')->constrained('agriculture_data')->onDelete('cascade');
            $table->date('date')->nullable();
            $table->string('description')->nullable();
            $table->decimal('value', 10, 2)->nullable();
            $table->string('grant_issued_by')->nullable();
            $table->timestamps();
        });

        // Agricultur Products
        Schema::create('agricultur_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agriculture_data_id')->constrained('agriculture_data')->onDelete('cascade');
            $table->string('product_name')->nullable();
            $table->decimal('total_production', 10, 2)->nullable();
            $table->decimal('total_income', 10, 2)->nullable();
            $table->decimal('profit', 10, 2)->nullable();
            $table->timestamps();
        });

        // Credit Details
        Schema::create('credit_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agriculture_data_id')->constrained('agriculture_data')->onDelete('cascade');
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

        // Credit Payments
        Schema::create('credit_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('credit_detail_id')->constrained('credit_details')->onDelete('cascade');
            $table->date('payment_date')->nullable();
            $table->decimal('installment_payment', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('credit_payments');
        Schema::dropIfExists('credit_details');
        Schema::dropIfExists('agricultur_products');
        Schema::dropIfExists('grant_details');
        Schema::dropIfExists('promoter_contributions');
        Schema::dropIfExists('farmer_contributions');
        Schema::dropIfExists('agriculture_data');
    }
};
