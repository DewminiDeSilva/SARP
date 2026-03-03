<?php

return [

    /*
    |--------------------------------------------------------------------------
    | SARP System Version
    |--------------------------------------------------------------------------
    | Current version of the SARP Monitoring Information System.
    | Update this when releasing a new version (e.g. 1.0, 1.1, 2.0).
    */
    'version' => env('SARP_VERSION', '1.1.0'),

    /*
    |--------------------------------------------------------------------------
    | GitHub Repository (Develop)
    |--------------------------------------------------------------------------
    | URL to the project's GitHub repository. Use the develop branch for
    | development. Set in .env as SARP_GITHUB_URL or leave default.
    */
    'github_url' => env('SARP_GITHUB_URL', 'https://github.com/your-org/SARP'),
    'github_branch' => env('SARP_GITHUB_BRANCH', 'develop'),

];
