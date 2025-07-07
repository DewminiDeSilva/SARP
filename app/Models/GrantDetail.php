<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrantDetail extends Model
{
    protected $fillable = [
        'agriculture_data_id',
        'date',
        'description',
        'value',
        'grant_issued_by'
    ];

    public function agricultureData()
    {
        return $this->belongsTo(AgricultureData::class);
    }
}
