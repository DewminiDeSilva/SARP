<?php

namespace App\Http\Controllers;

use App\Models\StaffProfile;
use Illuminate\Http\Request;
use League\Csv\Reader;

class StaffProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entries = request()->get('entries', 10);
        $staffProfiles = StaffProfile::latest()->paginate($entries)->appends(['entries' => $entries]);
    
        // Count total staff members
        $totalStaff = StaffProfile::count();
    
        return view('staff_profile.staff_index', compact('staffProfiles', 'totalStaff', 'entries'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff_profile.staff_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'appointment_letter' => 'nullable|file|mimes:pdf|max:5120',
            'nic_number' => 'required|unique:staff_profiles,nic_number',
            'email_address' => 'nullable|email',
        ]);

        $photoPath = $request->file('photo') ? $request->file('photo')->store('staff_photos', 'public') : null;
        $appointmentLetterPath = $request->file('appointment_letter') ? $request->file('appointment_letter')->store('appointment_letters', 'public') : null;

        StaffProfile::create([
            'staff_type' => $request->staff_type,
            'photo' => $photoPath,
            'name_with_initials' => $request->name_with_initials,
            'nic_number' => $request->nic_number,
            'designation' => $request->designation,
            'permanent_address' => $request->permanent_address,
            'contact_number' => $request->contact_number,
            'mobile_fixed' => $request->mobile_fixed,
            'email_address' => $request->email_address,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'w_and_op_number' => $request->w_and_op_number,
            'highest_education_qualifications' => $request->highest_education_qualifications,
            'salary' => $request->salary,
            'salary_increment_date' => $request->salary_increment_date,
            'personal_file_number' => $request->personal_file_number,
            'appointment_letter' => $appointmentLetterPath,
            'first_appointment_date' => $request->first_appointment_date,
            'grade' => 'A',
    'cv' => null, // No CV initially
    'status' => 'in_service', // Default status
    // other fields...
        ]);
        $request->validate([
            'cv' => 'nullable|file|mimes:pdf|max:5120',
        ]);
    
        $cvPath = $request->file('cv') ? $request->file('cv')->store('cv_uploads', 'public') : null;
    
        StaffProfile::create(array_merge($request->all(), [
            'cv' => $cvPath,
        ]));

        return redirect('/staff_profile')->with('success', 'Staff profile created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(StaffProfile $staffProfile)
    {
        return view('staff_profile.staff_show', compact('staffProfile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StaffProfile $staffProfile)
    {
        return view('staff_profile.staff_edit', compact('staffProfile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StaffProfile $staffProfile)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'appointment_letter' => 'nullable|file|mimes:pdf|max:5120',
            'nic_number' => 'required|unique:staff_profiles,nic_number,' . $staffProfile->id,
            'email_address' => 'nullable|email',
            
        ]);
        

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('staff_photos', 'public');
            $staffProfile->photo = $photoPath;
        }

        if ($request->hasFile('appointment_letter')) {
            $appointmentLetterPath = $request->file('appointment_letter')->store('appointment_letters', 'public');
            $staffProfile->appointment_letter = $appointmentLetterPath;
        }

        $staffProfile->update($request->all());

        return redirect('/staff_profile')->with('success', 'Staff profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StaffProfile $staffProfile)
    {
        $staffProfile->delete();
        return redirect('/staff_profile')->with('success', 'Staff profile deleted successfully.');
    }

    /**
     * Search functionality.
     */
    public function search(Request $request)
{
    $search = $request->get('search');

    // Build a query to search across relevant fields in the StaffProfile model
    $staffProfiles = StaffProfile::where('name_with_initials', 'like', '%' . $search . '%')
        ->orWhere('nic_number', 'like', '%' . $search . '%')
        ->orWhere('designation', 'like', '%' . $search . '%')
        ->orWhere('permanent_address', 'like', '%' . $search . '%')
        ->orWhere('contact_number', 'like', '%' . $search . '%')
        ->orWhere('email_address', 'like', '%' . $search . '%')
        ->orWhere('date_of_birth', 'like', '%' . $search . '%')
        ->orWhere('gender', 'like', '%' . $search . '%')
        ->orWhere('w_and_op_number', 'like', '%' . $search . '%')
        ->orWhere('highest_education_qualifications', 'like', '%' . $search . '%')
        ->orWhere('salary', 'like', '%' . $search . '%')
        ->orWhere('salary_increment_date', 'like', '%' . $search . '%')
        ->orWhere('personal_file_number', 'like', '%' . $search . '%')
        ->orWhere('first_appointment_date', 'like', '%' . $search . '%')
        ->paginate(10)
        ->appends(['search' => $search]);

    // Add additional summary counts if needed
    $totalStaff = StaffProfile::count();
    $maleStaff = StaffProfile::where('gender', 'Male')->count();
    $femaleStaff = StaffProfile::where('gender', 'Female')->count();

    return view('staff_profile.staff_index', compact('staffProfiles', 'search', 'totalStaff', 'maleStaff', 'femaleStaff'));
}

    /**
     * Export data to CSV.
     */
    public function exportCsv()
    {
        $staffProfiles = StaffProfile::all();
        $filename = 'staff_profiles.csv';
        $fp = fopen($filename, 'w+');
        fputcsv($fp, [
            'Staff Type',
            'Name with Initials',
            'NIC Number',
            'Designation',
            'Permanent Address',
            'Contact Number',
            'Mobile Fixed',
            'Email Address',
            'Date of Birth',
            'Gender',
            'W and OP Number',
            'Highest Education Qualifications',
            'Salary',
            'Salary Increment Date',
            'Personal File Number',
            'First Appointment Date',
        ]);

        foreach ($staffProfiles as $profile) {
            fputcsv($fp, [
                $profile->staff_type,
                $profile->name_with_initials,
                $profile->nic_number,
                $profile->designation,
                $profile->permanent_address,
                $profile->contact_number,
                $profile->mobile_fixed,
                $profile->email_address,
                $profile->date_of_birth,
                $profile->gender,
                $profile->w_and_op_number,
                $profile->highest_education_qualifications,
                $profile->salary,
                $profile->salary_increment_date,
                $profile->personal_file_number,
                $profile->first_appointment_date,
            ]);
        }
        fclose($fp);

        return response()->download($filename, 'staff_profiles.csv', [
            'Content-Type' => 'text/csv',
        ]);
    }

    /**
     * Upload CSV and import data.
     */
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
            StaffProfile::create([
                'staff_type' => $row['Staff Type'] ?? null,
                'name_with_initials' => $row['Name with Initials'] ?? null,
                'nic_number' => $row['NIC Number'] ?? null,
                'designation' => $row['Designation'] ?? null,
                'permanent_address' => $row['Permanent Address'] ?? null,
                'contact_number' => $row['Contact Number'] ?? null,
                'mobile_fixed' => $row['Mobile Fixed'] ?? null,
                'email_address' => $row['Email Address'] ?? null,
                'date_of_birth' => $row['Date of Birth'] ?? null,
                'gender' => $row['Gender'] ?? null,
                'w_and_op_number' => $row['W and OP Number'] ?? null,
                'highest_education_qualifications' => $row['Highest Education Qualifications'] ?? null,
                'salary' => $row['Salary'] ?? null,
                'salary_increment_date' => $row['Salary Increment Date'] ?? null,
                'personal_file_number' => $row['Personal File Number'] ?? null,
                'first_appointment_date' => $row['First Appointment Date'] ?? null,
            ]);
        }

        return redirect('/staff_profile')->with('success', 'CSV data imported successfully.');
    }
    public function summary()
{
    $totalStaff = StaffProfile::count();
    $staffByType = StaffProfile::select('staff_type', \DB::raw('COUNT(*) as count'))
        ->groupBy('staff_type')
        ->get();

    $staffByDesignation = StaffProfile::select('designation', \DB::raw('COUNT(*) as count'))
        ->groupBy('designation')
        ->get();

    $staffByGender = StaffProfile::select('gender', \DB::raw('COUNT(*) as count'))
        ->groupBy('gender')
        ->get();

    return view('staff_profile.staff_summary', compact('totalStaff', 'staffByType', 'staffByDesignation', 'staffByGender'));
}
public function updateStatus(Request $request, StaffProfile $staffProfile)
{
    $staffProfile->status = $staffProfile->status === 'in_service' ? 'resigned' : 'in_service';
    $staffProfile->save();

    return response()->json(['success' => true, 'new_status' => $staffProfile->status]);
}


}
