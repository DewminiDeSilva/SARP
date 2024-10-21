<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AscRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'province_name',
        'district_name',
        'ds_division_name',
        'gn_division_name',
        'as_center',
        'asc_name',
        // 'asc_id',
        'officer_incharge',
        'contact_email',
        'contact_number',
        'services_available',
    ];

    // Define relationships if needed
}
