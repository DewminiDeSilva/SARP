<?php

namespace App\Http\Controllers;

use App\Models\TankTraining;
use Illuminate\Http\Request;
use League\Csv\Reader;

class TankTrainingController extends Controller
{
    public function index()
    {
        $search = request()->get('search');
        $entries = request()->get('entries', 10);

        $tankTrainings = TankTraining::when($search, function ($query, $search) {
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

        $totalProgramCost = TankTraining::sum('training_program_cost');
        $totalPrograms = TankTraining::count();

        return view('tank_training.tank_training_index', compact('tankTrainings', 'entries', 'totalProgramCost', 'totalPrograms', 'search'));
    }

    public function create()
    {
        return view('tank_training.tank_training_create');
    }

    public function store(Request $request)
    {
        $tankTraining = new TankTraining;
        $tankTraining->program_name = request('program_name');
        $tankTraining->program_number = request('program_number');
        $tankTraining->crop_name = request('crop_name');
        $tankTraining->date = request('date');
        $tankTraining->venue = request('venue');
        $tankTraining->resource_person_name = request('resource_person_name');
        $tankTraining->training_program_cost = request('training_program_cost');
        $tankTraining->resource_person_payment = request('resource_person_payment');
        $tankTraining->province_name = request('province_name');
        $tankTraining->district = request('district');
        $tankTraining->ds_division_name = request('ds_division_name');
        $tankTraining->gn_division_name = request('gn_division_name');
        $tankTraining->as_center = request('as_center');
        $tankTraining->save();

        return redirect()->route('tank-training.index')->with('success', 'Tank training program created successfully.');
    }

    public function edit($id)
    {
        $tankTraining = TankTraining::findOrFail($id);
        return view('tank_training.tank_training_edit', compact('tankTraining'));
    }

    public function update(Request $request, $id)
    {
        $tankTraining = TankTraining::findOrFail($id);
        $tankTraining->program_name = $request->input('program_name');
        $tankTraining->program_number = $request->input('program_number');
        $tankTraining->crop_name = $request->input('crop_name');
        $tankTraining->date = $request->input('date');
        $tankTraining->venue = $request->input('venue');
        $tankTraining->resource_person_name = $request->input('resource_person_name');
        $tankTraining->training_program_cost = $request->input('training_program_cost');
        $tankTraining->resource_person_payment = $request->input('resource_person_payment');
        $tankTraining->province_name = $request->input('province_name');
        $tankTraining->district = $request->input('district');
        $tankTraining->ds_division_name = $request->input('ds_division_name');
        $tankTraining->gn_division_name = $request->input('gn_division_name');
        $tankTraining->as_center = $request->input('as_center');
        $tankTraining->save();

        return redirect('/tank-training')->with('success', 'Tank training program updated successfully.');
    }

    public function destroy($id)
    {
        $tankTraining = TankTraining::findOrFail($id);
        $tankTraining->delete();
        return redirect()->route('tank-training.index')->with('success', 'Tank training program deleted successfully.');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $tankTrainings = TankTraining::where('program_name', 'like', '%' . $search . '%')
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

        return view('tank_training.tank_training_index', compact('tankTrainings', 'search'));
    }

    public function downloadCsv()
    {
        $tankTrainings = TankTraining::latest()->get();
        $filename = 'tank_training_program_report.csv';
        $fp = fopen($filename, 'w+');
        fputcsv($fp, ['Program Name', 'Program Number', 'Crop Name', 'Date', 'Venue', 'Resource Person Name', 'Training Program Cost', 'Resource Person Payment', 'Province', 'District', 'DS Division', 'GN Division', 'ASC']);

        foreach ($tankTrainings as $row) {
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
        return response()->download($filename, 'tank_training_program_report.csv', ['Content-Type' => 'text/csv']);
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
            $tankTraining = new TankTraining();
            $tankTraining->program_name = $row['Program Name'];
            $tankTraining->program_number = $row['Program Number'];
            $tankTraining->crop_name = $row['Crop Name'];
            $tankTraining->date = $row['Date'];
            $tankTraining->venue = $row['Venue'];
            $tankTraining->resource_person_name = $row['Resource Person Name'];
            $tankTraining->training_program_cost = $row['Training Program Cost'];
            $tankTraining->resource_person_payment = $row['Resource Person Payment'];
            $tankTraining->province_name = $row['Province'];
            $tankTraining->district = $row['District'];
            $tankTraining->ds_division_name = $row['DS Division'];
            $tankTraining->gn_division_name = $row['GN Division'];
            $tankTraining->as_center = $row['ASC'];
            $tankTraining->save();
        }

        return redirect('/tank-training')->with('success', 'CSV data imported successfully.');
    }
}
