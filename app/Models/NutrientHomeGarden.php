<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NutrientHomeGarden extends Model
{
    use HasFactory;

    protected $fillable = [
        'beneficiary_id',
        'crop_name',
        'production_focus',
        'planting_date',
        'total_acres',
        'total_livestock_area',
        'total_cost',

        'farmer_contributions',
        'promoter_contributions',
        'grant_details',


        'bank_name',
        'branch',
        'account_number',
        'interest_rate',
        'credit_issue_date',
        'loan_installment_date',
        'credit_amount',
        'number_of_installments',
        'installment_due_date',

        'credit_payments',
        'credit_balance_on_date',
        'credit_balance',

        'agriculture_products',
    ];

    protected $casts = [
        'farmer_contributions'     => 'array',
        'promoter_contributions'   => 'array',
        'grant_details'            => 'array',
        'credit_payments'          => 'array',
        'agriculture_products'     => 'array',
        'total_acres'              => 'decimal:2',
        'total_livestock_area'     => 'decimal:2',
        'total_cost'               => 'decimal:2',
        'interest_rate'            => 'decimal:2',
        'credit_amount'            => 'decimal:2',
        'credit_balance'           => 'decimal:2',
    ];

    /**
     * Relationship: Belongs to Beneficiary
     */
    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }
}
