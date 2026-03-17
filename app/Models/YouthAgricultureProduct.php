<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YouthAgricultureProduct extends Model
{
    use HasFactory;

    protected $table = 'youth_agriculture_products';

    protected $fillable = [
        'youth_beneficiary_form_id',
        'product_name',
        'total_production',
        'total_income',
        'profit',
        'buyer_details',
    ];

    public function youthForm()
    {
        return $this->belongsTo(YouthBeneficiaryForm::class, 'youth_beneficiary_form_id');
    }
}
