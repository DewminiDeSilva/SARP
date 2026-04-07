<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeederRoadDevelopment extends Model
{
    use HasFactory;

    protected $fillable = [
        'feeder_road_id',
        'feeder_road_name',
        'type_of_feeder_road',
        'feeder_road_progress',
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
        'contractor',
        'payment',
        'eot',
        'contract_period',
        'status',
        'remarks',
        'open_ref_no',
        'awarded_date',
        'cumulative_amount',
        'paid_advanced_amount',
        'recommended_ipc_no',
        'recommended_ipc_amount',
        'pre_construction_image',
        'during_construction_image',
        'post_construction_image',
    ];

    protected $casts = [
        'awarded_date' => 'date',
    ];
}
