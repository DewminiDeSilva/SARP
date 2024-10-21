<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivestockData extends Model
{
    use HasFactory;

    protected $table = 'livestock_data';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'category',
        'type',
        'total_acres',
        'total_farmers',
        'gn_division_name',
        'beneficiary_id',
    ];

    // Define any relationships, if applicable
    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }
}
