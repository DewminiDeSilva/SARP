<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgroForest extends Model
{
    use HasFactory;

    protected $table = 'agro_forests';

    protected $fillable = [
        // Location fields
        'river_basin',
        'province_name',
        'district',
        'gn_division_name',
        'gn_division_name_2',
        'gn_division_name_3',
        'ds_division_name',
        'no_of_trees_plans',
        'paid_amount',

        // Tanks
        'tank_name',
        'tank_name_2',
        'tank_name_3',

        // Core fields
        'replanting_forest_beat_name',
        'number_of_hectares',
        'gps_longitude',
        'gps_latitude',

        // Cost + file
        'establish_cost',
        'project_proposal_path',
    ];

    // Relationships
    public function species()
    {
        return $this->hasMany(AgroForestSpecies::class);
    }

    public function nurseries()
    {
        return $this->hasMany(AgroForestNursery::class);
    }
}
