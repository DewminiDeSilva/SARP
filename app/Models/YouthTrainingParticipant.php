<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YouthTrainingParticipant extends Model
{
    use HasFactory;

    protected $table = 'youth_training_participants';

    protected $fillable = [
        'youth_training_id',
        'name',
        'nic',
        'address_institution',
        'contact_number',
        'gender',
        'designation',
        'age',
        'youth',
    ];

    public function youthTraining()
    {
        return $this->belongsTo(YouthTraining::class, 'youth_training_id');
    }
}
