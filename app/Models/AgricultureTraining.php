<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgricultureTraining extends Model
{
    use HasFactory;

    protected $table = 'agriculture_training_program';

    protected $fillable = [
        'agriculture_data_id',
        'program_name',
        'date',
        'venue',
        'resource_person_name',
        'training_program_cost',
        'resource_person_payment',
        'province_name',
        'district',
        'ds_division_name',
        'gn_division_name',
        'as_center',
    ];

    public function agricultureData()
    {
        return $this->belongsTo(AgricultureData::class);
    }
}
