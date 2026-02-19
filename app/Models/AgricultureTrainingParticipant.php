<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgricultureTrainingParticipant extends Model
{
    use HasFactory;

    protected $table = 'agriculture_training_participants';

    protected $fillable = [
        'agriculture_training_id',
        'name',
        'nic',
        'address_institution',
        'contact_number',
        'gender',
        'designation',
        'age',
        'youth',
    ];

    public function agricultureTraining()
    {
        return $this->belongsTo(AgricultureTraining::class, 'agriculture_training_id');
    }
}
