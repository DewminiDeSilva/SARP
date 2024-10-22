<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fruit extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'fruit_name'
    ];

    // Mutator to capitalize the first letter of fruit_name before saving it
    public function setFruitNameAttribute($value)
    {
        $this->attributes['fruit_name'] = ucfirst(strtolower($value));
    }
}
