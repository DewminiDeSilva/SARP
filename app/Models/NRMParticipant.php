<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NrmParticipant extends Model
{
    use HasFactory;

    // Specify the table name if it's not plural (Laravel uses plural table names by default)
    protected $table = 'nrm_participants';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'nrm_training_id',
        'name',
        'nic',
        'address_institution',
        'contact_number',
        'gender',
        'designation',
        'age',
        'youth',
    ];

    // Define the relationship with NRMTraining model (assuming you have a model for NRMTraining)
    public function nrmTraining()
    {
        return $this->belongsTo(NRMTraining::class, 'nrm_training_id');
    }
}

