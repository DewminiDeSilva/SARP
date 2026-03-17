<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YouthProposal extends Model
{
    use HasFactory;

    protected $table = 'youth_proposals';

    protected $fillable = [
        'organization_name',
        'registration_details',
        'contact_person',
        'nic_number',
        'birth_date',
        'business_type',
        'address',
        'office_phone',
        'mobile_phone',
        'email',
        'market_problem',
        'business_title',
        'business_objectives',
        'category',
        'status',
        'risks',
        'mitigations',
        'investment_breakdown',
        'background_info',
        'project_justification',
        'project_benefits',
        'project_coverage',
        'expected_outputs',
        'expected_outcomes',
        'funding_source',
        'implementation_plan',
        'implementation_plans',
        'assistance_required',
    ];

    // Cast JSON columns
    protected $casts = [
        'birth_date' => 'date',
        'risks' => 'array',
        'mitigations' => 'array',
        'investment_breakdown' => 'array',
        'project_coverage' => 'array',
        'expected_outputs' => 'array',
        'expected_outcomes' => 'array',
        'funding_source' => 'array',
        'implementation_plans' => 'array',
        'assistance_required' => 'array',
    ];


    public function beneficiaries()
    {
        return $this->hasMany(\App\Models\Beneficiary::class, 'youth_proposal_id');
    }

}
