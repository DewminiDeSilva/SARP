<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AquaCulture extends Model
{
    use HasFactory;

    protected $fillable = [
        'aquaculture_name'
    ];

    // Mutator to capitalize the first letter of crop_name before saving it
    public function setAquaCultureNameAttribute($value)
    {
        $this->attributes['aquaculture_name'] = ucfirst(strtolower($value));
    }
}
