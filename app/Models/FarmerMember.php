<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FarmerOrganization;

class FarmerMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_name', 'member_id', 'member_position',
        'contact_number', 'address', 'gender', 'dob', 'youth'
    ];

    public function farmerorganization()
    {
        return $this->belongsTo(FarmerOrganization::class, 'farmerorganization_id');
    }



}
