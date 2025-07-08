<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreditPayment extends Model
{
    protected $fillable = [
        'credit_detail_id',
        'payment_date',
        'installment_payment'
    ];

    public function creditDetail()
    {
        return $this->belongsTo(CreditDetail::class);
    }
}
