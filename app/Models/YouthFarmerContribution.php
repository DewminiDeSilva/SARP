<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YouthFarmerContribution extends Model
{
    use HasFactory;

    protected $table = 'youth_farmer_contributions';

    protected $fillable = [
        'youth_beneficiary_form_id',
        'farmer_contribution',
        'cost',
        'date',
    ];

    public function youthForm()
    {
        return $this->belongsTo(YouthBeneficiaryForm::class, 'youth_beneficiary_form_id');
    }
}
