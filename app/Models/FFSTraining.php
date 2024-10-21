<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FFSTraining extends Model
{
    use HasFactory;

    protected $table = 'ffs_training_program';  // Updated table name

    protected $fillable = [
        'program_name',
        'date',
        'venue',  // Same as before
        'resource_person_name',  // Same as before
        'training_program_cost',  // Same as before
        'resource_person_payment',  // Same as before
        'province_name',
        'district',
        'ds_division_name',
        'gn_division_name',
        'as_center',
        'program_number',  // New field for Program Number
        'crop_name'        // New field for Crop Name
    ];

    /**
     * Relationship to FFS Participant.
     * One FFS Training Program has many FFS Participants.
     */
    public function ffsParticipants()
    {
        return $this->hasMany(FFSParticipant::class, 'ffs_training_id');
    }
}
