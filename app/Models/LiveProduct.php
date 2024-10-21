<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveProduct extends Model
{
    use HasFactory;

    // Define the table if it's not the default 'live_products'
    protected $table = 'live_products';

    // Define the fillable attributes
    protected $fillable = [
        'livestock_id',
        'product_name',
        'total_production',
        'total_income',
        'profit'
    ];

    // Define the relationship with the Livestock model
    public function livestock()
    {
        return $this->belongsTo(Livestock::class, 'livestock_id');
    }
}
