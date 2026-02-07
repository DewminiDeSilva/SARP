<?php

namespace App\Http\Controllers;

use App\Models\AgricultureTraining;
use App\Models\AgricultureData;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AgricultureTrainingController extends Controller
{
    public function index()
    {
        $entries = request()->get('entries', 10);
        $trainings = AgricultureTraining::with('agricultureData.beneficiary')
            ->latest()
            ->paginate($entries)
            ->appends(['entries' => $entries]);

        $totalProgramCost = AgricultureTraining::sum('training_program_cost');

        return view('agriculture_training.agriculture_training_index', compact('trainings', 'entries', 'totalProgramCost'));
    }

    public function create()
    {
        return view('agriculture_training.agriculture_training_create');
    }

    public function store(Request $request)
    {
        $training = new AgricultureTraining();
        $training->agriculture_data_id = $request->agriculture_data_id ?: null;
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

        return redirect()->route('agriculture-training.index')->with('success', 'Agriculture training program created successfully.');
    }

    public function edit(AgricultureTraining $agriculture_training)
    {
        return view('agriculture_training.agriculture_training_edit', ['training' => $agriculture_training]);
    }

    public function update(Request $request, AgricultureTraining $agriculture_training)
    {
        $agriculture_training->agriculture_data_id = $request->agriculture_data_id ?: $agriculture_training->agriculture_data_id;
        $agriculture_training->program_name = $request->program_name;
        $agriculture_training->date = $request->date;
        $agriculture_training->venue = $request->venue;
        $agriculture_training->resource_person_name = $request->resource_person_name;
        $agriculture_training->training_program_cost = $request->training_program_cost;
        $agriculture_training->resource_person_payment = $request->resource_person_payment;
        $agriculture_training->province_name = $request->province_name;
        $agriculture_training->district = $request->district;
        $agriculture_training->ds_division_name = $request->ds_division_name;
        $agriculture_training->gn_division_name = $request->gn_division_name;
        $agriculture_training->as_center = $request->as_center;
        $agriculture_training->save();

        return redirect()->route('agriculture-training.index')->with('success', 'Agriculture training program updated successfully.');
    }

    public function destroy(AgricultureTraining $agriculture_training)
    {
        $agriculture_training->delete();
        return redirect()->route('agriculture-training.index')->with('success', 'Agriculture training program deleted successfully.');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $trainings = AgricultureTraining::with('agricultureData')
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

        $totalProgramCost = AgricultureTraining::sum('training_program_cost');
        $entries = 10;

        return view('agriculture_training.agriculture_training_index', compact('trainings', 'search', 'totalProgramCost', 'entries'));
    }

    public function downloadCsv()
    {
        $trainings = AgricultureTraining::with('agricultureData')->latest()->get();
        $filename = 'agriculture_training_program_report.csv';
        $fp = fopen($filename, 'w+');
        fputcsv($fp, ['Agriculture ID', 'Program Name', 'Date', 'Venue', 'Resource Person Name', 'Training Program Cost', 'Resource Person Payment', 'Province', 'District', 'DS Division', 'GN Division', 'ASC']);

        foreach ($trainings as $row) {
            fputcsv($fp, [
                $row->agriculture_data_id,
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
        return response()->download($filename, 'agriculture_training_program_report.csv', ['Content-Type' => 'text/csv']);
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
                return redirect()->route('agriculture-training.index')->with('error', 'The Excel file is empty or invalid.');
            }
            $headers = $collection->shift();
            $rows = $collection->map(function ($row) use ($headers) {
                return array_combine($headers->toArray(), $row->toArray());
            });
        }

        foreach ($rows as $row) {
            $agId = $row['Agriculture ID'] ?? $row['agriculture_data_id'] ?? null;
            $agId = (is_numeric($agId) && (int) $agId > 0) ? (int) $agId : null;
            if ($agId && !AgricultureData::whereKey($agId)->exists()) {
                $agId = null;
            }

            $training = new AgricultureTraining();
            $training->agriculture_data_id = $agId;
            $training->program_name = $row['Program Name'] ?? $row['program_name'] ?? '';
            $training->date = $row['Date'] ?? $row['date'] ?? '';
            $training->venue = $row['Venue'] ?? $row['venue'] ?? '';
            $training->resource_person_name = $row['Resource Person Name'] ?? $row['resource_person_name'] ?? '';
            $training->training_program_cost = $row['Training Program Cost'] ?? $row['training_program_cost'] ?? '';
            $training->resource_person_payment = $row['Resource Person Payment'] ?? $row['resource_person_payment'] ?? '';
            $training->province_name = $row['Province'] ?? $row['province_name'] ?? '';
            $training->district = $row['District'] ?? $row['district'] ?? '';
            $training->ds_division_name = $row['DS Division'] ?? $row['ds_division_name'] ?? '';
            $training->gn_division_name = $row['GN Division'] ?? $row['gn_division_name'] ?? '';
            $training->as_center = $row['ASC'] ?? $row['as_center'] ?? '';
            $training->save();
        }

        return redirect()->route('agriculture-training.index')->with('success', 'Data imported successfully.');
    }
}
