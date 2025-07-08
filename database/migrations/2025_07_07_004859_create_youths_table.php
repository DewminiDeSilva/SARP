<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYouthsTable extends Migration
{
    public function up()
    {
        Schema::create('youths', function (Blueprint $table) {
            $table->id();

            // 🔗 Required: Link to Beneficiary
            $table->unsignedBigInteger('beneficiary_id');
            $table->foreign('beneficiary_id')->references('id')->on('beneficiaries')->onDelete('cascade');

            // 🏢 Enterprise Information
            $table->string('enterprise_name')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('institute_of_registration')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('website_name')->nullable();
            $table->text('description_of_certificates')->nullable();

            // 🛠️ Asset Details (stored as dynamic JSON)
            $table->json('asset_details')->nullable(); // [{asset_name, asset_value}]

            // 📊 Business Details
            $table->string('nature_of_business')->nullable();
            $table->text('products_available')->nullable();
            $table->text('yield_collection_details')->nullable();
            $table->text('marketing_information')->nullable();
            $table->text('list_of_distributors')->nullable();
            $table->string('business_plan')->nullable(); // PDF path

            // 🧾 Youth Contributions (dynamic JSON)
            $table->json('youth_contributions')->nullable(); // [{date, description, value}]

            // 🎯 Promoter Contributions (dynamic JSON)
            $table->json('promoter_contributions')->nullable(); // [{date, description, value}]

            // 🎁 Grant Details (dynamic JSON)
            $table->json('grant_details')->nullable(); // [{date, description, value, grant_issued_by}]

            // 🏦 Credit Details (static)
            $table->string('bank_name')->nullable();
            $table->string('branch')->nullable();
            $table->string('account_number')->nullable();
            $table->string('interest_rate')->nullable();
            $table->date('credit_issue_date')->nullable();
            $table->date('loan_installment_date')->nullable();
            $table->decimal('credit_amount', 15, 2)->nullable();
            $table->integer('number_of_installments')->nullable();
            $table->date('installment_due_date')->nullable();

            // 💸 Installment Payments (dynamic JSON)
            $table->json('installment_payments')->nullable(); // [{date, value}]

            // 📉 Credit Balance
            $table->date('credit_balance_date')->nullable();
            $table->decimal('credit_balance_value', 15, 2)->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('youths');
    }
}
