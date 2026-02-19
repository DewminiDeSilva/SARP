<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FourpTraining extends Model
{
    protected $table = 'fourp_training_program';

    protected $fillable = [
        'program_name',
        'program_number',
        'crop_name',
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

    public function fourpTrainingParticipants()
    {
        return $this->hasMany(FourpTrainingParticipant::class);
    }
}
