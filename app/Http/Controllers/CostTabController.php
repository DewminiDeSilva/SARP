<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CostTab;
use Illuminate\Support\Facades\Storage;

class CostTabController extends Controller
{
    public function index()
    {
        $files = CostTab::orderBy('version', 'desc')->get();
        return view('costtab.index', compact('files'));
    }

    public function create()
    {
        return view('costtab.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:pdf|max:10240', // Accept only PDF files up to 10MB
    ]);

    // Get the latest version and increment
    $latestVersion = CostTab::max('version') ?? 0;
    $newVersion = $latestVersion + 1;

    // Store the file in `storage/app/public/cost_tab`
    $filePath = $request->file('file')->store("public/cost_tab");

    // Save record in the database
    CostTab::create([
        'version' => $newVersion,
        'file_path' => str_replace("public/", "", $filePath), // Remove `public/` from the path
    ]);

    return redirect()->route('costtab.index')->with('success', 'File uploaded successfully.');
}


    public function show($id)
    {
        $file = CostTab::findOrFail($id);
        return response()->file(storage_path("app/{$file->file_path}"));
    }

    public function download($id)
{
    $file = CostTab::findOrFail($id);
    return response()->download(storage_path("app/public/cost_tab/" . basename($file->file_path)), "Cost_Tab_Version_{$file->version}.pdf");
}

}

