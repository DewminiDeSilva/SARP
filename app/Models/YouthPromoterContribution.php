<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YouthPromoterContribution extends Model
{
    use HasFactory;

    protected $table = 'youth_promoter_contributions';

    protected $fillable = [
        'youth_beneficiary_form_id',
        'date',
        'description',
        'cost',
    ];

    public function youthForm()
    {
        return $this->belongsTo(YouthBeneficiaryForm::class, 'youth_beneficiary_form_id');
    }
}
