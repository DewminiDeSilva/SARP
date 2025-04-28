<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fingerling extends Model
{
    use HasFactory;

    protected $fillable = [
        'tank_id',
        'stocking_details',
        'harvest_details',
        'community_distribution_kg',
        'amount_cumulative_kg',
        'total_income_rs',
        'wholesale_quantity_kg',
        'no_of_families_benefited',
    ];

    /**
     * Relationship with TankRehabilitation model.
     */
    public function tank()
    {
        return $this->belongsTo(TankRehabilitation::class, 'tank_id');
    }
}
