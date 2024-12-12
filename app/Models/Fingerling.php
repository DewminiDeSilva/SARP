<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fingerling extends Model
{
    use HasFactory;

    protected $fillable = [
        'tank_id',
        'livestock_type',
        'stocking_type',
        'stocking_date',
        'stocking_details',
        'harvest_date',
        'variety_harvest_kg',
        'amount_cumulative_kg',
        'unit_price_rs',
        'total_income_rs',
        'wholesale_quantity_kg',
        'wholesale_unit_price_rs',
        'wholesale_total_income_rs',
    ];

    /**
     * Relationship with TankRehabilitation model.
     */
    public function tank()
    {
        return $this->belongsTo(TankRehabilitation::class, 'tank_id');
    }
}
