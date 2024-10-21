<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $table = 'participants';

    protected $fillable = [
        'training_id',
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
     * Relationship to the Training model.
     * A participant belongs to a training program.
     */
    public function training()
    {
        return $this->belongsTo(Training::class);
    }
}
