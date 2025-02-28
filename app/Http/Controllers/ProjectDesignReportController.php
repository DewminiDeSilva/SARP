<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectDesignReport;
use Illuminate\Support\Facades\Storage;

class ProjectDesignReportController extends Controller
{
    public function index()
    {
        $files = ProjectDesignReport::orderBy('version', 'desc')->get();
        return view('projectdesignreport.index', compact('files'));
    }

    public function create()
    {
        return view('projectdesignreport.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:10240', // Accept only PDF files up to 10MB
        ]);

        // Get the latest version and increment
        $latestVersion = ProjectDesignReport::max('version') ?? 0;
        $newVersion = $latestVersion + 1;

        // Store the file in `storage/app/public/project_design_report`
        $filePath = $request->file('file')->store("public/project_design_report");

        // Save record in the database
        ProjectDesignReport::create([
            'version' => $newVersion,
            'file_path' => str_replace("public/", "", $filePath), // Remove `public/` from path
        ]);

        return redirect()->route('projectdesignreport.index')->with('success', 'File uploaded successfully.');
    }

    public function show($id)
    {
        $file = ProjectDesignReport::findOrFail($id);
        return response()->file(storage_path("app/public/project_design_report/" . basename($file->file_path)));
    }

    public function download($id)
    {
        $file = ProjectDesignReport::findOrFail($id);
        return Storage::download("public/project_design_report/" . basename($file->file_path), "Project_Design_Report_Version_{$file->version}.pdf");
    }
}
