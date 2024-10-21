<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poultary extends Model
{
    use HasFactory;

    protected $fillable = [
        'poultary_name'
    ];

    // Mutator to capitalize the first letter of crop_name before saving it
    public function setPoultaryNameAttribute($value)
    {
        $this->attributes['poultary_name'] = ucfirst(strtolower($value));
    }
}
