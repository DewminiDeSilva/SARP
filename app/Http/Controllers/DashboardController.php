<?php

namespace App\Http\Controllers;

use App\Models\TankRehabilitation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with summary data.
     */
    public function index()
    {
        // Tank Rehabilitation Module
        $statuses = [
            'Identified', 'Started', 'On Going', 'Finished', 'PIR Completed', 
            'Survey Completed', 'Engineering Serveys', 'Drawings and Designs Completed', 
            'BOQ Completed', 'Ratification meeting completed', 'Bidding documents completed', 
            'IFAD no objection received', 'Paper advertised', 'Evalution of bids', 'Agreement Sign'
        ];

        $statusCounts = [];
        foreach ($statuses as $status) {
            $statusCounts[] = TankRehabilitation::where('status', $status)->count();
        }

        // Pass the data to the view
        return view('dashboard', compact('statuses', 'statusCounts'));
    }
}
