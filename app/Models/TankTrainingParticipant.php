<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TankTrainingParticipant extends Model
{
    use HasFactory;

    protected $table = 'tank_training_participants';

    protected $fillable = [
        'tank_training_id',
        'name',
        'nic',
        'address_institution',
        'contact_number',
        'gender',
        'designation',
        'age',
        'youth',
    ];

    public function tankTraining()
    {
        return $this->belongsTo(TankTraining::class, 'tank_training_id');
    }
}
