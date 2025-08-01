<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EOIGrantDetail extends Model
{
    use HasFactory;

    protected $table = 'eoi_grant_details';

    protected $fillable = [
        'eoi_beneficiary_form_id',
        'date',
        'description',
        'value',
        'grant_issued_by',
    ];

    public function eoiForm()
    {
        return $this->belongsTo(EOIBeneficiaryForm::class, 'eoi_beneficiary_form_id');
    }
}
