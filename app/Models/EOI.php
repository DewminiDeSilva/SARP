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
        'background_info',
        'project_justification',
        'project_benefits',
        'risks',
        'mitigations',
        'project_coverage',
        'expected_outputs',
        'expected_outcomes',
        'investment_breakdown',
        'funding_source',
        'assistance_required',
        'risk_factors',
        'implementation_plan',
        'status',
        'category',
    ];

    protected $casts = [
        'risks' => 'array',
        'mitigations' => 'array',
        'project_coverage' => 'array',
        'expected_outputs' => 'array',
        'expected_outcomes' => 'array',
        'investment_breakdown' => 'array',
        'funding_source' => 'array',
        'assistance_required' => 'array',
        'risk_factors' => 'array',
    ];
}
