<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YouthCreditPayment extends Model
{
    use HasFactory;

    protected $table = 'youth_credit_payments';

    protected $fillable = [
        'youth_credit_detail_id',
        'payment_date',
        'installment_payment',
    ];

    public function creditDetail()
    {
        return $this->belongsTo(YouthCreditDetail::class, 'youth_credit_detail_id');
    }
}
