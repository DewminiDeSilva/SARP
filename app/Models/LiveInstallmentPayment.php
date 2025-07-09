<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveInstallmentPayment extends Model
{
    use HasFactory;

    protected $table = 'live_installment_payments';

    protected $fillable = [
        'livestock_id',
        'installment_payment_date',
        'installment_payment_value',
    ];

    public function livestock()
    {
        return $this->belongsTo(Livestock::class);
    }
}
