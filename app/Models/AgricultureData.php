<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class AgricultureData extends Model
// {
//     use HasFactory;
    
//     protected $table = 'agriculture_data';

//     // Define the fillable fields for mass assignment
//     protected $fillable = [
//         'category',
//         'crop_name',
//         'crop_variety',          // New field for crop variety
//         // 'farmer_contribution',   // New field for farmer contribution
//         'planting_date',         // New field for planting date
//         'total_acres',
//         'inputs',
//         //'total_production',
//         'gn_division_name',
//         'beneficiary_id'
//     ];

//     // Define the relationship with the Beneficiary model
//     public function beneficiary()
//     {
//         return $this->belongsTo(Beneficiary::class);
//     }
//     public function farmerContributions()
// {
//     return $this->hasMany(AgriFarmerContribution::class, 'agriculture_data_id');
// }

//     public function agriculturProducts() 
//     {
//         return $this->hasMany(AgriculturProduct::class, 'agriculture_data_id');
//     }
// }

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgricultureData extends Model
{
    use HasFactory;

    protected $table = 'agriculture_data';

    protected $fillable = [
        'category',
        'crop_name',
        'planting_date',
        'total_acres',
        'total_livestock_area',
        'total_cost',
        'gn_division_name',
        'beneficiary_id'
    ];

    // Belongs To
    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }

    // Has Many: Farmer Contributions
    public function farmerContributions()
    {
        return $this->hasMany(AgriFarmerContribution::class, 'agriculture_data_id');
    }

    // Has Many: Promoter Contributions
    public function promoterContributions()
    {
        return $this->hasMany(PromoterContribution::class, 'agriculture_data_id');
    }

    // Has Many: Grant Details
    public function grantDetails()
    {
        return $this->hasMany(GrantDetail::class, 'agriculture_data_id');
    }

    // Has Many: Agricultur Products
    public function agriculturProducts()
    {
        return $this->hasMany(AgriculturProduct::class, 'agriculture_data_id');
    }

    // Has Many: Credit Details
   public function creditDetail()
{
    return $this->hasOne(CreditDetail::class);
}
public function creditPayments()
{
    return $this->hasMany(CreditPayment::class);
}

    public function agricultureTrainings()
    {
        return $this->hasMany(AgricultureTraining::class);
    }
}
