<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Beneficiary;

class Family extends Model
{
    use HasFactory;

    protected $fillable = [
        'beneficiary_id', // Ensure this is included to associate with beneficiary
        'name_with_initials',
        'phone',
        'gender',
        'dob',
        'nic', // New field for family member NIC
        'youth',
        'education',
        'income_source',
        'income',
        'nutrition_level',
    ];

    /**
     * Define the relationship with the Beneficiary model using the foreign key.
     */
    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }
}
