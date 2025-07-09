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
        // Create the 'livestocks' table
       Schema::create('livestocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('beneficiary_id')->constrained()->onDelete('cascade');
            $table->string('livestock_type');
            $table->string('production_focus');
            $table->date('livestock_commencement_date')->nullable();
            $table->integer('number_of_livestocks')->nullable();
            $table->decimal('area_of_cade', 10, 2)->nullable();
            $table->decimal('value', 10, 2)->nullable();
            $table->string('gn_division_name');
            
            // Credit details
            $table->string('bank_name')->nullable();
            $table->string('branch')->nullable();
            $table->string('account_number')->nullable();
            $table->decimal('interest_rate', 5, 2)->nullable();
            $table->date('credit_issue_date')->nullable();
            $table->date('loan_installment_date')->nullable();
            $table->decimal('credit_amount', 12, 2)->nullable();
            $table->integer('number_of_installments')->nullable();
            $table->date('installment_due_date')->nullable();

            // Credit balance
            $table->string('credit_balance_no')->nullable();
            $table->date('credit_balance_date')->nullable();
            $table->decimal('credit_balance_value', 12, 2)->nullable();

            $table->timestamps();
        });

        // Create the 'live_products' table
        Schema::create('live_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('livestock_id')->constrained('livestocks')->onDelete('cascade');
            $table->string('product_name')->nullable(); // Product details are not required
            $table->decimal('total_production', 10, 2)->nullable(); // Marked as nullable
            $table->decimal('total_income', 10, 2)->nullable(); // Marked as nullable
            $table->decimal('profit', 10, 2)->nullable(); // Marked as nullable
            $table->timestamps();
        });

         // 2. Farmer Contributions
        Schema::create('live_farmer_contributions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('livestock_id')->constrained('livestocks')->onDelete('cascade');
            $table->date('date')->nullable();
            $table->string('description')->nullable();
            $table->decimal('value', 10, 2)->nullable();
            $table->timestamps();
        });
        // 3. Promoter Contributions
        Schema::create('live_promoter_contributions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('livestock_id')->constrained('livestocks')->onDelete('cascade');
            $table->date('date')->nullable();
            $table->string('description')->nullable();
            $table->decimal('value', 10, 2)->nullable();
            $table->timestamps();
        });
        // 4. Grant Details
        Schema::create('live_grant_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('livestock_id')->constrained('livestocks')->onDelete('cascade');
            $table->date('date')->nullable();
            $table->string('description')->nullable();
            $table->decimal('value', 10, 2)->nullable();
            $table->string('grant_issued_by')->nullable();
            $table->timestamps();
        });

        // 5. Installment Payments
        Schema::create('live_installment_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('livestock_id')->constrained('livestocks')->onDelete('cascade');
            $table->date('installment_payment_date')->nullable();
            $table->decimal('installment_payment_value', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
     public function down(): void
    {
        Schema::dropIfExists('live_products');
        Schema::dropIfExists('live_installment_payments');
        Schema::dropIfExists('live_grant_details');
        Schema::dropIfExists('live_promoter_contributions');
        Schema::dropIfExists('live_farmer_contributions');
        Schema::dropIfExists('livestocks');
    }
};