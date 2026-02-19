<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FourpTrainingParticipant extends Model
{
    use HasFactory;

    protected $table = 'fourp_training_participants';

    protected $fillable = [
        'fourp_training_id',
        'name',
        'nic',
        'address_institution',
        'contact_number',
        'gender',
        'designation',
        'age',
        'youth',
    ];

    public function fourpTraining()
    {
        return $this->belongsTo(FourpTraining::class, 'fourp_training_id');
    }
}
