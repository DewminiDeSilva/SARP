<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveGrantDetail extends Model
{
    use HasFactory;

    protected $table = 'live_grant_details';

    protected $fillable = [
        'livestock_id',
        'date',
        'description',
        'value',
        'grant_issued_by',
    ];

    public function livestock()
    {
        return $this->belongsTo(Livestock::class);
    }
}
