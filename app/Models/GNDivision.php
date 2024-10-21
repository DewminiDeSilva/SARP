<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GNDivision extends Model
{
    use HasFactory;
    protected $table = 'gn_divisions';


public function dsDivision()
{
    return $this->belongsTo(DSDivision::class, 'ds_division_id');
}
}