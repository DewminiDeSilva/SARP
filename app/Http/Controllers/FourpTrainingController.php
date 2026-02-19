<?php

namespace App\Http\Controllers;

use App\Models\FourpTraining;
use Illuminate\Http\Request;
use League\Csv\Reader;

class FourpTrainingController extends Controller
{
    public function index()
    {
        $search = request()->get('search');
        $entries = request()->get('entries', 10);

        $fourpTrainings = FourpTraining::when($search, function ($query, $search) {
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

        $totalProgramCost = FourpTraining::sum('training_program_cost');
        $totalPrograms = FourpTraining::count();

        return view('fourp_training.fourp_training_index', compact('fourpTrainings', 'entries', 'totalProgramCost', 'totalPrograms', 'search'));
    }

    public function create()
    {
        return view('fourp_training.fourp_training_create');
    }

    public function store(Request $request)
    {
        $fourpTraining = new FourpTraining;
        $fourpTraining->program_name = request('program_name');
        $fourpTraining->program_number = request('program_number');
        $fourpTraining->crop_name = request('crop_name');
        $fourpTraining->date = request('date');
        $fourpTraining->venue = request('venue');
        $fourpTraining->resource_person_name = request('resource_person_name');
        $fourpTraining->training_program_cost = request('training_program_cost');
        $fourpTraining->resource_person_payment = request('resource_person_payment');
        $fourpTraining->province_name = request('province_name');
        $fourpTraining->district = request('district');
        $fourpTraining->ds_division_name = request('ds_division_name');
        $fourpTraining->gn_division_name = request('gn_division_name');
        $fourpTraining->as_center = request('as_center');
        $fourpTraining->save();

        return redirect('/4p-training')->with('success', '4P training program created successfully.');
    }

    public function edit($id)
    {
        $fourpTraining = FourpTraining::findOrFail($id);
        return view('fourp_training.fourp_training_edit', compact('fourpTraining'));
    }

    public function update(Request $request, $id)
    {
        $fourpTraining = FourpTraining::findOrFail($id);
        $fourpTraining->program_name = $request->input('program_name');
        $fourpTraining->program_number = $request->input('program_number');
        $fourpTraining->crop_name = $request->input('crop_name');
        $fourpTraining->date = $request->input('date');
        $fourpTraining->venue = $request->input('venue');
        $fourpTraining->resource_person_name = $request->input('resource_person_name');
        $fourpTraining->training_program_cost = $request->input('training_program_cost');
        $fourpTraining->resource_person_payment = $request->input('resource_person_payment');
        $fourpTraining->province_name = $request->input('province_name');
        $fourpTraining->district = $request->input('district');
        $fourpTraining->ds_division_name = $request->input('ds_division_name');
        $fourpTraining->gn_division_name = $request->input('gn_division_name');
        $fourpTraining->as_center = $request->input('as_center');
        $fourpTraining->save();

        return redirect('/4p-training')->with('success', '4P training program updated successfully.');
    }

    public function destroy($id)
    {
        $fourpTraining = FourpTraining::findOrFail($id);
        $fourpTraining->delete();
        return redirect()->route('4p-training.index')->with('success', '4P training program deleted successfully.');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $fourpTrainings = FourpTraining::where('program_name', 'like', '%' . $search . '%')
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

        return view('fourp_training.fourp_training_index', compact('fourpTrainings', 'search'));
    }

    public function downloadCsv()
    {
        $fourpTrainings = FourpTraining::latest()->get();
        $filename = '4p_training_program_report.csv';
        $fp = fopen($filename, 'w+');
        fputcsv($fp, ['Program Name', 'Program Number', 'Crop Name', 'Date', 'Venue', 'Resource Person Name', 'Training Program Cost', 'Resource Person Payment', 'Province', 'District', 'DS Division', 'GN Division', 'ASC']);

        foreach ($fourpTrainings as $row) {
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
        return response()->download($filename, '4p_training_program_report.csv', ['Content-Type' => 'text/csv']);
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
            $fourpTraining = new FourpTraining();
            $fourpTraining->program_name = $row['Program Name'];
            $fourpTraining->program_number = $row['Program Number'];
            $fourpTraining->crop_name = $row['Crop Name'];
            $fourpTraining->date = $row['Date'];
            $fourpTraining->venue = $row['Venue'];
            $fourpTraining->resource_person_name = $row['Resource Person Name'];
            $fourpTraining->training_program_cost = $row['Training Program Cost'];
            $fourpTraining->resource_person_payment = $row['Resource Person Payment'];
            $fourpTraining->province_name = $row['Province'];
            $fourpTraining->district = $row['District'];
            $fourpTraining->ds_division_name = $row['DS Division'];
            $fourpTraining->gn_division_name = $row['GN Division'];
            $fourpTraining->as_center = $row['ASC'];
            $fourpTraining->save();
        }

        return redirect('/4p-training')->with('success', 'CSV data imported successfully.');
    }
}
