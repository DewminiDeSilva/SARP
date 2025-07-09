<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveFarmerContribution extends Model
{
    use HasFactory;

    protected $table = 'live_farmer_contributions';

    protected $fillable = [
        'livestock_id',
        'date',
        'description',
        'value',
    ];

    public function livestock()
    {
        return $this->belongsTo(Livestock::class);
    }
}
