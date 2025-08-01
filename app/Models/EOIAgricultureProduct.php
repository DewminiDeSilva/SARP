<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EOIAgricultureProduct extends Model
{
    use HasFactory;

    protected $table = 'eoi_agriculture_products';

    protected $fillable = [
        'eoi_beneficiary_form_id',
        'product_name',
        'total_production',
        'total_income',
        'profit',
        'buyer_details',
    ];

    public function eoiForm()
    {
        return $this->belongsTo(EOIBeneficiaryForm::class, 'eoi_beneficiary_form_id');
    }
}
