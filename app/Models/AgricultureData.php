<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgricultureData extends Model
{
    use HasFactory;
    
    protected $table = 'agriculture_data';

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'category',
        'crop_name',
        'crop_variety',          // New field for crop variety
        // 'farmer_contribution',   // New field for farmer contribution
        'planting_date',         // New field for planting date
        'total_acres',
        'inputs',
        //'total_production',
        'gn_division_name',
        'beneficiary_id'
    ];

    // Define the relationship with the Beneficiary model
    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }
    public function farmerContributions()
{
    return $this->hasMany(AgriFarmerContribution::class, 'agriculture_data_id');
}

    public function agriculturProducts() 
    {
        return $this->hasMany(AgriculturProduct::class, 'agriculture_data_id');
    }
}
