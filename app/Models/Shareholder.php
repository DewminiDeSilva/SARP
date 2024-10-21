<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shareholder extends Model
{
    use HasFactory;

    protected $fillable = [
        'agro_id',
        'name',
        'position',
        'nic',
        'gender',
        'date_of_birth',
        'age',
        'contact_number',
        'number_of_shares',
        'share_capital',
        'current_status',
    ];

    public function agro()
    {
        return $this->belongsTo(Agro::class);
    }
}
