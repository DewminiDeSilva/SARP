<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EOIPromoterContribution extends Model
{
    use HasFactory;

    protected $table = 'eoi_promoter_contributions';

    protected $fillable = [
        'eoi_beneficiary_form_id',
        'date',
        'description',
        'cost',
    ];

    public function eoiForm()
    {
        return $this->belongsTo(EOIBeneficiaryForm::class, 'eoi_beneficiary_form_id');
    }
}
