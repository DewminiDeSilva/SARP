<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Youth extends Model
{
    use HasFactory;

    protected $fillable = [
        'beneficiary_id',
        'enterprise_name',
        'registration_number',
        'institute_of_registration',
        'address',
        'email',
        'phone_number',
        'website_name',
        'description_of_certificates',
        'nature_of_business',
        'products_available',
        'yield_collection_details',
        'marketing_information',
        'list_of_distributors',
        'business_plan',

        // JSON: Assets
        'asset_details',

        // Youth Contributions
        'youth_contributions',

        // Promoter Contributions
        'promoter_contributions',

        // Grants (includes grant_issued_by inside)
        'grant_details',

        // Credit static fields
        'bank_name',
        'branch',
        'account_number',
        'interest_rate',
        'credit_issue_date',
        'loan_installment_date',
        'credit_amount',
        'number_of_installments',
        'installment_due_date',

        // Credit installment payments
        'installment_payments',

        // Credit balance info (excluding credit_balance_no)
        'credit_balance_date',
        'credit_balance_value',
    ];

    protected $casts = [
        'asset_details' => 'array',
        'youth_contributions' => 'array',
        'promoter_contributions' => 'array',
        'grant_details' => 'array',
        'installment_payments' => 'array',
    ];

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }
}
