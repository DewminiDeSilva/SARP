<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vegitable extends Model
{
    use HasFactory;
    protected $table = 'vegitables';
    protected $fillable = [
        'crop_name'
    ];

    // Mutator to capitalize the first letter of crop_name before saving it
    public function setCropNameAttribute($value)
    {
        $this->attributes['crop_name'] = ucfirst(strtolower($value));
    }
}
