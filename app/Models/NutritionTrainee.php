<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Nutrition;

class NutritionTrainee extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'nic',
        'address',
        'dob',
        'age',
        'gender',
        'mobile_number',
        'education_level',
        'income_level',
        'special_remark',
        'nutrition_id'
    ];

    // Define the relationship with Nutrition
    public function nutrition()
    {
        return $this->belongsTo(Nutrition::class, 'nutrition_id', 'id'); // Explicitly define foreign and local keys if needed
    }
}
