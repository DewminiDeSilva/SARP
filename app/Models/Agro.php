<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agro extends Model
{
    use HasFactory;

    protected $fillable = [
        'enterprise_name',
        'registration_number',
        'institute_of_registration',
        'address',
        'email',
        'phone_number',
        'website_name',
        'description_of_certificates',
        'nature_of_business',
        'products_available',
        'yield_collection_details',
        'marketing_information',
        'list_of_distributors',
        'business_plan',
    ];

    public function assets()
    {
        return $this->hasMany(AgroAsset::class);
    }

    // Define the relationship between Agro and Shareholder
    public function shareholders()
    {
        return $this->hasMany(Shareholder::class);
    }
}
