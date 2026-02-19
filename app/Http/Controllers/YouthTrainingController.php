<?php

namespace App\Http\Controllers;

use App\Models\YouthTraining;
use Illuminate\Http\Request;
use League\Csv\Reader;

class YouthTrainingController extends Controller
{
    public function index()
    {
        $search = request()->get('search');
        $entries = request()->get('entries', 10);

        $youthTrainings = YouthTraining::when($search, function ($query, $search) {
            return $query->where('program_name', 'like', '%' . $search . '%')
                ->orWhere('program_number', 'like', '%' . $search . '%')
                ->orWhere('crop_name', 'like', '%' . $search . '%')
                ->orWhere('date', 'like', '%' . $search . '%')
                ->orWhere('venue', 'like', '%' . $search . '%')
                ->orWhere('resource_person_name', 'like', '%' . $search . '%')
                ->orWhere('training_program_cost', 'like', '%' . $search . '%')
                ->orWhere('resource_person_payment', 'like', '%' . $search . '%')
                ->orWhere('province_name', 'like', '%' . $search . '%')
                ->orWhere('district', 'like', '%' . $search . '%')
                ->orWhere('ds_division_name', 'like', '%' . $search . '%')
                ->orWhere('gn_division_name', 'like', '%' . $search . '%')
                ->orWhere('as_center', 'like', '%' . $search . '%');
        })
            ->latest()
            ->paginate($entries)
            ->appends(['entries' => $entries, 'search' => $search]);

        $totalProgramCost = YouthTraining::sum('training_program_cost');
        $totalPrograms = YouthTraining::count();

        return view('youth_training.youth_training_index', compact('youthTrainings', 'entries', 'totalProgramCost', 'totalPrograms', 'search'));
    }

    public function create()
    {
        return view('youth_training.youth_training_create');
    }

    public function store(Request $request)
    {
        $youthTraining = new YouthTraining;
        $youthTraining->program_name = request('program_name');
        $youthTraining->program_number = request('program_number');
        $youthTraining->crop_name = request('crop_name');
        $youthTraining->date = request('date');
        $youthTraining->venue = request('venue');
        $youthTraining->resource_person_name = request('resource_person_name');
        $youthTraining->training_program_cost = request('training_program_cost');
        $youthTraining->resource_person_payment = request('resource_person_payment');
        $youthTraining->province_name = request('province_name');
        $youthTraining->district = request('district');
        $youthTraining->ds_division_name = request('ds_division_name');
        $youthTraining->gn_division_name = request('gn_division_name');
        $youthTraining->as_center = request('as_center');
        $youthTraining->save();

        return redirect('/youth-training')->with('success', 'Youth training program created successfully.');
    }

    public function edit($id)
    {
        $youthTraining = YouthTraining::findOrFail($id);
        return view('youth_training.youth_training_edit', compact('youthTraining'));
    }

    public function update(Request $request, $id)
    {
        $youthTraining = YouthTraining::findOrFail($id);
        $youthTraining->program_name = $request->input('program_name');
        $youthTraining->program_number = $request->input('program_number');
        $youthTraining->crop_name = $request->input('crop_name');
        $youthTraining->date = $request->input('date');
        $youthTraining->venue = $request->input('venue');
        $youthTraining->resource_person_name = $request->input('resource_person_name');
        $youthTraining->training_program_cost = $request->input('training_program_cost');
        $youthTraining->resource_person_payment = $request->input('resource_person_payment');
        $youthTraining->province_name = $request->input('province_name');
        $youthTraining->district = $request->input('district');
        $youthTraining->ds_division_name = $request->input('ds_division_name');
        $youthTraining->gn_division_name = $request->input('gn_division_name');
        $youthTraining->as_center = $request->input('as_center');
        $youthTraining->save();

        return redirect('/youth-training')->with('success', 'Youth training program updated successfully.');
    }

    public function destroy($id)
    {
        $youthTraining = YouthTraining::findOrFail($id);
        $youthTraining->delete();
        return redirect()->route('youth-training.index')->with('success', 'Youth training program deleted successfully.');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $youthTrainings = YouthTraining::where('program_name', 'like', '%' . $search . '%')
            ->orWhere('program_number', 'like', '%' . $search . '%')
            ->orWhere('crop_name', 'like', '%' . $search . '%')
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

        return view('youth_training.youth_training_index', compact('youthTrainings', 'search'));
    }

    public function downloadCsv()
    {
        $youthTrainings = YouthTraining::latest()->get();
        $filename = 'youth_training_program_report.csv';
        $fp = fopen($filename, 'w+');
        fputcsv($fp, ['Program Name', 'Program Number', 'Crop Name', 'Date', 'Venue', 'Resource Person Name', 'Training Program Cost', 'Resource Person Payment', 'Province', 'District', 'DS Division', 'GN Division', 'ASC']);

        foreach ($youthTrainings as $row) {
            fputcsv($fp, [
                $row->program_name,
                $row->program_number,
                $row->crop_name,
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
        return response()->download($filename, 'youth_training_program_report.csv', ['Content-Type' => 'text/csv']);
    }

    public function uploadCsv(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');
        $path = $file->getRealPath();
        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0);

        foreach ($csv as $row) {
            $youthTraining = new YouthTraining();
            $youthTraining->program_name = $row['Program Name'];
            $youthTraining->program_number = $row['Program Number'];
            $youthTraining->crop_name = $row['Crop Name'];
            $youthTraining->date = $row['Date'];
            $youthTraining->venue = $row['Venue'];
            $youthTraining->resource_person_name = $row['Resource Person Name'];
            $youthTraining->training_program_cost = $row['Training Program Cost'];
            $youthTraining->resource_person_payment = $row['Resource Person Payment'];
            $youthTraining->province_name = $row['Province'];
            $youthTraining->district = $row['District'];
            $youthTraining->ds_division_name = $row['DS Division'];
            $youthTraining->gn_division_name = $row['GN Division'];
            $youthTraining->as_center = $row['ASC'];
            $youthTraining->save();
        }

        return redirect('/youth-training')->with('success', 'CSV data imported successfully.');
    }
}
