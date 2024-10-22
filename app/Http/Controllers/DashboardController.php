<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Report;
use App\Models\Training;

class DashboardController extends Controller
{
    public function index()
    {
        // Gather statistics data for the dashboard
        $totalUsers = User::count();
        $totalReports = Report::count();
        $totalTrainings = Training::count();

        // Prepare data for the monthly users chart
        $monthlyUsers = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                            ->groupBy('month')
                            ->get()
                            ->pluck('count', 'month')
                            ->toArray();

        // Pass data to the view
        return view('dashboard.dashboard', compact('totalUsers', 'totalReports', 'totalTrainings', 'monthlyUsers'));
    }
}
