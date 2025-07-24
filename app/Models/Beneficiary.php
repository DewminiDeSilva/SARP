<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Family;

class Beneficiary extends Model
{
    use HasFactory;

    // Define fillable properties for mass assignment
    protected $fillable = [
        'nic',
        'name_with_initials',
        'gender',
        'dob',
        'address',
        'phone',
        'education', // Added 'education'
        'bank_name',
        'bank_branch',
        'account_number',
        'land_ownership_total_extent',
        'land_ownership_proposed_cultivation_area',
        'age',
        'province_name',
        'district_name',
        'ds_division_name',
        'gn_division_name',
        'as_center',
        'tank_name',
        'latitude',
        'longitude',
        'cascade_name',
        'ai_division',
        'number_of_family_members',
        'head_of_householder_name',
        'householder_number',
        'email',
        'community_based_organization',
        'income_source',
        'average_income',
        'monthly_household_expenses',
        'household_level_assets_description',
        'type_of_water_resource',
        'training_details_description',
        'input1',
        'input2',
        'input3',
        'project_type',
        'youth_proposal_id',        
    ];

    /**
     * Family members related to the beneficiary.
     * Updated to link via NIC instead of beneficiary_id.
     */
    public function families()
    {
    return $this->hasMany(Family::class, 'beneficiary_id', 'id');
    }


    /**
     * Livestock related to the beneficiary.
     * Keep as it is, linking via beneficiary_id.
     */
    public function livestock()
    {
        return $this->hasMany(Livestock::class, 'beneficiary_id', 'id');
    }

    public function youthProposal()
    {
        return $this->belongsTo(YouthProposal::class, 'youth_proposal_id');
    }

}
