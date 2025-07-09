<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivePromoterContribution extends Model
{
    use HasFactory;

    protected $table = 'live_promoter_contributions';

    protected $fillable = [
        'livestock_id',
        'date',
        'description',
        'value',
    ];

    public function livestock()
    {
        return $this->belongsTo(Livestock::class);
    }
}
