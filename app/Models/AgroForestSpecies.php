<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgroForestSpecies extends Model
{
    protected $table = 'agro_forest_species';

    protected $fillable = [
        'agro_forest_id',
        'species_name',
        'no_of_plants',
    ];

    public function agroForest()
    {
        return $this->belongsTo(AgroForest::class);
    }
}
