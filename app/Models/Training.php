<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $table = 'training_program';

    protected $fillable = [
        'program_name',
        'date',
        'venue',  // Updated field name (formerly 'place')
        'resource_person_name',  // Updated field name (formerly 'conductor_name')
        'training_program_cost',  // Updated field name (formerly 'conductor_payment')
        'resource_person_payment',  // Newly added field
        'province_name',
        'district',
        'ds_division_name',
        'gn_division_name',
        'as_center'
    ];

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
}
