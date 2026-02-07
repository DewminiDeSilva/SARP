<?php

namespace App\Http\Controllers;

use App\Models\LivestockTraining;
use App\Models\Livestock;
use Illuminate\Http\Request;
use League\Csv\Reader;
use Maatwebsite\Excel\Facades\Excel;

class LivestockTrainingController extends Controller
{
    public function index()
    {
        $entries = request()->get('entries', 10);
        $trainings = LivestockTraining::with('livestock.beneficiary')
            ->latest()
            ->paginate($entries)
            ->appends(['entries' => $entries]);

        $totalProgramCost = LivestockTraining::sum('training_program_cost');

        return view('livestock_training.livestock_training_index', compact('trainings', 'entries', 'totalProgramCost'));
    }

    public function create()
    {
        return view('livestock_training.livestock_training_create');
    }

    public function store(Request $request)
    {
        $training = new LivestockTraining();
        $training->livestock_id = $request->livestock_id ?: null;
        $training->program_name = $request->program_name;
        $training->date = $request->date;
        $training->venue = $request->venue;
        $training->resource_person_name = $request->resource_person_name;
        $training->training_program_cost = $request->training_program_cost;
        $training->resource_person_payment = $request->resource_person_payment;
        $training->province_name = $request->province_name;
        $training->district = $request->district;
        $training->ds_division_name = $request->ds_division_name;
        $training->gn_division_name = $request->gn_division_name;
        $training->as_center = $request->as_center;
        $training->save();

        return redirect()->route('livestock-training.index')->with('success', 'Livestock training program created successfully.');
    }

    public function edit(LivestockTraining $livestock_training)
    {
        return view('livestock_training.livestock_training_edit', ['training' => $livestock_training]);
    }

    public function update(Request $request, LivestockTraining $livestock_training)
    {
        $livestock_training->livestock_id = $request->livestock_id ?: $livestock_training->livestock_id;
        $livestock_training->program_name = $request->program_name;
        $livestock_training->date = $request->date;
        $livestock_training->venue = $request->venue;
        $livestock_training->resource_person_name = $request->resource_person_name;
        $livestock_training->training_program_cost = $request->training_program_cost;
        $livestock_training->resource_person_payment = $request->resource_person_payment;
        $livestock_training->province_name = $request->province_name;
        $livestock_training->district = $request->district;
        $livestock_training->ds_division_name = $request->ds_division_name;
        $livestock_training->gn_division_name = $request->gn_division_name;
        $livestock_training->as_center = $request->as_center;
        $livestock_training->save();

        return redirect()->route('livestock-training.index')->with('success', 'Livestock training program updated successfully.');
    }

    public function destroy(LivestockTraining $livestock_training)
    {
        $livestock_training->delete();
        return redirect()->route('livestock-training.index')->with('success', 'Livestock training program deleted successfully.');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $trainings = LivestockTraining::with('livestock')
            ->where('program_name', 'like', '%' . $search . '%')
            ->orWhere('date', 'like', '%' . $search . '%')
            ->orWhere('venue', 'like', '%' . $search . '%')
            ->orWhere('resource_person_name', 'like', '%' . $search . '%')
            ->orWhere('training_program_cost', 'like', '%' . $search . '%')
            ->orWhere('resource_person_payment', 'like', '%' . $search . '%')
            ->orWhere('province_name', 'like', '%' . $search . '%')
            ->orWhere('district', 'like', '%' . $search . '%')
            ->orWhere('ds_division_name', 'like', '%' . $search . '%')
            ->orWhere('gn_division_name', 'like', '%' . $search . '%')
            ->orWhere('as_center', 'like', '%' . $search . '%')
            ->paginate(10);

        $totalProgramCost = LivestockTraining::sum('training_program_cost');
        $entries = 10;

        return view('livestock_training.livestock_training_index', compact('trainings', 'search', 'totalProgramCost', 'entries'));
    }

    public function downloadCsv()
    {
        $trainings = LivestockTraining::with('livestock')->latest()->get();
        $filename = 'livestock_training_program_report.csv';
        $fp = fopen($filename, 'w+');
        fputcsv($fp, ['Livestock ID', 'Program Name', 'Date', 'Venue', 'Resource Person Name', 'Training Program Cost', 'Resource Person Payment', 'Province', 'District', 'DS Division', 'GN Division', 'ASC']);

        foreach ($trainings as $row) {
            fputcsv($fp, [
                $row->livestock_id,
                $row->program_name,
                $row->date,
                $row->venue,
                $row->resource_person_name,
                $row->training_program_cost,
                $row->resource_person_payment,
                $row->province_name,
                $row->district,
                $row->ds_division_name,
                $row->gn_division_name,
                $row->as_center,
            ]);
        }
        fclose($fp);
        return response()->download($filename, 'livestock_training_program_report.csv', ['Content-Type' => 'text/csv']);
    }

    public function uploadCsv(Request $request)
    {
        $request->validate(['csv_file' => 'required|file|mimes:csv,txt,xlsx,xls']);

        $file = $request->file('csv_file');
        $ext = strtolower($file->getClientOriginalExtension());

        if (in_array($ext, ['csv', 'txt'])) {
            $csv = Reader::createFromPath($file->getRealPath(), 'r');
            $csv->setHeaderOffset(0);
            $rows = $csv;
        } else {
            $collection = Excel::toCollection(null, $file)->first();
            if ($collection->isEmpty()) {
                return redirect()->route('livestock-training.index')->with('error', 'The Excel file is empty or invalid.');
            }
            $headers = $collection->shift();
            $rows = $collection->map(function ($row) use ($headers) {
                return array_combine($headers->toArray(), $row->toArray());
            });
        }

        foreach ($rows as $row) {
            $training = new LivestockTraining();
            $training->livestock_id = $row['Livestock ID'] ?? $row['livestock_id'] ?? null;
            $training->program_name = $row['Program Name'] ?? '';
            $training->date = $row['Date'] ?? '';
            $training->venue = $row['Venue'] ?? '';
            $training->resource_person_name = $row['Resource Person Name'] ?? '';
            $training->training_program_cost = $row['Training Program Cost'] ?? '';
            $training->resource_person_payment = $row['Resource Person Payment'] ?? '';
            $training->province_name = $row['Province'] ?? '';
            $training->district = $row['District'] ?? '';
            $training->ds_division_name = $row['DS Division'] ?? '';
            $training->gn_division_name = $row['GN Division'] ?? '';
            $training->as_center = $row['ASC'] ?? '';
            $training->save();
        }
        return redirect()->route('livestock-training.index')->with('success', 'Data imported successfully.');
    }
}
