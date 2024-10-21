<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dairy extends Model
{
    use HasFactory;

    protected $fillable = [
        'dairy_name'
    ];

    // Mutator to capitalize the first letter of crop_name before saving it
    public function setDairyNameAttribute($value)
    {
        $this->attributes['dairy_name'] = ucfirst(strtolower($value));
    }
}
