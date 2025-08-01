<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EOIBeneficiaryForm extends Model
{
    use HasFactory;

    protected $table = 'eoi_beneficiary_forms';

    protected $fillable = [
        'beneficiary_id',
        'eoi_business_title',
        'eoi_category',
        'planting_date',
        'total_acres',
        'total_livestock_area',
        'total_cost',
        'gn_division_name',
    ];

    public function farmerContributions()
    {
        return $this->hasMany(EOIFarmerContribution::class, 'eoi_beneficiary_form_id');
    }

    public function promoterContributions()
    {
        return $this->hasMany(EOIPromoterContribution::class, 'eoi_beneficiary_form_id');
    }

    public function grantDetails()
    {
        return $this->hasMany(EOIGrantDetail::class, 'eoi_beneficiary_form_id');
    }

    public function agricultureProducts()
    {
        return $this->hasMany(EOIAgricultureProduct::class,'eoi_beneficiary_form_id');
    }

    public function creditDetail()
    {
        return $this->hasOne(EOICreditDetail::class,'eoi_beneficiary_form_id');
    }

    public function beneficiary()
{
    return $this->belongsTo(Beneficiary::class, 'beneficiary_id');
}

}
