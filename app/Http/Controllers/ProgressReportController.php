<?php

// app/Http/Controllers/ProgressReportController.php
namespace App\Http\Controllers;

use App\Models\ProgressReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProgressReportController extends Controller
{
    // ===== Hub =====
    public function index()
    {
        return view('progress.index'); // 6-button hub
    }

    // ====== MONTHLY ======
    public function monthlyCreate()
    {
        $years = range(2021, 2027);
        $months = range(1, 12);
        return view('progress.monthly.create', compact('years', 'months'));
    }

    public function monthlyStore(Request $request)
    {
        $validated = $request->validate([
            'period_year'     => ['required','integer','between:2021,2027'],
            'period_month'    => ['required','integer','between:1,12'],
            'institution'     => ['required','string','max:255'],
            'submission_date' => ['nullable','date'],
            'file'            => ['required','file','max:20480'], // 20MB
        ]);

        // Determine next version for this monthly period
        $maxVersion = ProgressReport::where('type','monthly')
            ->where('period_year', $validated['period_year'])
            ->where('period_month', $validated['period_month'])
            ->max('version');

        $nextVersion = $maxVersion ? $maxVersion + 1 : 1;

        // Store file
        $storePath = $request->file('file')->store(
            "progress_reports/monthly/{$validated['period_year']}/{$validated['period_month']}",
            'public'
        );

        ProgressReport::create([
            'type'            => 'monthly',
            'period_year'     => $validated['period_year'],
            'period_month'    => $validated['period_month'],
            'institution'     => $validated['institution'],
            'submission_date' => $validated['submission_date'] ?? null,
            'file_path'       => $storePath,
            'version'         => $nextVersion,
        ]);

        return redirect()->route('progress.monthly.index')
            ->with('success','Monthly progress report uploaded.');
    }

    public function monthlyIndex()
    {
        // Group by year+month and order months Jan..Dec inside each year; latest year first
        // We’ll just list each file row with Month, Version, etc.
        $reports = ProgressReport::where('type','monthly')
            ->orderBy('period_year','desc')
            ->orderBy('period_month','asc')
            ->orderBy('version','asc')
            ->get();

        return view('progress.monthly.index', compact('reports'));
    }

    // ====== QUARTERLY ======
    public function quarterlyCreate()
    {
        $years = range(2021, 2027);
        $quarters = [1,2,3,4];
        return view('progress.quarterly.create', compact('years','quarters'));
    }

    public function quarterlyStore(Request $request)
    {
        $validated = $request->validate([
            'period_year'     => ['required','integer','between:2021,2027'],
            'period_quarter'  => ['required','integer','between:1,4'],
            'institution'     => ['required','string','max:255'],
            'submission_date' => ['nullable','date'],
            'file'            => ['required','file','max:20480'],
        ]);

        $maxVersion = ProgressReport::where('type','quarterly')
            ->where('period_year', $validated['period_year'])
            ->where('period_quarter', $validated['period_quarter'])
            ->max('version');

        $nextVersion = $maxVersion ? $maxVersion + 1 : 1;

        $storePath = $request->file('file')->store(
            "progress_reports/quarterly/{$validated['period_year']}/Q{$validated['period_quarter']}",
            'public'
        );

        ProgressReport::create([
            'type'            => 'quarterly',
            'period_year'     => $validated['period_year'],
            'period_quarter'  => $validated['period_quarter'],
            'institution'     => $validated['institution'],
            'submission_date' => $validated['submission_date'] ?? null,
            'file_path'       => $storePath,
            'version'         => $nextVersion,
        ]);

        return redirect()->route('progress.quarterly.index')
            ->with('success','Quarterly progress report uploaded.');
    }

    public function quarterlyIndex()
    {
        $reports = ProgressReport::where('type','quarterly')
            ->orderBy('period_year','desc')
            ->orderBy('period_quarter','asc')
            ->orderBy('version','asc')
            ->get();

        return view('progress.quarterly.index', compact('reports'));
    }

    // ====== ANNUAL ======
    public function annualCreate()
    {
        $years = range(2021, 2027);
        return view('progress.annual.create', compact('years'));
    }

    public function annualStore(Request $request)
    {
        $validated = $request->validate([
            'period_year'     => ['required','integer','between:2021,2027'],
            'institution'     => ['required','string','max:255'],
            'submission_date' => ['nullable','date'],
            'file'            => ['required','file','max:20480'],
        ]);

        $maxVersion = ProgressReport::where('type','annual')
            ->where('period_year', $validated['period_year'])
            ->max('version');

        $nextVersion = $maxVersion ? $maxVersion + 1 : 1;

        $storePath = $request->file('file')->store(
            "progress_reports/annual/{$validated['period_year']}",
            'public'
        );

        ProgressReport::create([
            'type'            => 'annual',
            'period_year'     => $validated['period_year'],
            'institution'     => $validated['institution'],
            'submission_date' => $validated['submission_date'] ?? null,
            'file_path'       => $storePath,
            'version'         => $nextVersion,
        ]);

        return redirect()->route('progress.annual.index')
            ->with('success','Annual progress report uploaded.');
    }

    public function annualIndex()
    {
        $reports = ProgressReport::where('type','annual')
            ->orderBy('period_year','desc')
            ->orderBy('version','asc')
            ->get();

        return view('progress.annual.index', compact('reports'));
    }

    // ===== Common Actions (View inline & Download) =====
    public function viewFile(ProgressReport $report)
    {
        // Try to return file inline (works nicely for PDFs). For other types, browser may download.
        $path = Storage::disk('public')->path($report->file_path);
        return response()->file($path);
    }

    public function downloadFile(ProgressReport $report)
    {
        $path = Storage::disk('public')->path($report->file_path);
        $filename = basename($path);
        return response()->download($path, $filename);
    }
}
