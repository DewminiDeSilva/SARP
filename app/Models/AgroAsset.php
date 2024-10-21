<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgroAsset extends Model
{
    use HasFactory;

    protected $fillable = [
        'agro_id',
        'asset_name',
        'asset_value',
    ];

    public function agro()
    {
        return $this->belongsTo(Agro::class);
    }
}
