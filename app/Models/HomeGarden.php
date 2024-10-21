<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeGarden extends Model
{
    use HasFactory;

    protected $fillable = [
        'homegarden_name'
    ];

    // Mutator to capitalize the first letter of crop_name before saving it
    public function setHomegardenNameAttribute($value)
    {
        $this->attributes['homegarden_name'] = ucfirst(strtolower($value));
    }
}
