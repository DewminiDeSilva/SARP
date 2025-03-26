<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EOI extends Model
{
    use HasFactory;

    protected $table = 'expressions_of_interest'; // Ensure correct table name

    protected $fillable = [
        'organization_name',
        'registration_details',
        'contact_person',
        'address',
        'office_phone',
        'mobile_phone',
        'email',
        'market_problem',
        'business_title',
        'business_objectives',
        'risks',
        'mitigations',
        'investment_breakdown',
    ];

    protected $casts = [
        'risks' => 'array',
        'mitigations' => 'array',
        'investment_breakdown' => 'array',
    ];
}
