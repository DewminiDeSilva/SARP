<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'designation',
        'institution',
        'actions_taken',
        'action_taken_date',
        'status',
        'grievance_id',
    ];

    public function grievance()
    {
        return $this->belongsTo(Grievance::class);
    }
}
