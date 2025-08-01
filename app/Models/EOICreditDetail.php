<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EOICreditDetail extends Model
{
    use HasFactory;

    protected $table = 'eoi_credit_details';

    protected $fillable = [
        'eoi_beneficiary_form_id',
        'bank_name',
        'branch',
        'account_number',
        'interest_rate',
        'credit_issue_date',
        'loan_installment_date',
        'credit_amount',
        'number_of_installments',
        'installment_due_date',
        'credit_balance_on_date',
        'credit_balance',
    ];

    public function eoiForm()
    {
        return $this->belongsTo(EOIBeneficiaryForm::class, 'eoi_beneficiary_form_id');
    }

    public function creditPayments()
    {
        return $this->hasMany(EOICreditPayment::class, 'eoi_credit_detail_id');
    }
}
