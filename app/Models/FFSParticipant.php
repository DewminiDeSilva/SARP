<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FFSParticipant extends Model
{
    use HasFactory;

    protected $table = 'ffs_participants'; // Updated table name to ffs_participants

    protected $fillable = [
        'ffs_training_id', // Foreign key to FFS Training Program
        'name',
        'nic',
        'address_institution', // Combined Address/Institution
        'contact_number',
        'gender',
        'designation', // Added Designation
        'age', // Added Age
        'youth', // Youth status (calculated)
    ];

    /**
     * Relationship to the FFSTraining model.
     * A participant belongs to an FFS training program.
     */
    // public function ffsTraining()
    // {
    //     return $this->belongsTo(FFSTraining::class, 'ffs_training_id');
    // }
    public function ffsTraining()
{
    return $this->belongsTo(FFSTraining::class, 'ffs_training_id');
}

}
