<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DSDivision extends Model
{
    use HasFactory;
    protected $table = 'ds_divisions';

    
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function gnDivisions()
    {
        return $this->hasMany(GNDivision::class);
    }
}
