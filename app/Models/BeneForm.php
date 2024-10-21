<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeneForm extends Model
{
    use HasFactory;

    protected $table = 'bene_forms';

    protected $fillable = [
        'full_name',
        'address',
        'phone_number',
        'nic_number',
        'dob',
        'whatsapp_number',
        'email',
        'age',
        'gender',
        'education_level',
        'head_of_household',
        'number_of_household_members',
        'district',
        'gramaniladhari_division',
        'divisional_secretariat',
        'agrarian_service_division',
        'cascade_name',
        'tank_name',
        'water_facility',
        'other_water_facility',
        'land_size',
        'proposed_cultivation_area',
        'ownership_type',
        'grown_crop_before',
        'participated_training_before',
        'harvest_sale_buyers',
        'buyer_details',
        'buyer_type',
        'will_store_harvest',
        'store_method',
        'machinery_number',
        'registered_in_fo',
        'fo_name',
        'registration_number',
        'sign_date'
    ];
    
    protected $casts = [
        'education_level' => 'array',
        'water_facility' => 'array',
        'buyer_type' => 'array',
        'store_method' => 'array',
        'machinery' => 'array',
        'machinery_number' => 'array',
    ];
}
