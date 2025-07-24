<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EOICreditPayment extends Model
{
    use HasFactory;

    protected $table = 'eoi_credit_payments';

    protected $fillable = [
        'eoi_credit_detail_id',
        'payment_date',
        'installment_payment',
    ];

    public function creditDetail()
    {
        return $this->belongsTo(EOICreditDetail::class, 'eoi_credit_detail_id');
    }
}
