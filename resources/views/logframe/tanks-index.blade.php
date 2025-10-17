@php
  // inputs expected from controller: $years, $meta, $yearTargets, $yearResults
  $running = 0;
  $cumulative = [];
  foreach ($years as $y) {
    $running += ($yearResults[$y] ?? 0);
    $cumulative[$y] = $running;
  }
  $nl2br = fn($t) => str_replace("\n", '<br>', e($t));
  $delta = function($target, $result){
    $diff = ($result - $target);
    $pct = $target != 0 ? ($diff / max(1e-9, $target)) * 100 : ($result != 0 ? 100 : 0);
    return ['diff' => $diff, 'pct' => $pct];
  };

  // Helper: zero map for all years (used for rows that should start at 0 and be independent)
  $zerosByYear = [];
  foreach ($years as $yy) { $zerosByYear[$yy] = 0; }

  // Latest year helper for setting current-year-only results
  $latestYear = end($years);
  reset($years);
  // Completed tanks per year from Tank module (using updated_at year)
  $completedByYear = [];
  foreach ($years as $yy) {
    $completedByYear[$yy] = \App\Models\TankRehabilitation::where('status', 'Completed')
      ->whereYear('updated_at', $yy)
      ->count();
  }

  // ---- Sections / Parts list (1..15) ----
  // If you later have per-part meta/targets/results, attach them like:
  // 'meta' => [...], 'targets' => [...], 'results' => [...]
  $parts = [
    [
      'key' => 'outreach',
      'title' => ' Outreach',
      'desc' => 'Outreach – awareness, engagement and communications.',
      // Optional per-row overrides shown only for Outreach (others will use single-row fallback)
      'rows' => [
        [
          'ind_name' => '1.b Estimated corresponding total number of households members',
          'ind_desc' => 'Household members - Number of people',
            // Independent values for this row (not linked to tanks): default everything to 0
            'meta'    => [
              'baseline' => 0,
              'mid_term' => 0,
              'end_target' => 0,
              'source' => 'MIS IFAD ORMS',
              'frequency' => 'Monthly / Annual',
              'responsibility' => 'PMU',
              'assumptions' => '(A) Extreme climate change shocks do not occur. (A) Project management and support service capacity is supportive'
            ],
            'targets' => $zerosByYear,
            'results' => $zerosByYear,
          // 'meta' => [...], 'targets' => [...], 'results' => [...] // (optional per-row overrides)
        ],
        [
          'ind_name' => '1.a  Corresponding number of households reached',
          'ind_desc' => 'Women-headed households  - Households',

          // Independent values for this row (not linked to tanks): default everything to 0
            'meta'    => [
              'baseline' => 0,
              'mid_term' => 0,
              'end_target' => 0,
              'source' => 'MIS IFAD ORMS',
              'frequency' => 'Monthly / Annual',
              'responsibility' => 'PMU',
              'assumptions' => '(A) Extreme climate change shocks do not occur. (A) Project management and support service capacity is supportive'
            ],
            'targets' => $zerosByYear,
            'results' => $zerosByYear,
            
          // 'meta' => [...], 'targets' => [...], 'results' => [...] // (optional per-row overrides)
        ],
        [
          'ind_name' => '1.a  Corresponding number of households reached',
          'ind_desc' => 'Non-women-headed households - Households',

          // Independent values for this row (not linked to tanks): default everything to 0
            'meta'    => [
              'baseline' => 0,
              'mid_term' => 0,
              'end_target' => 0,
              'source' => 'MIS IFAD ORMS',
              'frequency' => 'Monthly / Annual',
              'responsibility' => 'PMU',
              'assumptions' => '(A) Extreme climate change shocks do not occur. (A) Project management and support service capacity is supportive'
            ],
            'targets' => $zerosByYear,
            'results' => $zerosByYear,
            
          // 'meta' => [...], 'targets' => [...], 'results' => [...] // (optional per-row overrides)
        ],
        [
          'ind_name' => '1.a  Corresponding number of households reached',
          'ind_desc' => 'Households - Households',

          // Independent values for this row (not linked to tanks): default everything to 0
            'meta'    => [
              'baseline' => 0,
              'mid_term' => 0,
              'end_target' => 0,
              'source' => 'MIS IFAD ORMS',
              'frequency' => 'Monthly / Annual',
              'responsibility' => 'PMU',
              'assumptions' => '(A) Extreme climate change shocks do not occur. (A) Project management and support service capacity is supportive'
            ],
            'targets' => $zerosByYear,
            'results' => $zerosByYear,
            
          // 'meta' => [...], 'targets' => [...], 'results' => [...] // (optional per-row overrides)
        ],
        [
          'ind_name' => '1  Persons receiving services promoted or supported by the project',
          'ind_desc' => 'Males - Males',

          // Independent values for this row (not linked to tanks): default everything to 0
            'meta'    => [
              'baseline' => 0,
              'mid_term' => 0,
              'end_target' => 0,
              'source' => 'MIS IFAD ORMS',
              'frequency' => 'Monthly / Annual',
              'responsibility' => 'PMU',
              'assumptions' => '(A) Extreme climate change shocks do not occur. (A) Project management and support service capacity is supportive'
            ],
            'targets' => $zerosByYear,
            'results' => $zerosByYear,
            
          // 'meta' => [...], 'targets' => [...], 'results' => [...] // (optional per-row overrides)
        ],
        [
          'ind_name' => '1  Persons receiving services promoted or supported by the project',
          'ind_desc' => 'Females - Females',

          // Independent values for this row (not linked to tanks): default everything to 0
            'meta'    => [
              'baseline' => 0,
              'mid_term' => 0,
              'end_target' => 0,
              'source' => 'MIS IFAD ORMS',
              'frequency' => 'Monthly / Annual',
              'responsibility' => 'PMU',
              'assumptions' => '(A) Extreme climate change shocks do not occur. (A) Project management and support service capacity is supportive'
            ],
            'targets' => $zerosByYear,
            'results' => $zerosByYear,
            
          // 'meta' => [...], 'targets' => [...], 'results' => [...] // (optional per-row overrides)
        ],
        [
          'ind_name' => '1  Persons receiving services promoted or supported by the project',
          'ind_desc' => 'Young - Young people',

          // Independent values for this row (not linked to tanks): default everything to 0
            'meta'    => [
              'baseline' => 0,
              'mid_term' => 0,
              'end_target' => 0,
              'source' => 'MIS IFAD ORMS',
              'frequency' => 'Monthly / Annual',
              'responsibility' => 'PMU',
              'assumptions' => '(A) Extreme climate change shocks do not occur. (A) Project management and support service capacity is supportive'
            ],
            'targets' => $zerosByYear,
            'results' => $zerosByYear,
            
          // 'meta' => [...], 'targets' => [...], 'results' => [...] // (optional per-row overrides)
        ],
        [
          'ind_name' => '1  Persons receiving services promoted or supported by the project',
          'ind_desc' => 'Total number of persons receiving services - Number of people',

          // Independent values for this row (not linked to tanks): default everything to 0
            'meta'    => [
              'baseline' => 0,
              'mid_term' => 0,
              'end_target' => 0,
              'source' => 'MIS IFAD ORMS',
              'frequency' => 'Monthly / Annual',
              'responsibility' => 'PMU',
              'assumptions' => '(A) Extreme climate change shocks do not occur. (A) Project management and support service capacity is supportive'
            ],
            'targets' => $zerosByYear,
            'results' => $zerosByYear,
            
          // 'meta' => [...], 'targets' => [...], 'results' => [...] // (optional per-row overrides)
        ],
        [
          'ind_name' => '1  Persons receiving services promoted or supported by the project',
          'ind_desc' => 'Male - Percentage (%)',

          // Independent values for this row (not linked to tanks): default everything to 0
            'meta'    => [
              'baseline' => 0,
              'mid_term' => 0,
              'end_target' => 0,
              'source' => 'MIS IFAD ORMS',
              'frequency' => 'Monthly / Annual',
              'responsibility' => 'PMU',
              'assumptions' => '(A) Extreme climate change shocks do not occur. (A) Project management and support service capacity is supportive'
            ],
            'targets' => $zerosByYear,
            'results' => $zerosByYear,
            
          // 'meta' => [...], 'targets' => [...], 'results' => [...] // (optional per-row overrides)
        ],
        [
          'ind_name' => '1  Persons receiving services promoted or supported by the project',
          'ind_desc' => 'Female - Percentage (%)',

          // Independent values for this row (not linked to tanks): default everything to 0
            'meta'    => [
              'baseline' => 0,
              'mid_term' => 0,
              'end_target' => 0,
              'source' => 'MIS IFAD ORMS',
              'frequency' => 'Monthly / Annual',
              'responsibility' => 'PMU',
              'assumptions' => '(A) Extreme climate change shocks do not occur. (A) Project management and support service capacity is supportive'
            ],
            'targets' => $zerosByYear,
            'results' => $zerosByYear,
            
          // 'meta' => [...], 'targets' => [...], 'results' => [...] // (optional per-row overrides)
        ],
       
        
      ],
    ],
    [
      'key' => 'project-goal',
      'title' => ' Project Goal', 
      'desc' => 'Contribute to smallholder poverty reduction, food security and nutrition in target Dry Zone districts.',
      'rows' => [
        [
  'ind_name' => '70% of project supported HHs reporting a > 30% increase in their income',
  'ind_desc' => 'Number of HHs - Number of people',

  'meta'    => [
    'baseline' => 0,
    'mid_term' => 0,
    'end_target' => 0,
    'source' => 'Reference studies and HH surveys',
    'frequency' => 'Baseline, MTR, End-line',
    'responsibility' => 'PMU',
    'assumptions' => 'Extreme climate change shocks do not occur',
  ],
  'targets' => $zerosByYear,
  'results' => $zerosByYear,
],

[
  'ind_name' => '% HH reporting improved food security',
  'ind_desc' => 'Households - Percentage (%)',

  'meta' => [
    'baseline' => 0,
    'mid_term' => 0,
    'end_target' => 0,
    'source' => 'Food Insecurity Experience Scale (FIES) assessment',
    'frequency' => 'Baseline, MTR, End-line',
    'responsibility' => 'PMU',
    'assumptions' => 'Extreme climate change shocks do not occur',
  ],
  'targets' => $zerosByYear,
  'results' => $zerosByYear,
],

      ],
    ],
    [
      'key' => 'dev-obj',
      'title' => ' Development Objective', 
      'desc' => 'Build resilience and market participation of rural households in areas affected by climate change.',
      'rows' => [
        [
  'ind_name' => 'No. of individual entrepreneurs and HH report a > 50% increase in resilience score',
  'ind_desc' => 'Individuals / HH - Number',

  'meta' => [
    'baseline' => 0,
    'mid_term' => 0,
    'end_target' => 0,
    'source' => 'Reference studies and HH surveys',
    'frequency' => 'Baseline, MTR, End-line',
    'responsibility' => 'PMU',
    'assumptions' => 'A) Extreme climate change shocks do not occur. 
R) Population increases may jeopardize sustainability of management systems. 
A) Sustainable and qualified business service providers are available to provide access to services',
  ],
  'targets' => $zerosByYear,
  'results' => $zerosByYear,
],

[
  'ind_name' => '1.2.8  Women reporting minimum dietary diversity (MDDW)',
  'ind_desc' => 'Women (%) - Percentage (%)',

  'meta'    => [
    'baseline' => 0,
    'mid_term' => 0,
    'end_target' => 0,
    'source' => 'COI Survey',
    'frequency' => 'Baseline / MTR / Endline',
    'responsibility' => 'PMU',
    'assumptions' => 'A) Extreme climate change shocks do not occur. R) Population increases may jeopardize sustainability of management systems. A) Sustainable and qualified business service providers are available to provide access to services',
  ],
  'targets' => $zerosByYear,
  'results' => $zerosByYear,
],
[
  'ind_name' => '1.2.8  Women reporting minimum dietary diversity (MDDW)',
  'ind_desc' => 'Women (number) - Females',

  'meta'    => [
    'baseline' => 0,
    'mid_term' => 0,
    'end_target' => 0,
    'source' => 'COI Survey',
    'frequency' => 'Baseline / MTR / Endline',
    'responsibility' => 'PMU',
    'assumptions' => 'A) Extreme climate change shocks do not occur. R) Population increases may jeopardize sustainability of management systems. A) Sustainable and qualified business service providers are available to provide access to services',
  ],
  'targets' => $zerosByYear,
  'results' => $zerosByYear,
],
[
  'ind_name' => '1.2.8  Women reporting minimum dietary diversity (MDDW)',
  'ind_desc' => 'Households (%) - Percentage (%)',

  'meta'    => [
    'baseline' => 0,
    'mid_term' => 0,
    'end_target' => 0,
    'source' => 'COI Survey',
    'frequency' => 'Baseline / MTR / Endline',
    'responsibility' => 'PMU',
    'assumptions' => 'A) Extreme climate change shocks do not occur. R) Population increases may jeopardize sustainability of management systems. A) Sustainable and qualified business service providers are available to provide access to services',
  ],
  'targets' => $zerosByYear,
  'results' => $zerosByYear,
],
[
  'ind_name' => '1.2.8  Women reporting minimum dietary diversity (MDDW)',
  'ind_desc' => 'Households (number) - Households',

  'meta'    => [
    'baseline' => 0,
    'mid_term' => 0,
    'end_target' => 0,
    'source' => 'COI Survey',
    'frequency' => 'Baseline / MTR / Endline',
    'responsibility' => 'PMU',
    'assumptions' => 'A) Extreme climate change shocks do not occur. R) Population increases may jeopardize sustainability of management systems. A) Sustainable and qualified business service providers are available to provide access to services',
  ],
  'targets' => $zerosByYear,
  'results' => $zerosByYear,
],
[
  'ind_name' => '1.2.8  Women reporting minimum dietary diversity (MDDW)',
  'ind_desc' => 'Household members - Number of people',

  'meta'    => [
    'baseline' => 0,
    'mid_term' => 0,
    'end_target' => 0,
    'source' => 'COI Survey',
    'frequency' => 'Baseline / MTR / Endline',
    'responsibility' => 'PMU',
    'assumptions' => 'A) Extreme climate change shocks do not occur. R) Population increases may jeopardize sustainability of management systems. A) Sustainable and qualified business service providers are available to provide access to services',
  ],
  'targets' => $zerosByYear,
  'results' => $zerosByYear,
],

      ],
    ],
    [
      'key' => 'outcome-1',
      'title' => ' Outcome',
      'desc' => 'Climate-resilient and value-chain capacity built.',
      'rows' => [
        // 1) No. of producer organizations ...
        [
  'ind_name' => 'No. of producer organizations with capacity to manage group enterprises in a financially profitable and sustainable way',
  'ind_desc' => 'Number of POs - Number',
  'meta'    => [
    'baseline' => 0,
    'mid_term' => 0,
    'end_target' => 0,
    'source' => 'Capacity Assessment / Annual Financial Reports',
    'frequency' => 'Baseline / MTR / Endline',
    'responsibility' => 'PMU',
    'assumptions' => '-',
  ],
  'targets' => $zerosByYear,
  'results' => $zerosByYear,
],

        // 2) Number of smallholder farmers, women and youth managing their enterprises profitably
        [
  'ind_name' => 'Number of smallholder farmers, women and youth managing their enterprises profitably',
  'ind_desc' => 'Males - Number',
  'meta'    => [
    'baseline' => 0,
    'mid_term' => 0,
    'end_target' => 0,
    'source' => 'Capacity Assessment / Annual Financial Reports',
    'frequency' => 'Baseline / MTR / Endline',
    'responsibility' => 'PMU',
    'assumptions' => '-',
  ],
  'targets' => $zerosByYear,
  'results' => $zerosByYear,
],
[
  'ind_name' => 'Number of smallholder farmers, women and youth managing their enterprises profitably',
  'ind_desc' => 'Females - Number',
  'meta'    => [
    'baseline' => 0,
    'mid_term' => 0,
    'end_target' => 0,
    'source' => 'Capacity Assessment / Annual Financial Reports',
    'frequency' => 'Baseline / MTR / Endline',
    'responsibility' => 'PMU',
    'assumptions' => '-',
  ],
  'targets' => $zerosByYear,
  'results' => $zerosByYear,
],
[
  'ind_name' => 'Number of smallholder farmers, women and youth managing their enterprises profitably',
  'ind_desc' => 'Young - Number',
  'meta'    => [
    'baseline' => 0,
    'mid_term' => 0,
    'end_target' => 0,
    'source' => 'Capacity Assessment / Annual Financial Reports',
    'frequency' => 'Baseline / MTR / Endline',
    'responsibility' => 'PMU',
    'assumptions' => '-',
  ],
  'targets' => $zerosByYear,
  'results' => $zerosByYear,
],
[
  'ind_name' => 'Number of smallholder farmers, women and youth managing their enterprises profitably',
  'ind_desc' => 'Not Young - Number',
  'meta'    => [
    'baseline' => 0,
    'mid_term' => 0,
    'end_target' => 0,
    'source' => 'Capacity Assessment / Annual Financial Reports',
    'frequency' => 'Baseline / MTR / Endline',
    'responsibility' => 'PMU',
    'assumptions' => '-',
  ],
  'targets' => $zerosByYear,
  'results' => $zerosByYear,
],
[
  'ind_name' => 'Number of smallholder farmers, women and youth managing their enterprises profitably',
  'ind_desc' => 'Number of people - Number of people',
  'meta'    => [
    'baseline' => 0,
    'mid_term' => 0,
    'end_target' => 0,
    'source' => 'Capacity Assessment / Annual Financial Reports',
    'frequency' => 'Baseline / MTR / Endline',
    'responsibility' => 'PMU',
    'assumptions' => '-',
  ],
  'targets' => $zerosByYear,
  'results' => $zerosByYear,
],


        // 3) 3.2.2 Households reporting adoption ...
        [
  'ind_name' => '3.2.2  Households reporting adoption of environmentally sustainable and climate-resilient technologies and practices',
  'ind_desc' => 'Total number of household members - Number of people',
  'meta'    => [
    'baseline' => 0,
    'mid_term' => 0,
    'end_target' => 0,
    'source' => 'COI survey',
    'frequency' => 'Baseline / MTR / Endline',
    'responsibility' => 'PMU',
    'assumptions' => '-',
  ],
  'targets' => $zerosByYear,
  'results' => $zerosByYear,
],
[
  'ind_name' => '3.2.2  Households reporting adoption of environmentally sustainable and climate-resilient technologies and practices',
  'ind_desc' => 'Households - Percentage (%)',
  'meta'    => [
    'baseline' => 0,
    'mid_term' => 0,
    'end_target' => 0,
    'source' => 'COI survey',
    'frequency' => 'Baseline / MTR / Endline',
    'responsibility' => 'PMU',
    'assumptions' => '-',
  ],
  'targets' => $zerosByYear,
  'results' => $zerosByYear,
],
[
  'ind_name' => '3.2.2  Households reporting adoption of environmentally sustainable and climate-resilient technologies and practices',
  'ind_desc' => 'Households - Households',
  'meta'    => [
    'baseline' => 0,
    'mid_term' => 0,
    'end_target' => 0,
    'source' => 'COI survey',
    'frequency' => 'Baseline / MTR / Endline',
    'responsibility' => 'PMU',
    'assumptions' => '-',
  ],
  'targets' => $zerosByYear,
  'results' => $zerosByYear,
],


        // 4) % increase in average volume and value of sales through 4P agreements
        [
  'ind_name' => '% increase in average volume and value of sales through 4P agreements',
  'ind_desc' => '% of average volume and value of sales - Percentage (%)',
  'meta'    => [
    'baseline' => 0,
    'mid_term' => 0,
    'end_target' => 0,
    'source' => '4P Studies / Market Studies',
    'frequency' => 'Midline / Endline',
    'responsibility' => 'PMU',
    'assumptions' => '-',
  ],
  'targets' => $zerosByYear,
  'results' => $zerosByYear,
],

      ],
    ],
    [
      'key' => 'output-1',
      'title' => ' Output',
      'desc' => "Service providers and producers' groups created and capacitated for better land and water management.",
      'rows' => [
        // 1) Number of water user associations supported to manage climate-related risks
        [
  'ind_name' => 'Number of water user associations supported to manage climate-related risks',
  'ind_desc' => 'No. water user associations - Number',
  'meta'    => [
    'baseline' => 0,
    'mid_term' => 0,
    'end_target' => 0,
    'source' => 'Baseline / MTR / Endline surveys',
    'frequency' => 'Baseline / MTR / Endline',
    'responsibility' => 'PMU',
    'assumptions' => '-',
  ],
  'targets' => $zerosByYear,
  'results' => $zerosByYear,
],


[
  'ind_name' => '3.1.1  Groups supported to sustainably manage natural resources and climate-related risks',
  'ind_desc' => 'Total size of groups - Number of people',
  'meta'    => [
    'baseline' => 0,
    'mid_term' => 0,
    'end_target' => 0,
    'source' => 'Specific Technical and project activity reports',
    'frequency' => 'Monthly',
    'responsibility' => 'PMU',
    'assumptions' => '-',
  ],
  'targets' => $zerosByYear,
  'results' => $zerosByYear,
],
[
  'ind_name' => '3.1.1  Groups supported to sustainably manage natural resources and climate-related risks',
  'ind_desc' => 'Groups supported - Groups',
  'meta'    => [
    'baseline' => 0, 'mid_term' => 0, 'end_target' => 0,
    'source' => 'Specific Technical and project activity reports',
    'frequency' => 'Monthly', 'responsibility' => 'PMU', 'assumptions' => '-',
  ],
  'targets' => $zerosByYear, 'results' => $zerosByYear,
],
[
  'ind_name' => '3.1.1  Groups supported to sustainably manage natural resources and climate-related risks',
  'ind_desc' => 'Males - Males',
  'meta'    => [
    'baseline' => 0, 'mid_term' => 0, 'end_target' => 0,
    'source' => 'Specific Technical and project activity reports',
    'frequency' => 'Monthly', 'responsibility' => 'PMU', 'assumptions' => '-',
  ],
  'targets' => $zerosByYear, 'results' => $zerosByYear,
],
[
  'ind_name' => '3.1.1  Groups supported to sustainably manage natural resources and climate-related risks',
  'ind_desc' => 'Females - Females',
  'meta'    => [
    'baseline' => 0, 'mid_term' => 0, 'end_target' => 0,
    'source' => 'Specific Technical and project activity reports',
    'frequency' => 'Monthly', 'responsibility' => 'PMU', 'assumptions' => '-',
  ],
  'targets' => $zerosByYear, 'results' => $zerosByYear,
],
[
  'ind_name' => '3.1.1  Groups supported to sustainably manage natural resources and climate-related risks',
  'ind_desc' => 'Young - Young people',
  'meta'    => [
    'baseline' => 0, 'mid_term' => 0, 'end_target' => 0,
    'source' => 'Specific Technical and project activity reports',
    'frequency' => 'Monthly', 'responsibility' => 'PMU', 'assumptions' => '-',
  ],
  'targets' => $zerosByYear, 'results' => $zerosByYear,
],
[
  'ind_name' => '3.1.1  Groups supported to sustainably manage natural resources and climate-related risks',
  'ind_desc' => 'Indigenous people - Indigenous people',
  'meta'    => [
    'baseline' => 0, 'mid_term' => 0, 'end_target' => 0,
    'source' => 'Specific Technical and project activity reports',
    'frequency' => 'Monthly', 'responsibility' => 'PMU', 'assumptions' => '-',
  ],
  'targets' => $zerosByYear, 'results' => $zerosByYear,
],



      ],
    ],
    [
  'key' => 'output-2',
  'title' => ' Output',
  'desc' => "Service providers and producers' groups created and capacitated for better land and water management.",
  'rows' => [
    [
      'ind_name' => '3.1.1  Groups supported to sustainably manage natural resources and climate-related risks',
      'ind_desc' => 'Total size of groups - Number of people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'Specific Technical and project activity reports',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Technical assistance is available through WFP in SLM',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '3.1.1  Groups supported to sustainably manage natural resources and climate-related risks',
      'ind_desc' => 'Groups supported - Groups',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'Specific Technical and project activity reports',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Technical assistance is available through WFP in SLM',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '3.1.1  Groups supported to sustainably manage natural resources and climate-related risks',
      'ind_desc' => 'Males - Males',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'Specific Technical and project activity reports',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Technical assistance is available through WFP in SLM',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '3.1.1  Groups supported to sustainably manage natural resources and climate-related risks',
      'ind_desc' => 'Females - Females',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'Specific Technical and project activity reports',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Technical assistance is available through WFP in SLM',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '3.1.1  Groups supported to sustainably manage natural resources and climate-related risks',
      'ind_desc' => 'Young - Young people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'Specific Technical and project activity reports',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Technical assistance is available through WFP in SLM',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '3.1.1  Groups supported to sustainably manage natural resources and climate-related risks',
      'ind_desc' => 'Indigenous people - Indigenous people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'Specific Technical and project activity reports',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Technical assistance is available through WFP in SLM',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
      ],
    ],
    [
  'key' => 'output-3',
  'title' => ' Output',
  'desc' => 'Farmers, especially women and youth, trained in business and marketing.',
  'rows' => [
    // Indicator 1: 2.1.2 Persons trained in income-generating activities or business management
    [
      'ind_name' => '2.1.2 Persons trained in income-generating activities or business management',
      'ind_desc' => 'Males - Males',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Training Reports',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Sustainable and qualified business service providers are available to provide access to services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '2.1.2 Persons trained in income-generating activities or business management',
      'ind_desc' => 'Females - Females',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Training Reports',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Sustainable and qualified business service providers are available to provide access to services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '2.1.2 Persons trained in income-generating activities or business management',
      'ind_desc' => 'Young - Young people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Training Reports',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Sustainable and qualified business service providers are available to provide access to services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '2.1.2 Persons trained in income-generating activities or business management',
      'ind_desc' => 'Persons trained in IGAs or BM (total) - Number of people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Training Reports',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Sustainable and qualified business service providers are available to provide access to services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],

    // Indicator 2: No. of persons engaged in 4Ps
    [
      'ind_name' => 'No. of persons engaged in 4Ps',
      'ind_desc' => 'Total persons participating - Number of people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Sustainable and qualified business service providers are available to provide access to services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => 'No. of persons engaged in 4Ps',
      'ind_desc' => 'Males - Males',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Sustainable and qualified business service providers are available to provide access to services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => 'No. of persons engaged in 4Ps',
      'ind_desc' => 'Females - Females',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Sustainable and qualified business service providers are available to provide access to services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => 'No. of persons engaged in 4Ps',
      'ind_desc' => 'Young - Young people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Sustainable and qualified business service providers are available to provide access to services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
  

      ],
    ],
    [
  'key' => 'output-4',
  'title' => ' Output',
  'desc' => 'Advocacy and policy meetings conducted.',
  'rows' => [
    [
      'ind_name' => 'Policy 1  Policy-relevant knowledge products completed',
      'ind_desc' => 'Number - Knowledge Products',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
  

      ],
    ],
    [
  'key' => 'outcome-2',
  'title' => ' Outcome',
  'desc' => 'Climate-resilient climate change and value-chain investments made.',
  'rows' => [
    // 1) Households reporting improved access to land, forests, water or water bodies for production purposes
    [
      'ind_name' => '1.2.1  Households reporting improved access to land, forests, water or water bodies for production purposes',
      'ind_desc' => 'Households reporting improved access to water - Percentage (%)',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'COI survey',
        'frequency' => 'Baseline / MTR / Endline',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '1.2.1  Households reporting improved access to land, forests, water or water bodies for production purposes',
      'ind_desc' => 'Size of households reporting improved access to water - Number of people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'COI survey',
        'frequency' => 'Baseline / MTR / Endline',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '1.2.1  Households reporting improved access to land, forests, water or water bodies for production purposes',
      'ind_desc' => 'Total no. of households reporting improved access to water - Households',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'COI survey',
        'frequency' => 'Baseline / MTR / Endline',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],

    // 2) 4P partnerships agreements signed by rural enterprises
    [
      'ind_name' => '4P partnerships agreements signed by rural enterprises',
      'ind_desc' => '4P partnership agreements signed - Number',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / 4P Studies',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],

    // 3) Persons with new jobs/employment opportunities
    [
      'ind_name' => '2.2.1  Persons with new jobs/employment opportunities',
      'ind_desc' => 'Males - Males',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'COI Survey',
        'frequency' => 'Midline / Endline',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '2.2.1  Persons with new jobs/employment opportunities',
      'ind_desc' => 'Females - Females',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'COI Survey',
        'frequency' => 'Midline / Endline',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '2.2.1  Persons with new jobs/employment opportunities',
      'ind_desc' => 'Young - Young people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'COI Survey',
        'frequency' => 'Midline / Endline',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '2.2.1  Persons with new jobs/employment opportunities',
      'ind_desc' => 'Total number of persons with new jobs/employment opportunities - Number of people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'COI Survey',
        'frequency' => 'Midline / Endline',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
  
      ],
    ],
    [
  'key' => 'output-5',
  'title' => ' Output',
  'desc' => 'Minor irrigation tanks and water harvesting infrastructure constructed or rehabilitated.',
  'rows' => [
    [
      'ind_name' => 'Rehabilitation/construction of tanks',
      'ind_desc' => 'Tanks rehabilitated/constructed - Number',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $completedByYear,
    ],

    // 2) Farmland under water-related infrastructure constructed/rehabilitated
    [
      'ind_name' => '1.1.2  Farmland under water-related infrastructure constructed/rehabilitated',
      'ind_desc' => 'Hectares of land - Area (ha)',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],

    // 3) Market, processing or storage facilities constructed or rehabilitated
    [
      'ind_name' => '2.1.6  Market, processing or storage facilities constructed or rehabilitated',
      'ind_desc' => 'Total number of facilities - Facilities',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '2.1.6  Market, processing or storage facilities constructed or rehabilitated',
      'ind_desc' => 'Market facilities constructed/rehabilitated - Facilities',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '2.1.6  Market, processing or storage facilities constructed or rehabilitated',
      'ind_desc' => 'Processing facilities constructed/rehabilitated - Facilities',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '2.1.6  Market, processing or storage facilities constructed or rehabilitated',
      'ind_desc' => 'Storage facilities constructed/rehabilitated - Facilities',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],

      ],
    ],
    [
  'key' => 'output-6',
  'title' => ' Output',
  'desc' => 'Beneficiaries with access to market infrastructure and business services.',
  'rows' => [
    // 1) Persons in rural areas accessing financial services
    [
      'ind_name' => '1.1.5  Persons in rural areas accessing financial services',
      'ind_desc' => 'Men in rural areas accessing financial services - credit - Males',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Bank / MFI NBFI Documents',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '1.1.5  Persons in rural areas accessing financial services',
      'ind_desc' => 'Women in rural areas accessing financial services - credit - Females',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Bank / MFI NBFI Documents',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '1.1.5  Persons in rural areas accessing financial services',
      'ind_desc' => 'Young people in rural areas accessing financial services - credit - Young people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Bank / MFI NBFI Documents',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '1.1.5  Persons in rural areas accessing financial services',
      'ind_desc' => 'Total persons accessing financial services - credit - Number of people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Bank / MFI NBFI Documents',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],

    // 2) Households provided with targeted support to improve their nutrition
    [
      'ind_name' => '1.1.8  Households provided with targeted support to improve their nutrition',
      'ind_desc' => 'Total persons participating - Number of people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Training Reports',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '1.1.8  Households provided with targeted support to improve their nutrition',
      'ind_desc' => 'Males - Males',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Training Reports',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '1.1.8  Households provided with targeted support to improve their nutrition',
      'ind_desc' => 'Females - Females',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Training Reports',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '1.1.8  Households provided with targeted support to improve their nutrition',
      'ind_desc' => 'Households - Households',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Training Reports',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '1.1.8  Households provided with targeted support to improve their nutrition',
      'ind_desc' => 'Household members benefitted - Number of people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Training Reports',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '1.1.8  Households provided with targeted support to improve their nutrition',
      'ind_desc' => 'Young - Young people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Training Reports',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],

    // 3) No. of HHs benefited rural feeder roads constructed and/ or rehabilitated
    [
      'ind_name' => 'No. of HHs benefited rural feeder roads constructed and/ or rehabilitated',
      'ind_desc' => 'Households - Number',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],

    // 4) Roads constructed, rehabilitated or upgraded
    [
      'ind_name' => '2.1.5: Roads constructed, rehabilitated or upgraded',
      'ind_desc' => 'Length of roads (km)',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
  
      ],
    ],
    [
  'key' => 'outcome-3',
  'title' => ' Outcome',
  'desc' => 'Climate-resilient climate change and value-chain investments made.',
  'rows' => [
    // 1) Number of smallholder farmers, women, and youth managing their enterprises profitably
    [
      'ind_name' => 'Number of smallholder farmers, women and youth managing their enterprises profitably',
      'ind_desc' => 'Males - Number',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'Baseline / MTR / Endline surveys',
        'frequency' => 'Baseline / MTR / Endline',
        'responsibility' => 'PMU',
        'assumptions' => 'Extreme climate change shocks do not occur; Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => 'Number of smallholder farmers, women and youth managing their enterprises profitably',
      'ind_desc' => 'Females - Number',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'Baseline / MTR / Endline surveys',
        'frequency' => 'Baseline / MTR / Endline',
        'responsibility' => 'PMU',
        'assumptions' => 'Extreme climate change shocks do not occur; Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => 'Number of smallholder farmers, women and youth managing their enterprises profitably',
      'ind_desc' => 'Young - Number',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'Baseline / MTR / Endline surveys',
        'frequency' => 'Baseline / MTR / Endline',
        'responsibility' => 'PMU',
        'assumptions' => 'Extreme climate change shocks do not occur; Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => 'Number of smallholder farmers, women and youth managing their enterprises profitably',
      'ind_desc' => 'Not Young - Number',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'Baseline / MTR / Endline surveys',
        'frequency' => 'Baseline / MTR / Endline',
        'responsibility' => 'PMU',
        'assumptions' => 'Extreme climate change shocks do not occur; Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => 'Number of smallholder farmers, women and youth managing their enterprises profitably',
      'ind_desc' => 'Number of people - Number of people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'Baseline / MTR / Endline surveys',
        'frequency' => 'Baseline / MTR / Endline',
        'responsibility' => 'PMU',
        'assumptions' => 'Extreme climate change shocks do not occur; Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],

    // 2) No. of farmers, women and youth reporting the use of knowledge in business and marketing
    [
      'ind_name' => 'No. of farmers, women and youth reporting the use of knowledge in business and marketing',
      'ind_desc' => 'Males - Number',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'Baseline / MTR / Endline surveys',
        'frequency' => 'Baseline / MTR / Endline',
        'responsibility' => 'PMU',
        'assumptions' => 'Extreme climate change shocks do not occur; Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => 'No. of farmers, women and youth reporting the use of knowledge in business and marketing',
      'ind_desc' => 'Females - Number',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'Baseline / MTR / Endline surveys',
        'frequency' => 'Baseline / MTR / Endline',
        'responsibility' => 'PMU',
        'assumptions' => 'Extreme climate change shocks do not occur; Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => 'No. of farmers, women and youth reporting the use of knowledge in business and marketing',
      'ind_desc' => 'Number of people - Number of people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'Baseline / MTR / Endline surveys',
        'frequency' => 'Baseline / MTR / Endline',
        'responsibility' => 'PMU',
        'assumptions' => 'Extreme climate change shocks do not occur; Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => 'No. of farmers, women and youth reporting the use of knowledge in business and marketing',
      'ind_desc' => 'Young - Number',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'Baseline / MTR / Endline surveys',
        'frequency' => 'Baseline / MTR / Endline',
        'responsibility' => 'PMU',
        'assumptions' => 'Extreme climate change shocks do not occur; Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => 'No. of farmers, women and youth reporting the use of knowledge in business and marketing',
      'ind_desc' => 'Not Young - Number',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'Baseline / MTR / Endline surveys',
        'frequency' => 'Baseline / MTR / Endline',
        'responsibility' => 'PMU',
        'assumptions' => 'Extreme climate change shocks do not occur; Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],

    // 3) 1.2.1 Households reporting improved access ...
    [
      'ind_name' => '1.2.1  Households reporting improved access to land, forests, water or water bodies for production purposes',
      'ind_desc' => 'Households reporting improved access to water - Percentage (%)',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'COI survey',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Extreme climate change shocks do not occur; Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '1.2.1  Households reporting improved access to land, forests, water or water bodies for production purposes',
      'ind_desc' => 'Size of households reporting improved access to water - Number of people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'COI survey',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Extreme climate change shocks do not occur; Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '1.2.1  Households reporting improved access to land, forests, water or water bodies for production purposes',
      'ind_desc' => 'Total no. of households reporting improved access to water - Households',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'COI survey',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Extreme climate change shocks do not occur; Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],

    // 4) 3.2.2 Households reporting adoption ...
    [
      'ind_name' => '3.2.2  Households reporting adoption of environmentally sustainable and climate-resilient technologies and practices',
      'ind_desc' => 'Total number of household members - Number of people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'COI survey',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Extreme climate change shocks do not occur; Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '3.2.2  Households reporting adoption of environmentally sustainable and climate-resilient technologies and practices',
      'ind_desc' => 'Households - Percentage (%)',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'COI survey',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Extreme climate change shocks do not occur; Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '3.2.2  Households reporting adoption of environmentally sustainable and climate-resilient technologies and practices',
      'ind_desc' => 'Households - Households',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'COI survey',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Extreme climate change shocks do not occur; Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],

    // 5) Supported rural enterprises reporting an increase in profit
    [
      'ind_name' => '2.2.2  Supported rural enterprises reporting an increase in profit',
      'ind_desc' => 'Number of enterprises - Enterprises',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'COI survey',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Extreme climate change shocks do not occur; Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '2.2.2  Supported rural enterprises reporting an increase in profit',
      'ind_desc' => 'Percentage of enterprises - Percentage (%)',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'COI survey',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Extreme climate change shocks do not occur; Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '2.2.2  Supported rural enterprises reporting an increase in profit',
      'ind_desc' => 'Farm - Farms',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'COI survey',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Extreme climate change shocks do not occur; Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],

    // 6) Partnerships agreements signed by rural enterprises
    [
      'ind_name' => 'Partnerships agreements signed by rural enterprises',
      'ind_desc' => 'Partnership agreements signed - Number - Number',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Extreme climate change shocks do not occur; Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],

    // 7) Rehabilitation/construction of tanks (wired to dynamic per-year completed counts)
    [
      'ind_name' => 'Rehabilitation/construction of tanks',
      'ind_desc' => 'Tanks rehabilitated/constructed - Number',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Extreme climate change shocks do not occur; Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $completedByYear,
    ],
  
      ],
    ],
    [
  'key' => 'output-7',
  'title' => ' Output',
  'desc' => 'Minor irrigation tanks and water harvesting infrastructure constructed or rehabilitated.',
  'rows' => [
    // 1) 1.1.2 Farmland under water-related infrastructure constructed/rehabilitated
    [
      'ind_name' => '1.1.2  Farmland under water-related infrastructure constructed/rehabilitated',
      'ind_desc' => 'Hectares of land - Area (ha)',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],

    // 2) 2.1.6 Market, processing or storage facilities constructed or rehabilitated
    [
      'ind_name' => '2.1.6  Market, processing or storage facilities constructed or rehabilitated',
      'ind_desc' => 'Total number of facilities - Facilities',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '2.1.6  Market, processing or storage facilities constructed or rehabilitated',
      'ind_desc' => 'Market facilities constructed/rehabilitated - Facilities',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '2.1.6  Market, processing or storage facilities constructed or rehabilitated',
      'ind_desc' => 'Processing facilities constructed/rehabilitated - Facilities',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '2.1.6  Market, processing or storage facilities constructed or rehabilitated',
      'ind_desc' => 'Storage facilities constructed/rehabilitated - Facilities',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],

    // 3) 1.1.5 Persons in rural areas accessing financial services (savings & credit)
    [
      'ind_name' => '1.1.5  Persons in rural areas accessing financial services',
      'ind_desc' => 'Women in rural areas accessing financial services - savings - Females',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Bank Documents',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '1.1.5  Persons in rural areas accessing financial services',
      'ind_desc' => 'Young people in rural areas accessing financial services - savings - Young people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Bank Documents',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '1.1.5  Persons in rural areas accessing financial services',
      'ind_desc' => 'Men in rural areas accessing financial services - savings - Males',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Bank Documents',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '1.1.5  Persons in rural areas accessing financial services',
      'ind_desc' => 'Men in rural areas accessing financial services - credit - Males',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Bank Documents',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '1.1.5  Persons in rural areas accessing financial services',
      'ind_desc' => 'Women in rural areas accessing financial services - credit - Females',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Bank Documents',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '1.1.5  Persons in rural areas accessing financial services',
      'ind_desc' => 'Young people in rural areas accessing financial services - credit - Young people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Bank Documents',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '1.1.5  Persons in rural areas accessing financial services',
      'ind_desc' => 'Total persons accessing financial services - savings - Number of people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Bank Documents',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '1.1.5  Persons in rural areas accessing financial services',
      'ind_desc' => 'Total persons accessing financial services - credit - Number of people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Bank Documents',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'Sustainable and qualified SLM support is available to provide ecosystem services',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
  

      ],
    ],
    [
  'key' => 'output-8',
  'title' => ' Output',
  'desc' => 'Beneficiaries with access to market infrastructure and business services.',
  'rows' => [
    // 1) No. of HHs utilising rural feeder roads constructed and/ or rehabilitated
    [
      'ind_name' => 'No. of HHs utilising rural feeder roads constructed and/ or rehabilitated',
      'ind_desc' => 'Households - Number',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'A) Local government planning support is available R) District level plans match the geographic targeting of districts and divisions',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],

    // 2) No. of HHs with access to improved support services through the ASCs
    [
      'ind_name' => 'No. of HHs with access to improved support services through the ASCs',
      'ind_desc' => 'Households - Number',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / ASC Reports',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'A) Local government planning support is available R) District level plans match the geographic targeting of districts and divisions',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],

    // 3) 1.1.8 Households provided with targeted support to improve their nutrition
    [
      'ind_name' => '1.1.8  Households provided with targeted support to improve their nutrition',
      'ind_desc' => 'Total persons participating - Number of people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Training Reports',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'A) Local government planning support is available R) District level plans match the geographic targeting of districts and divisions',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '1.1.8  Households provided with targeted support to improve their nutrition',
      'ind_desc' => 'Males - Males',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Training Reports',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'A) Local government planning support is available R) District level plans match the geographic targeting of districts and divisions',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '1.1.8  Households provided with targeted support to improve their nutrition',
      'ind_desc' => 'Females - Females',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Training Reports',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'A) Local government planning support is available R) District level plans match the geographic targeting of districts and divisions',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '1.1.8  Households provided with targeted support to improve their nutrition',
      'ind_desc' => 'Households - Households',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Training Reports',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'A) Local government planning support is available R) District level plans match the geographic targeting of districts and divisions',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '1.1.8  Households provided with targeted support to improve their nutrition',
      'ind_desc' => 'Household members benefitted - Number of people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Training Reports',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'A) Local government planning support is available R) District level plans match the geographic targeting of districts and divisions',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
    [
      'ind_name' => '1.1.8  Households provided with targeted support to improve their nutrition',
      'ind_desc' => 'Young - Young people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Training Reports',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => 'A) Local government planning support is available R) District level plans match the geographic targeting of districts and divisions',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
  ],

    ],
    [
  'key' => 'output-9',
  'title' => ' Output',
  'desc' => 'Beneficiaries with access to market infrastructure and business services.',
  'rows' => [
    // 1) 1.1.5 Persons in rural areas accessing financial services (credit)
    [
      'ind_name' => '1.1.5  Persons in rural areas accessing financial services',
      'ind_desc' => 'Men in rural areas accessing financial services - credit - Males',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Bank / MFI NBFI Documents',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],

    [
      'ind_name' => '1.1.5  Persons in rural areas accessing financial services',
      'ind_desc' => 'Women in rural areas accessing financial services - credit - Females',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Bank / MFI NBFI Documents',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],

    [
      'ind_name' => '1.1.5  Persons in rural areas accessing financial services',
      'ind_desc' => 'Young people in rural areas accessing financial services - credit - Young people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Bank / MFI NBFI Documents',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],

    [
      'ind_name' => '1.1.5  Persons in rural areas accessing financial services',
      'ind_desc' => 'Total persons accessing financial services - credit - Number of people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Bank / MFI NBFI Documents',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],

    // 2) 1.1.8 Households provided with targeted support to improve their nutrition
    [
      'ind_name' => '1.1.8  Households provided with targeted support to improve their nutrition',
      'ind_desc' => 'Total persons participating - Number of people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Training Reports',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],

    [
      'ind_name' => '1.1.8  Households provided with targeted support to improve their nutrition',
      'ind_desc' => 'Males - Males',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Training Reports',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],

    [
      'ind_name' => '1.1.8  Households provided with targeted support to improve their nutrition',
      'ind_desc' => 'Females - Females',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Training Reports',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],

    [
      'ind_name' => '1.1.8  Households provided with targeted support to improve their nutrition',
      'ind_desc' => 'Households - Households',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Training Reports',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],

    [
      'ind_name' => '1.1.8  Households provided with targeted support to improve their nutrition',
      'ind_desc' => 'Household members benefitted - Number of people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Training Reports',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],

    [
      'ind_name' => '1.1.8  Households provided with targeted support to improve their nutrition',
      'ind_desc' => 'Young - Young people',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS / Training Reports',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],

    // 3) No. of HHs benefited rural feeder roads constructed and/ or rehabilitated
    [
      'ind_name' => 'No. of HHs benefited rural feeder roads constructed and/ or rehabilitated',
      'ind_desc' => 'Households - Number',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],

    // 4) 2.1.5: Roads constructed, rehabilitated or upgraded
    [
      'ind_name' => '2.1.5: Roads constructed, rehabilitated or upgraded',
      'ind_desc' => 'Length of roads (km)',
      'meta'    => [
        'baseline' => 0,
        'mid_term' => 0,
        'end_target' => 0,
        'source' => 'MIS',
        'frequency' => 'Monthly',
        'responsibility' => 'PMU',
        'assumptions' => '-',
      ],
      'targets' => $zerosByYear,
      'results' => $zerosByYear,
    ],
  
      ],
    ],
  ];
@endphp

{{-- OLD --}}
{{-- @extends('layouts.app') --}}

{{-- NEW --}}
@extends('layouts.blank')

{{-- remove the @section('header') block if you added it earlier --}}


@section('content')
<style>
/* ====== Inline CSS (no frameworks) ====== */
:root{
  --bg:#f5f7fb; --card:#fff; --line:#e5e7eb; --muted:#6b7280; --text:#1f2937; --accent:#2563eb; --accent-2:#1d4ed8;
  --success:#16a34a; --success-soft:#dcfce7; --warning:#d97706; --warning-soft:#fff7ed; --danger:#dc2626; --danger-soft:#fee2e2;
}
.logframe-wrap{max-width:100%;margin:0 auto;padding:16px;background:linear-gradient(180deg, #f8fafc 0%, #f5f7fb 100%);} 
.card{background:var(--card);border:1px solid var(--line);border-radius:16px;box-shadow:0 1px 2px rgba(0,0,0,.05);} 
.h1{font-size:28px;font-weight:800;color:var(--text);} 
.btn{display:inline-flex;align-items:center;gap:.5rem;padding:.6rem 1rem;border-radius:12px;border:1px solid var(--line);text-decoration:none;color:var(--text);background:#fff;font-size:15px;} 
.btn-primary{background:var(--accent);color:#fff;border-color:var(--accent);} 
.btn-primary:hover{background:var(--accent-2);} 
.btn:hover{background:#f9fafb;} 
.btn.active{background:#eef2ff;border-color:#c7d2fe;}

.table-wrap{position:relative;overflow:auto;}
table{border-collapse:separate;border-spacing:0;width:100%;min-width:1100px;}
th,td{border-top:1px solid var(--line);padding:.85rem .9rem;vertical-align:top;color:var(--text);font-size:16px;}
thead th{position:sticky;top:0;background:#f9fafb;z-index:20;font-weight:600;color:#374151;}
/* 3x zoom mode for extra-large display */
.logframe-wrap.zoom3x .h1{font-size:72px;}
.logframe-wrap.zoom3x th, .logframe-wrap.zoom3x td{font-size:48px;padding:1.2rem 1.25rem;}
.logframe-wrap.zoom3x .btn{font-size:45px;padding:1rem 1.25rem;}
.logframe-wrap.zoom3x .badge, .logframe-wrap.zoom3x .legend, .logframe-wrap.zoom3x .status{font-size:42px;}
.logframe-wrap.zoom3x .delta{font-size:42px;}
.logframe-wrap.zoom3x .progress{height:12px;}
.logframe-wrap.zoom3x .legend .dot{width:1.1rem;height:1.1rem;}

/* 1.5x zoom mode */
.logframe-wrap.zoom15x .h1{font-size:42px;}
.logframe-wrap.zoom15x th, .logframe-wrap.zoom15x td{font-size:24px;padding:1rem 1.1rem;}
.logframe-wrap.zoom15x .btn{font-size:22px;padding:.85rem 1.1rem;}
.logframe-wrap.zoom15x .badge, .logframe-wrap.zoom15x .legend, .logframe-wrap.zoom15x .status{font-size:21px;}
.logframe-wrap.zoom15x .delta{font-size:21px;}
.logframe-wrap.zoom15x .progress{height:9px;}
.logframe-wrap.zoom15x .legend .dot{width:.95rem;height:.95rem;}

/* Emphasis mode */
.logframe-wrap.emph .h1{font-weight:900;}
.logframe-wrap.emph td.desc{font-weight:800;}
.logframe-wrap.emph td.desc{background:linear-gradient(180deg,#fff, #f8fafc);} 
tbody tr:nth-child(2n){background:#f8fafc;}
tbody tr:hover{background:#eff6ff;}
td:first-child, th:first-child{position:sticky;left:0;background:#fff;z-index:10;border-right:1px solid var(--line);max-width:380px;}
th[colspan]{text-align:center;}
.badge{display:inline-flex;border:1px solid var(--line);border-radius:999px;padding:.15rem .6rem;font-size:14px;color:#374151;background:#fff;}
.status{margin:12px 0;padding:.6rem .9rem;border:1px solid #bbf7d0;background:#f0fdf4;color:#166534;border-radius:12px;}
.legend{display:flex;gap:.5rem;flex-wrap:wrap;align-items:center;font-size:14px;color:var(--muted);} 
.legend .dot{width:.75rem;height:.75rem;border-radius:999px;display:inline-block;margin-right:.35rem;border:1px solid var(--line);} 
.legend .ok{background:var(--success-soft);border-color:var(--success);} 
.legend .warn{background:var(--warning-soft);border-color:var(--warning);} 
.legend .bad{background:var(--danger-soft);border-color:var(--danger);} 
.legend .muted{background:#eef2ff;border-color:#c7d2fe;} 

.delta{display:inline-flex;align-items:center;gap:.35rem;font-weight:600;border-radius:10px;padding:.15rem .45rem;border:1px solid transparent;}
.delta.up{color:var(--success);background:var(--success-soft);border-color:rgba(22,163,74,.25);} 
.delta.down{color:var(--danger);background:var(--danger-soft);border-color:rgba(220,38,38,.25);} 
.delta.flat{color:#374151;background:#f3f4f6;border-color:#e5e7eb;} 
.cell-target{text-align:center;}
.cell-result{text-align:center;font-weight:600;}
.cell-result.ok{background:var(--success-soft);} 
.cell-result.warn{background:var(--warning-soft);} 
.cell-result.bad{background:var(--danger-soft);} 
.cell-cum{text-align:center;font-weight:700;background:linear-gradient(180deg,#fafafa 0%,#ffffff 100%);} 
.progress{height:6px;border-radius:999px;background:#e5e7eb;overflow:hidden;margin-top:.35rem;} 
.progress > span{display:block;height:100%;background:var(--accent);} 

/* header polish */
thead th{background:linear-gradient(180deg,#f9fafb 0%, #eef2ff 100%);} 
@media (max-width:640px){
  th,td{padding:.5rem;}
}

/* Accordion (details/summary) */
.section{margin-top:12px;}
.section details{border-top:1px solid var(--line);border-bottom:1px solid var(--line);border-radius:14px;overflow:hidden;background:#fff;}
.section summary{
  padding:12px 14px;cursor:pointer;list-style:none;display:flex;flex-wrap:wrap;gap:.5rem;align-items:center;
  background:linear-gradient(180deg,#f9fafb 0%, #ffffff 100%);
  font-weight:700;color:var(--text);
}
.section summary::-webkit-details-marker{display:none;}
.section .section-title{font-size:18px;}
.section .section-desc{font-weight:500;color:var(--muted);}
.section .section-body{padding:8px 12px 12px 12px;}
.section[open] summary{border-bottom:1px solid var(--line);} 

/* Jump menu */
.jump-wrap{display:flex;align-items:center;gap:.5rem;flex-wrap:wrap;}
.jump-select{padding:.55rem .7rem;border:1px solid var(--line);border-radius:10px;background:#fff;font-size:15px;}
</style>

<div class="logframe-wrap">
  @if(session('status'))
    <div class="status">{{ session('status') }}</div>
  @endif

  <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:12px;">
    <div class="h1">Smallholder Agribusiness and Resilience Project - Logical Framework</div>
    <div style="display:flex;gap:.5rem;">
      <a class="btn" href="{{ route('beneficiary.index') }}">Home</a>
      <a class="btn" href="{{ route('logframe.tanks.index') }}">Refresh</a>
      <!-- <a class="btn btn-primary" href="{{ route('logframe.tanks.create') }}">Create / Edit</a> -->
    </div>
  </div>

  <div class="card" style="padding:.75rem;">
    <div style="display:flex;justify-content:space-between;align-items:center;padding:.25rem;flex-wrap:wrap;gap:.5rem;">
      <div style="display:flex;align-items:center;gap:.5rem;flex-wrap:wrap;">
        <span class="badge">Show Years:</span>
        @foreach($years as $y)
          <label class="btn" style="gap:.35rem;padding:.35rem .6rem;">
            <input type="checkbox" class="yr-toggle" data-year-idx="{{ $loop->index }}" value="{{ $y }}" style="accent-color: var(--accent);">
            <span>{{ $y }}</span>
          </label>
        @endforeach
        <button id="yr-all" class="btn" type="button">All</button>
        <button id="yr-none" class="btn" type="button">None</button>
        <button id="yr-latest" class="btn btn-primary" type="button">Latest</button>
      </div>
      <div style="display:flex;align-items:center;gap:.4rem;flex-wrap:wrap;">
        <span class="badge">Text Size</span>
        <button id="zoom-1x" class="btn active" type="button">1x</button>
        <button id="zoom-15x" class="btn" type="button">1.5x</button>
        <button id="zoom-3x" class="btn" type="button">3x</button>
        <button id="toggle-emph" class="btn" type="button">Emphasis</button>
      </div>
    </div>
  </div>

  <div class="card" style="padding:.75rem;margin-top:8px;">
    <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:.5rem;margin-bottom:.35rem;">
      <div class="jump-wrap">
        <span class="badge">Jump to section</span>
        <select id="jump-select" class="jump-select">
          @foreach($parts as $p)
            <option value="{{ $p['key'] }}">{{ $p['title'] }}</option>
          @endforeach
        </select>
        <button id="open-all" class="btn" type="button">Open all</button>
        <button id="close-all" class="btn" type="button">Close all</button>
      </div>

      <div class="legend">
        <span><i class="dot ok"></i>Better than target</span>
        <span><i class="dot warn"></i>Close to target (±10%)</span>
        <span><i class="dot bad"></i>Below target</span>
        <span><i class="dot muted"></i>Cumulative</span>
      </div>
    </div>
  </div>

  @foreach($parts as $p)
    @php
      // If you have per-part data, attach like $p['meta'] / ['targets'] / ['results']
      $pMeta   = $p['meta']   ?? $meta;
      $pTgts   = $p['targets']?? $yearTargets;
      $pRes    = $p['results']?? $yearResults;

      // Recompute cumulative per part
      $pRunning = 0; $pCum = [];
      foreach ($years as $y) { $pRunning += ($pRes[$y] ?? 0); $pCum[$y] = $pRunning; }

      // Badge label heuristic
      $lower = strtolower($p['title']);
      $badge = str_starts_with($lower, 'outcome') ? 'Outcome' : (str_starts_with($lower, 'output') ? 'Output' : (str_starts_with($lower, '1.') ? 'Component' : 'Component'));
    @endphp

    <div id="{{ $p['key'] }}" class="section card">
      <details {{ $loop->first ? 'open' : '' }}>
        <summary>
          <span class="section-title"><strong>{{ $p['title'] }}</strong></span>
          <span class="badge">{{ $badge }}</span>
          <span class="section-desc">— {{ $p['desc'] }}</span>
        </summary>
        <div class="section-body">
          <div class="table-wrap">
            <table>
              <thead>
                <tr>
                  <th rowspan="2">Indicators Name</th>
                  <th rowspan="2">Description</th>
                  <th rowspan="2">Baseline</th>
                  <th rowspan="2">Mid-Term</th>
                  <th rowspan="2">End Target</th>
                  <th rowspan="2">Source</th>
                  <th rowspan="2">Frequency</th>
                  <th rowspan="2">Responsibility</th>
                  <th rowspan="2">Assumptions</th>
                  @foreach($years as $y)
                    <th class="year-group year-col" data-year-idx="{{ $loop->index }}">Project Yr ({{ $y }})</th>
                  @endforeach
                </tr>
              </thead>
              <tbody>
              @php
                // Rows within a section: if provided in $p['rows'], loop them; otherwise single row fallback
                $rows = $p['rows'] ?? [[ 'ind_name' => $p['title'], 'ind_desc' => $p['desc'] ]];
              @endphp
               @foreach($rows as $row)
                @php
                  $rowMeta = $row['meta'] ?? $pMeta;
                  $rowTgts = $row['targets'] ?? $pTgts;
                  $rowRes  = $row['results'] ?? $pRes;

                  // recompute cumulative per row (in case per-row results differ)
                  $rowRunning = 0; $rowCum = [];
                  foreach ($years as $y) { $rowRunning += ($rowRes[$y] ?? 0); $rowCum[$y] = $rowRunning; }
                @endphp
                 <tr data-part="{{ $p['key'] }}" data-row="{{ $loop->index }}">
                  <td class="desc">
                    <div style="display:flex;justify-content:space-between;align-items:flex-start;gap:8px;">
                      <div><strong>{{ $row['ind_name'] }}</strong></div>
                      <div style="display:flex;gap:4px;flex-shrink:0;">
                         <button type="button" class="btn" style="padding:.25rem .5rem;font-size:12px;" onclick="openRowEditor('{{ $p['key'] }}', {{ $loop->index }})">Edit</button>
                      </div>
                    </div>
                  </td>
                  <td class="desc"><strong>{!! $nl2br($row['ind_desc']) !!}</strong></td>
                   <td style="text-align:center;" data-cell="baseline">{{ $rowMeta['baseline'] }}</td>
                   <td style="text-align:center;" data-cell="mid_term">{{ $rowMeta['mid_term'] }}</td>
                   <td style="text-align:center;font-weight:600;" data-cell="end_target">{{ $rowMeta['end_target'] }}</td>
                  <td style="text-align:center;"><span class="badge">{{ $rowMeta['source'] }}</span></td>
                  <td style="text-align:center;">{{ $rowMeta['frequency'] }}</td>
                  <td style="text-align:center;">{{ $rowMeta['responsibility'] }}</td>
                  <td>{{ $rowMeta['assumptions'] ?? '—' }}</td>

                  @foreach($years as $y)
                    @php
                      $t = (int)($rowTgts[$y] ?? 0);
                      $r = (int)($rowRes[$y] ?? 0);
                      $d = $delta($t, $r);
                      $absPct = abs($d['pct']);
                      $flag = $r >= $t ? 'ok' : ($absPct <= 10 ? 'warn' : 'bad');
                      $arrow = $r > $t ? 'up' : ($r < $t ? 'down' : 'flat');
                      $pctDisp = $t != 0 ? number_format($d['pct'], 1) . '%' : '—';
                      $progress = $t > 0 ? max(0, min(100, round(($r / max(1e-9, $t)) * 100))) : 0;
                    @endphp
                     <td class="year-col" data-year-idx="{{ $loop->index }}" data-year="{{ $y }}">
                      <div style="display:flex;flex-direction:column;gap:.25rem;align-items:stretch;">
                         <div class="cell-target" style="text-align:center;" data-cell="target">Target: {{ $t }}</div>
                         <div class="cell-result {{ $flag }}" style="text-align:center;" data-cell="result">Result: {{ $r }}</div>
                        <div class="delta {{ $arrow }}" title="Result vs Target: {{ $r }} vs {{ $t }} ({{ $pctDisp }})">
                          @if($arrow === 'up') ▲ @elseif($arrow === 'down') ▼ @else ▬ @endif
                          <span>{{ $pctDisp }}</span>
                        </div>
                         <div class="progress"><span style="width: {{ $progress }}%" data-cell="progress"></span></div>
                         <div class="cell-cum" style="text-align:center;" data-cell="cumulative">Cumulative: {{ $rowCum[$y] }}</div>
                      </div>
                    </td>
                  @endforeach
                </tr>
              @endforeach
            </tbody>
            </table>
          </div>
        </div>
      </details>
    </div>
  @endforeach

  <script>
  // Inline editor modal for per-row values (persist to database)
  function openRowEditor(partKey, rowIndex){
    const row = document.querySelector(`tr[data-part="${partKey}"][data-row="${rowIndex}"]`);
    if(!row) return;
    const title = row.querySelector('td.desc strong')?.textContent?.trim() || 'Edit Row';

    // Gather current values
    const baseline = row.querySelector('[data-cell="baseline"]').textContent.trim();
    const midTerm = row.querySelector('[data-cell="mid_term"]').textContent.trim();
    const endTarget = row.querySelector('[data-cell="end_target"]').textContent.trim();
    const yearCells = Array.from(row.querySelectorAll('td.year-col'));

    // Build modal HTML
    const overlay = document.createElement('div');
    overlay.style.position = 'fixed';
    overlay.style.inset = '0';
    overlay.style.background = 'rgba(0,0,0,0.35)';
    overlay.style.zIndex = '9999';

    const modal = document.createElement('div');
    modal.style.position = 'fixed';
    modal.style.top = '50%';
    modal.style.left = '50%';
    modal.style.transform = 'translate(-50%, -50%)';
    modal.style.background = '#fff';
    modal.style.border = '1px solid #e5e7eb';
    modal.style.borderRadius = '14px';
    modal.style.width = 'min(700px, 92vw)';
    modal.style.maxHeight = '85vh';
    modal.style.overflow = 'auto';
    modal.style.boxShadow = '0 10px 25px rgba(0,0,0,0.15)';
    modal.style.padding = '16px';

    const header = document.createElement('div');
    header.style.display = 'flex';
    header.style.justifyContent = 'space-between';
    header.style.alignItems = 'center';
    header.style.marginBottom = '12px';
    header.innerHTML = `<div style="font-weight:800;font-size:18px;">${title} — Edit</div>`;

    const closeBtn = document.createElement('button');
    closeBtn.className = 'btn';
    closeBtn.textContent = 'Close';
    closeBtn.onclick = () => document.body.removeChild(overlay);
    header.appendChild(closeBtn);

    const form = document.createElement('div');
    form.style.display = 'grid';
    form.style.gap = '12px';

    // Meta inputs
    const metaWrap = document.createElement('div');
    metaWrap.innerHTML = `
      <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:12px;">
        <div><label>Baseline</label><input id="edit-baseline" type="number" value="${Number(baseline)||0}" style="width:100%;padding:8px;border:1px solid #e5e7eb;border-radius:10px;"></div>
        <div><label>Mid-Term</label><input id="edit-mid" type="number" value="${Number(midTerm)||0}" style="width:100%;padding:8px;border:1px solid #e5e7eb;border-radius:10px;"></div>
        <div><label>End Target</label><input id="edit-end" type="number" value="${Number(endTarget)||0}" style="width:100%;padding:8px;border:1px solid #e5e7eb;border-radius:10px;"></div>
      </div>
    `;
    form.appendChild(metaWrap);

    // Year inputs
    const yearsWrap = document.createElement('div');
    yearsWrap.innerHTML = `<div style="font-weight:700;margin:8px 0 4px;">Per-Year Values</div>`;
    const yearsGrid = document.createElement('div');
    yearsGrid.style.display = 'grid';
    yearsGrid.style.gridTemplateColumns = 'repeat(auto-fit,minmax(180px,1fr))';
    yearsGrid.style.gap = '10px';

    yearCells.forEach((cell) => {
      const year = cell.getAttribute('data-year');
      const targetText = cell.querySelector('[data-cell="target"]').textContent.replace('Target:','').trim();
      const resultText = cell.querySelector('[data-cell="result"]').textContent.replace('Result:','').trim();
      const block = document.createElement('div');
      block.style.border = '1px solid #e5e7eb';
      block.style.borderRadius = '10px';
      block.style.padding = '10px';
      block.innerHTML = `
        <div style="font-weight:600;margin-bottom:6px;">${year}</div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;">
          <div><label>Target</label><input type="number" class="edit-target" data-year="${year}" value="${Number(targetText)||0}" style="width:100%;padding:8px;border:1px solid #e5e7eb;border-radius:10px;"></div>
          <div><label>Result</label><input type="number" class="edit-result" data-year="${year}" value="${Number(resultText)||0}" style="width:100%;padding:8px;border:1px solid #e5e7eb;border-radius:10px;"></div>
        </div>
      `;
      yearsGrid.appendChild(block);
    });
    yearsWrap.appendChild(yearsGrid);
    form.appendChild(yearsWrap);

    const save = document.createElement('button');
    save.className = 'btn btn-primary';
    save.textContent = 'Save';
    save.onclick = async () => {
      // Show loading state
      save.textContent = 'Saving...';
      save.disabled = true;

      try {
        // Read values
        const newBaseline = Number(document.getElementById('edit-baseline').value)||0;
        const newMid = Number(document.getElementById('edit-mid').value)||0;
        const newEnd = Number(document.getElementById('edit-end').value)||0;
        
        // Targets/results
        const targetInputs = Array.from(modal.querySelectorAll('.edit-target'));
        const resultInputs = Array.from(modal.querySelectorAll('.edit-result'));
        const updatedTargets = {}; 
        const updatedResults = {};
        targetInputs.forEach(inp => { updatedTargets[inp.getAttribute('data-year')] = Number(inp.value)||0; });
        resultInputs.forEach(inp => { updatedResults[inp.getAttribute('data-year')] = Number(inp.value)||0; });

        // Create or update indicator in database
        const indicatorData = {
          section_key: partKey,
          indicator_name: title,
          indicator_description: row.querySelector('td.desc:nth-child(2) strong')?.textContent?.trim() || '',
          baseline: newBaseline,
          mid_term: newMid,
          end_target: newEnd,
          yearly_targets: updatedTargets,
          yearly_results: updatedResults,
          source: 'MIS',
          frequency: 'Monthly',
          responsibility: 'PMU',
          assumptions: 'Extreme climate change shocks do not occur'
        };

        // Check if indicator exists (you might want to add an ID to the row)
        const indicatorId = row.getAttribute('data-indicator-id');
        
        let response;
        if (indicatorId) {
          // Update existing indicator
          response = await fetch(`/api/logframe/indicators/${indicatorId}`, {
            method: 'PUT',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(indicatorData)
          });
        } else {
          // Create new indicator
          response = await fetch('/api/logframe/indicators', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(indicatorData)
          });
        }

        if (!response.ok) {
          throw new Error('Failed to save indicator');
        }

        const result = await response.json();
        
        // Update the row with the new ID if it was created
        if (!indicatorId && result.id) {
          row.setAttribute('data-indicator-id', result.id);
        }

        // Update meta cells
        row.querySelector('[data-cell="baseline"]').textContent = newBaseline;
        row.querySelector('[data-cell="mid_term"]').textContent = newMid;
        row.querySelector('[data-cell="end_target"]').textContent = newEnd;

        // Update year cells visuals
        const yearCols = Array.from(row.querySelectorAll('td.year-col'));
        let running = 0;
        yearCols.forEach(col => {
          const y = col.getAttribute('data-year');
          const t = updatedTargets[y] ?? 0;
          const r = updatedResults[y] ?? 0;
          running += r;
          col.querySelector('[data-cell="target"]').textContent = `Target: ${t}`;
          const resultEl = col.querySelector('[data-cell="result"]');
          resultEl.textContent = `Result: ${r}`;
          // flag/arrow
          const diff = r - t;
          const pct = t !== 0 ? (diff/Math.max(1e-9,t))*100 : (r !== 0 ? 100 : 0);
          const absPct = Math.abs(pct);
          const flag = r >= t ? 'ok' : (absPct <= 10 ? 'warn' : 'bad');
          resultEl.classList.remove('ok','warn','bad');
          resultEl.classList.add(flag);
          const delta = col.querySelector('.delta');
          delta.classList.remove('up','down','flat');
          const arrow = r > t ? 'up' : (r < t ? 'down' : 'flat');
          delta.classList.add(arrow);
          delta.setAttribute('title', `Result vs Target: ${r} vs ${t} (${t!==0?pct.toFixed(1)+'%':'—'})`);
          delta.innerHTML = `${arrow==='up'?'▲':(arrow==='down'?'▼':'▬')} <span>${t!==0?pct.toFixed(1)+'%':'—'}</span>`;
          // progress + cumulative
          col.querySelector('[data-cell="progress"]').style.width = `${t>0?Math.max(0,Math.min(100,Math.round((r/Math.max(1e-9,t))*100))):0}%`;
          col.querySelector('[data-cell="cumulative"]').textContent = `Cumulative: ${running}`;
        });

        document.body.removeChild(overlay);
        
        // Show success message
        showNotification('Indicator saved successfully!', 'success');
        
      } catch (error) {
        console.error('Error saving indicator:', error);
        showNotification('Error saving indicator. Please try again.', 'error');
        save.textContent = 'Save';
        save.disabled = false;
      }
    };

    modal.appendChild(header);
    modal.appendChild(form);
    modal.appendChild(save);
    overlay.appendChild(modal);
    document.body.appendChild(overlay);
  }

  // Notification function
  function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.style.position = 'fixed';
    notification.style.top = '20px';
    notification.style.right = '20px';
    notification.style.padding = '12px 20px';
    notification.style.borderRadius = '8px';
    notification.style.color = '#fff';
    notification.style.fontWeight = '600';
    notification.style.zIndex = '10000';
    notification.textContent = message;
    
    if (type === 'success') {
      notification.style.background = '#10b981';
    } else if (type === 'error') {
      notification.style.background = '#ef4444';
    } else {
      notification.style.background = '#3b82f6';
    }
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
      if (document.body.contains(notification)) {
        document.body.removeChild(notification);
      }
    }, 3000);
  }

  (function(){
    const years = @json(array_values($years));
    const checkboxes = Array.from(document.querySelectorAll('.yr-toggle'));
    const btnAll = document.getElementById('yr-all');
    const btnNone = document.getElementById('yr-none');
    const btnLatest = document.getElementById('yr-latest');
    const wrap = document.querySelector('.logframe-wrap');
    const z1 = document.getElementById('zoom-1x');
    const z15 = document.getElementById('zoom-15x');
    const z3 = document.getElementById('zoom-3x');
    const emph = document.getElementById('toggle-emph');

    const render = () => {
      const visible = new Set(
        checkboxes.filter(cb => cb.checked).map(cb => Number(cb.getAttribute('data-year-idx')))
      );
      document.querySelectorAll('[data-year-idx]').forEach(el => {
        const i = Number(el.getAttribute('data-year-idx'));
        el.style.display = visible.size === 0 ? 'none' : (visible.has(i) ? '' : 'none');
      });
    };

    checkboxes.forEach(cb => cb.addEventListener('change', render));
    btnAll?.addEventListener('click', () => { checkboxes.forEach(cb => cb.checked = true); render(); });
    btnNone?.addEventListener('click', () => { checkboxes.forEach(cb => cb.checked = false); render(); });
    btnLatest?.addEventListener('click', () => {
      checkboxes.forEach((cb, i) => cb.checked = (i === checkboxes.length - 1));
      render();
    });

    const setActive = (btn) => {
      [z1,z15,z3].forEach(b => b?.classList.remove('active'));
      btn?.classList.add('active');
    };
    z1?.addEventListener('click', () => { wrap.classList.remove('zoom15x','zoom3x'); setActive(z1); });
    z15?.addEventListener('click', () => { wrap.classList.add('zoom15x'); wrap.classList.remove('zoom3x'); setActive(z15); });
    z3?.addEventListener('click', () => { wrap.classList.add('zoom3x'); wrap.classList.remove('zoom15x'); setActive(z3); });
    emph?.addEventListener('click', () => { wrap.classList.toggle('emph'); emph.classList.toggle('active'); });

    // Default: show latest year only
    checkboxes.forEach((cb, i) => cb.checked = (i === checkboxes.length - 1));
    render();
  })();

  // Load indicators from database on page load
  (async function(){
    try {
      const response = await fetch('/api/logframe/indicators');
      if (!response.ok) return;
      
      const indicators = await response.json();
      
      // Group indicators by section
      const indicatorsBySection = {};
      Object.keys(indicators).forEach(sectionKey => {
        indicatorsBySection[sectionKey] = indicators[sectionKey];
      });
      
      // Update each row with database data
      document.querySelectorAll('tr[data-part][data-row]').forEach(tr => {
        const partKey = tr.getAttribute('data-part');
        const rowIndex = tr.getAttribute('data-row');
        const indicatorName = tr.querySelector('td.desc strong')?.textContent?.trim();
        // Read the row description text (second column bold text)
        const descCell = tr.querySelector('td.desc:nth-child(2) strong');
        const indicatorDesc = descCell ? descCell.textContent.trim() : '';
        
        // Find matching indicator in database
        const sectionIndicators = indicatorsBySection[partKey] || [];
        const matchingIndicator = sectionIndicators.find(ind =>
          ind.indicator_name === indicatorName && (ind.indicator_description || '') === indicatorDesc
        );
        
        if (matchingIndicator) {
          // Set the indicator ID for future updates
          tr.setAttribute('data-indicator-id', matchingIndicator.id);
          
          // Update meta data
          tr.querySelector('[data-cell="baseline"]').textContent = matchingIndicator.baseline || 0;
          tr.querySelector('[data-cell="mid_term"]').textContent = matchingIndicator.mid_term || 0;
          tr.querySelector('[data-cell="end_target"]').textContent = matchingIndicator.end_target || 0;
          
          // Update year columns
          const yearCols = Array.from(tr.querySelectorAll('td.year-col'));
          let running = 0;
          yearCols.forEach(col => {
            const y = col.getAttribute('data-year');
            const t = matchingIndicator.yearly_targets?.[y] || 0;
            const r = matchingIndicator.yearly_results?.[y] || 0;
            running += r;
            
            col.querySelector('[data-cell="target"]').textContent = `Target: ${t}`;
            const resultEl = col.querySelector('[data-cell="result"]');
            resultEl.textContent = `Result: ${r}`;
            
            // Update visual indicators
            const diff = r - t;
            const pct = t !== 0 ? (diff/Math.max(1e-9,t))*100 : (r !== 0 ? 100 : 0);
            const absPct = Math.abs(pct);
            const flag = r >= t ? 'ok' : (absPct <= 10 ? 'warn' : 'bad');
            resultEl.classList.remove('ok','warn','bad');
            resultEl.classList.add(flag);
            
            const delta = col.querySelector('.delta');
            delta.classList.remove('up','down','flat');
            const arrow = r > t ? 'up' : (r < t ? 'down' : 'flat');
            delta.classList.add(arrow);
            delta.setAttribute('title', `Result vs Target: ${r} vs ${t} (${t!==0?pct.toFixed(1)+'%':'—'})`);
            delta.innerHTML = `${arrow==='up'?'▲':(arrow==='down'?'▼':'▬')} <span>${t!==0?pct.toFixed(1)+'%':'—'}</span>`;
            
            col.querySelector('[data-cell="progress"]').style.width = `${t>0?Math.max(0,Math.min(100,Math.round((r/Math.max(1e-9,t))*100))):0}%`;
            col.querySelector('[data-cell="cumulative"]').textContent = `Cumulative: ${running}`;
          });
        }
      });
    } catch (error) {
      console.error('Error loading indicators from database:', error);
    }
  })();

  // Jump to a section + open it; open/close all
  (function(){
    const jump = document.getElementById('jump-select');
    const openAll = document.getElementById('open-all');
    const closeAll = document.getElementById('close-all');

    jump?.addEventListener('change', () => {
      const id = jump.value;
      const section = document.getElementById(id);
      if(section){
        const det = section.querySelector('details');
        if(det) det.open = true;
        section.scrollIntoView({behavior:'smooth', block:'start'});
      }
    });

    openAll?.addEventListener('click', () => {
      document.querySelectorAll('.section details').forEach(d => d.open = true);
    });
    closeAll?.addEventListener('click', () => {
      document.querySelectorAll('.section details').forEach(d => d.open = false);
    });
  })();

  // Delete confirmation function (unchanged)
  function confirmDelete(indicatorKey, indicatorName) {
    if (confirm(`Are you sure you want to delete the "${indicatorName}" indicator? This action cannot be undone.`)) {
      // Create a form to submit the delete request
      const form = document.createElement('form');
      form.method = 'POST';
      form.action = '{{ route("logframe.tanks.destroy", ":id") }}'.replace(':id', indicatorKey);
      
      // Add CSRF token
      const csrfToken = document.createElement('input');
      csrfToken.type = 'hidden';
      csrfToken.name = '_token';
      csrfToken.value = '{{ csrf_token() }}';
      form.appendChild(csrfToken);
      
      // Add method override for DELETE
      const methodField = document.createElement('input');
      methodField.type = 'hidden';
      methodField.name = '_method';
      methodField.value = 'DELETE';
      form.appendChild(methodField);
      
      // Submit the form
      document.body.appendChild(form);
      form.submit();
    }
  }
  </script>
</div>
@endsection
