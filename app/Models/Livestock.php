<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livestock extends Model
{
    use HasFactory;

    // Define the table if it's not the default 'livestocks'
    protected $table = 'livestocks';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'beneficiary_id',
        'livestock_type',
        'production_focus',
        'total_livestock_area',
        'total_cost',
        'inputs',
        'gn_division_name',
        'total_number_of_acres',
        'livestock_commencement_date'  // Livestock start date field
    ];

    // Define the relationship with the Beneficiary model
    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }

    // Define the relationship with the LiveProduct model
    public function liveProducts()
    {
        return $this->hasMany(LiveProduct::class, 'livestock_id');
    }

    // Define the relationship with the LiveContribution model
    public function liveContributions()
    {
        return $this->hasMany(LiveContribution::class, 'livestock_id');
    }
}
