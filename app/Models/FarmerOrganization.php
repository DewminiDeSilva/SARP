<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FarmerMember;

class FarmerOrganization extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_number', 'organization_name', 'address', 'registration_institute', 
        'edate', 'province_name', 'district_name', 'ds_division_name', 'gn_division_name', 
        'as_center', 'tank_name', 'cascade_name'
    ];

    public function members()
    {
        return $this->hasMany(FarmerMember::class, 'farmerorganization_id');
    }
}

