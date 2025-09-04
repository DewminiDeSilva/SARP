<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgroForestNursery extends Model
{
    protected $table = 'agro_forest_nurseries';

    protected $fillable = [
        'agro_forest_id',
        'location',
    ];

    public function agroForest()
    {
        return $this->belongsTo(AgroForest::class);
    }
}
