<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YouthCreditDetail extends Model
{
    use HasFactory;

    protected $table = 'youth_credit_details';

    protected $fillable = [
        'youth_beneficiary_form_id',
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

    public function youthForm()
    {
        return $this->belongsTo(YouthBeneficiaryForm::class, 'youth_beneficiary_form_id');
    }

    public function creditPayments()
    {
        return $this->hasMany(YouthCreditPayment::class, 'youth_credit_detail_id');
    }
}
