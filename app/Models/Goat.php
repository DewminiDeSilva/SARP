<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goat extends Model
{
    use HasFactory;

    protected $fillable = [
        'goat_name'
    ];

    // Mutator to capitalize the first letter of crop_name before saving it
    public function setGoatNameAttribute($value)
    {
        $this->attributes['goat_name'] = ucfirst(strtolower($value));
    }
}
