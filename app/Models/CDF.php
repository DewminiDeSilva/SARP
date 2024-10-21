<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CDFMember;

class CDF extends Model
{
    use HasFactory;

    protected $table = 'cdfs';

    protected $fillable = [
        'province', 'district', 'ds_division_name', 'gn_division_name',
        'as_center', 'cascade_name', 'cdf_name', 'cdf_address',
    ];


    // Example of a one-to-many relationship
    public function members()
    {
        return $this->hasMany(CdfMember::class);
    }
}


