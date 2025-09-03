<?php

// app/Models/ProgressReport.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgressReport extends Model
{
    protected $fillable = [
        'type',
        'period_month',
        'period_quarter',
        'period_year',
        'institution',
        'submission_date',
        'file_path',
        'version',
    ];

    protected $casts = [
        'submission_date' => 'date',
    ];

    // Helpers
    public function periodLabel(): string
    {
        return match ($this->type) {
            'monthly'   => sprintf('%s %d', date('F', mktime(0,0,0,$this->period_month,1)), $this->period_year),
            'quarterly' => sprintf('Q%d %d', $this->period_quarter, $this->period_year),
            'annual'    => (string)$this->period_year,
        };
    }
}

