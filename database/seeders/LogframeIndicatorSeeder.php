<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LogframeIndicator;

class LogframeIndicatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample indicators for different sections
        $indicators = [
            [
                'section_key' => 'outreach',
                'indicator_name' => '1.b Estimated corresponding total number of households members',
                'indicator_description' => 'Household members - Number of people',
                'baseline' => 0,
                'mid_term' => 0,
                'end_target' => 0,
                'source' => 'MIS IFAD ORMS',
                'frequency' => 'Monthly / Annual',
                'responsibility' => 'PMU',
                'assumptions' => '(A) Extreme climate change shocks do not occur. (A) Project management and support service capacity is supportive',
                'yearly_targets' => ['2024' => 0, '2025' => 0, '2026' => 0],
                'yearly_results' => ['2024' => 0, '2025' => 0, '2026' => 0],
            ],
            [
                'section_key' => 'project-goal',
                'indicator_name' => '70% of project supported HHs reporting a > 30% increase in their income',
                'indicator_description' => 'Number of HHs - Number of people',
                'baseline' => 0,
                'mid_term' => 0,
                'end_target' => 0,
                'source' => 'Reference studies and HH surveys',
                'frequency' => 'Baseline, MTR, End-line',
                'responsibility' => 'PMU',
                'assumptions' => 'Extreme climate change shocks do not occur',
                'yearly_targets' => ['2024' => 0, '2025' => 0, '2026' => 0],
                'yearly_results' => ['2024' => 0, '2025' => 0, '2026' => 0],
            ],
            [
                'section_key' => 'output-5',
                'indicator_name' => 'Rehabilitation/construction of tanks',
                'indicator_description' => 'Tanks rehabilitated/constructed - Number',
                'baseline' => 0,
                'mid_term' => 0,
                'end_target' => 0,
                'source' => 'MIS',
                'frequency' => 'Monthly',
                'responsibility' => 'PMU',
                'assumptions' => '-',
                'yearly_targets' => ['2024' => 0, '2025' => 0, '2026' => 0],
                'yearly_results' => ['2024' => 0, '2025' => 0, '2026' => 0],
            ],
        ];

        foreach ($indicators as $indicator) {
            LogframeIndicator::create($indicator);
        }
    }
}
