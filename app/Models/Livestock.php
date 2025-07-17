<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livestock extends Model
{
    use HasFactory;

    protected $table = 'livestocks';

    protected $fillable = [
        'beneficiary_id',
        'livestock_type',
        'production_focus',
        'livestock_commencement_date',
        'number_of_livestocks',
        'area_of_cade',
        'livestock_value',
        'bank_name',
        'branch',
        'account_number',
        'interest_rate',
        'credit_issue_date',
        'loan_installment_date',
        'credit_amount',
        'number_of_installments',
        'installment_due_date',
        'credit_balance_date',
        'credit_balance_value',
        'gn_division_name',
    ];

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }

    public function liveProducts()
    {
        return $this->hasMany(LiveProduct::class);
    }

    public function farmerContributions()
    {
        return $this->hasMany(LiveFarmerContribution::class);
    }

    public function promoterContributions()
    {
        return $this->hasMany(LivePromoterContribution::class);
    }

    public function grantDetails()
    {
        return $this->hasMany(LiveGrantDetail::class);
    }

    public function installmentPayments()
    {
        return $this->hasMany(LiveInstallmentPayment::class);
    }
}
