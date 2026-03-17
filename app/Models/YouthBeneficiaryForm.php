<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YouthBeneficiaryForm extends Model
{
    use HasFactory;

    protected $table = 'youth_beneficiary_forms';

    protected $fillable = [
        'beneficiary_id',
        'youth_business_title',
        'youth_category',
        'planting_date',
        'total_acres',
        'total_livestock_area',
        'total_cost',
        'gn_division_name',
    ];

    public function farmerContributions()
    {
        return $this->hasMany(YouthFarmerContribution::class, 'youth_beneficiary_form_id');
    }

    public function promoterContributions()
    {
        return $this->hasMany(YouthPromoterContribution::class, 'youth_beneficiary_form_id');
    }

    public function grantDetails()
    {
        return $this->hasMany(YouthGrantDetail::class, 'youth_beneficiary_form_id');
    }

    public function agricultureProducts()
    {
        return $this->hasMany(YouthAgricultureProduct::class, 'youth_beneficiary_form_id');
    }

    public function creditDetail()
    {
        return $this->hasOne(YouthCreditDetail::class, 'youth_beneficiary_form_id');
    }

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class, 'beneficiary_id');
    }
}
