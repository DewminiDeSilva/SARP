<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TankRehabilitation extends Model
{
    use HasFactory;

    protected $table = 'tank_rehabilation';

    protected $fillable = [
        'tank_id',
        'tank_name',
        'river_basin',
        'cascade_name',
        'province_name',
        'district',
        'ds_division_name',
        'gn_division_name',
        'as_centre',
        'agency',
        'no_of_family',
        'longitude',
        'latitude',
        'progress',
        'contractor',
        'payment',
        'eot',
        'contract_period',
        'status',
        'remarks',

        // Newly added fields
        'open_ref_no',  // Open reference number
        'awarded_date',  // Awarded date
        'cumulative_amount',  // Cumulative amount
        'paid_advanced_amount',  // Paid advanced amount
        'recommended_ipc_no',  // Recommended IPC number
        'recommended_ipc_amount',  // Recommended IPC amount

        // Image paths for multiple construction stages
        'pre_construction_image',  // Pre-construction image
        'during_construction_image',  // During-construction image
        'post_construction_image',  // Post-construction image
    ];
}
