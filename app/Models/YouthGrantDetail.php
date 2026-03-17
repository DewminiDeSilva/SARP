<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YouthGrantDetail extends Model
{
    use HasFactory;

    protected $table = 'youth_grant_details';

    protected $fillable = [
        'youth_beneficiary_form_id',
        'date',
        'description',
        'value',
        'grant_issued_by',
    ];

    public function youthForm()
    {
        return $this->belongsTo(YouthBeneficiaryForm::class, 'youth_beneficiary_form_id');
    }
}
