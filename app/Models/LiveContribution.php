<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveContribution extends Model
{
    use HasFactory;

    // Define the table if it's not the default 'live_contributions'
    protected $table = 'live_contributions';

    // Define the fillable attributes
    protected $fillable = [
        'livestock_id',
        'contribution_type',
        'cost'
    ];

    // Define the relationship with the Livestock model
    public function livestock()
    {
        return $this->belongsTo(Livestock::class, 'livestock_id');
    }
}
