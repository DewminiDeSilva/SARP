<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EOIFarmerContribution extends Model
{
    use HasFactory;

    protected $table = 'eoi_farmer_contributions';

    protected $fillable = [
        'eoi_beneficiary_form_id',
        'farmer_contribution',
        'cost',
        'date',
    ];

    public function eoiForm()
    {
        return $this->belongsTo(EOIBeneficiaryForm::class, 'eoi_beneficiary_form_id');
    }
}
