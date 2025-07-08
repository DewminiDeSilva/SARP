<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreditDetail extends Model
{
    protected $fillable = [
        'agriculture_data_id',
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
        'credit_balance'
    ];

    public function agricultureData()
    {
        return $this->belongsTo(AgricultureData::class);
    }

    public function payments()
    {
        return $this->hasMany(CreditPayment::class);
    }
}
