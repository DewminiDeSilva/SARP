<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgriFarmerContribution extends Model
{
    // Specify the table if it's not the default 'agri_farmer_contributions'
    protected $table = 'farmer_contributions';

    // Specify which attributes can be mass assigned
    protected $fillable = [
        'agriculture_data_id',
        'farmer_contribution',
        'date',
        'cost'
    ];

    public function agricultureData()
    {
        return $this->belongsTo(AgricultureData::class);
    }
}
