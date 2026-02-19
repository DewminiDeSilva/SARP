<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivestockTrainingParticipant extends Model
{
    use HasFactory;

    protected $table = 'livestock_training_participants';

    protected $fillable = [
        'livestock_training_id',
        'name',
        'nic',
        'address_institution',
        'contact_number',
        'gender',
        'designation',
        'age',
        'youth',
    ];

    public function livestockTraining()
    {
        return $this->belongsTo(LivestockTraining::class, 'livestock_training_id');
    }
}
