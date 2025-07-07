<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromoterContribution extends Model
{
    protected $fillable = [
        'agriculture_data_id',
        'date',
        'description',
        'cost'
    ];

    public function agricultureData()
    {
        return $this->belongsTo(AgricultureData::class);
    }
}
