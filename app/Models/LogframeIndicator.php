<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogframeIndicator extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_key',
        'indicator_name',
        'indicator_description',
        'indicator_type',
        'baseline',
        'mid_term',
        'end_target',
        'source',
        'frequency',
        'responsibility',
        'assumptions',
        'yearly_targets',
        'yearly_results',
    ];

    protected $casts = [
        'yearly_targets' => 'array',
        'yearly_results' => 'array',
        'baseline' => 'integer',
        'mid_term' => 'integer',
        'end_target' => 'integer',
    ];

    /**
     * Get the target for a specific year
     */
    public function getTargetForYear($year)
    {
        $targets = $this->yearly_targets ?? [];
        return $targets[$year] ?? 0;
    }

    /**
     * Get the result for a specific year
     */
    public function getResultForYear($year)
    {
        $results = $this->yearly_results ?? [];
        return $results[$year] ?? 0;
    }

    /**
     * Set the target for a specific year
     */
    public function setTargetForYear($year, $value)
    {
        $targets = $this->yearly_targets ?? [];
        $targets[$year] = (int) $value;
        $this->yearly_targets = $targets;
    }

    /**
     * Set the result for a specific year
     */
    public function setResultForYear($year, $value)
    {
        $results = $this->yearly_results ?? [];
        $results[$year] = (int) $value;
        $this->yearly_results = $results;
    }

    /**
     * Get cumulative results up to a specific year
     */
    public function getCumulativeResult($year)
    {
        $results = $this->yearly_results ?? [];
        $cumulative = 0;
        
        foreach ($results as $resultYear => $result) {
            if ($resultYear <= $year) {
                $cumulative += $result;
            }
        }
        
        return $cumulative;
    }

    /**
     * Scope to get indicators by section
     */
    public function scopeBySection($query, $sectionKey)
    {
        return $query->where('section_key', $sectionKey);
    }
}
