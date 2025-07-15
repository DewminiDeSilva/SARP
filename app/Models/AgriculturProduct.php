<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgriculturProduct extends Model
{
    use HasFactory;

    // Define the fillable attributes
    protected $fillable = [
        'agriculture_data_id',
        'product_name',
        'total_production',
        'total_income',
        'profit',
        'buyer_details',
    ];

    // Define the relationship with the AgricultureData model
    public function agricultureData()
    {
        return $this->belongsTo(AgricultureData::class, 'agriculture_data_id');
    }
}
