<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AWPBFile;
use Illuminate\Support\Facades\Storage;

class AWPBController extends Controller
{
    public function index()
    {
        $years = range(2021, 2027);
        $files = AWPBFile::all()->groupBy('year');
        return view('awpb.index', compact('years', 'files'));
    }

    public function create()
    {
        $years = range(2021, 2027);
        return view('awpb.create', compact('years'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required|integer',
            'file' => 'required|mimes:xlsx|max:10240',
        ]);

        $year = $request->year;
        $latestVersion = AWPBFile::where('year', $year)->max('version') ?? 0;
        $newVersion = $latestVersion + 1;

        $filePath = $request->file('file')->store("awpb/{$year}");

        AWPBFile::create([
            'year' => $year,
            'version' => $newVersion,
            'file_path' => $filePath,
        ]);

        return redirect()->route('awpb.index')->with('success', 'File uploaded successfully.');
    }

    public function show($year)
    {
        $files = AWPBFile::where('year', $year)->orderBy('version', 'desc')->get();
        return view('awpb.show', compact('year', 'files'));
    }

    public function download($id)
{
    $file = AWPBFile::findOrFail($id);

    // Define the renamed file name format
    $newFileName = "AWPB_{$file->year}_Version_{$file->version}.xlsx";

    // Ensure file exists in storage
    if (!Storage::exists($file->file_path)) {
        return redirect()->back()->with('error', 'File not found.');
    }

    // Return response for downloading with a new filename
    return Storage::download($file->file_path, $newFileName);
}

}
