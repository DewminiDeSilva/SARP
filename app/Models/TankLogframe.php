<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TankLogframe extends Model
{
    protected $fillable = [
        'indicator_key','year','year_target','year_result',
        'baseline','mid_term','end_target','source','frequency','responsibility','assumptions',
    ];
}
