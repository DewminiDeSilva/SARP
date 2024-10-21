<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NutritionTrainee;

class Nutrition extends Model
{
    use HasFactory;

    protected $table = 'nutrient_details';

    protected $fillable = [
        'program_type',
        'date',
        'location',
        'program_conductor',
        'cost_of_training_program',
        'province_name',
        'district_name',
        'ds_division_name',
        'gn_division_name',
        'asc_name',
        'cascade_name',
        'description',
    ];

    public function trainees()
    {
        return $this->hasMany(NutritionTrainee::class, 'nutrition_id');
    }
}
