<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infrastructure extends Model
{
    use HasFactory;
    protected $table = 'infrastructure';

    protected $fillable = [
        'type_of_infrastructure', // Updated field
        'infrastructure_progress', // Updated field
        'infrastructure_description', // New field
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
        'pre_image_path',
        'during_image_path',
        'post_image_path',

    ];
}
