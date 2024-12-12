<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Staff Profile</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .frame {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
        }

        .left-column {
            flex: 0 0 20%;
            border-right: 1px solid #dee2e6;
        }

        .right-column {
            flex: 0 0 80%;
            padding: 20px;
        }

        .custom-border {
            border-color: darkgreen !important;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: #26CF23;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .btn-back:hover {
            background-color: darkgreen;
        }

        .info-label {
            font-weight: bold;
        }

        .rounded-image {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .section-title {
            font-size: 1.5rem;
            color: green;
            margin-bottom: 20px;
        }

        .custom-frame {
            border: 2px solid rgba(0, 128, 0, 0.2);
            background-color: rgba(0, 128, 0, 0.05);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="frame">
        <!-- Include Dashboard -->
        <div class="left-column">
            @include('dashboard.dashboardC')
            @csrf
        </div>

        <div class="right-column">
            <!-- Back Button -->
            <a href="{{ route('staff_profile.index') }}" class="btn-back mb-3">
                <i class="fas fa-arrow-left"></i> Back
            </a>

            <div class="container">
                <div class="text-center mb-4">
                    <h2 class="section-title">Staff Profile Details</h2>
                </div>
                <div class="card">
        <div class="card-header bg-{{ $staffProfile->status === 'in_service' ? 'success' : 'danger' }} text-white">
            Staff Profile - {{ $staffProfile->status === 'in_service' ? 'In Service' : 'Resigned' }}
        </div>
                <div class="custom-frame">
                    <div class="row mb-4">
                        <div class="col-md-4 text-center">
                            @if($staffProfile->photo)
                                <img src="{{ asset('storage/' . $staffProfile->photo) }}" alt="Profile Photo" class="rounded-image">
                            @else
                                <img src="{{ asset('assets/images/default-user.png') }}" alt="Default Photo" class="rounded-image">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <p><span class="info-label">Name with Initials:</span> {{ $staffProfile->name_with_initials }}</p>
                            <p><span class="info-label">NIC Number:</span> {{ $staffProfile->nic_number }}</p>
                            <p><span class="info-label">Designation:</span> {{ $staffProfile->designation }}</p>
                            <p><span class="info-label">Staff Type:</span> {{ $staffProfile->staff_type }}</p>
                        </div>
                    </div>
                </div>

                <div class="custom-frame">
                    <h4 class="section-title">Contact Details</h4>
                    <p><span class="info-label">Permanent Address:</span> {{ $staffProfile->permanent_address }}</p>
                    <p><span class="info-label">Contact Number:</span> {{ $staffProfile->contact_number ?? 'N/A' }}</p>
                    <p><span class="info-label">Mobile Fixed:</span> {{ $staffProfile->mobile_fixed ?? 'N/A' }}</p>
                    <p><span class="info-label">Email Address:</span> {{ $staffProfile->email_address ?? 'N/A' }}</p>
                </div>

                <div class="custom-frame">
                    <h4 class="section-title">Personal Details</h4>
                    <p><span class="info-label">Date of Birth:</span> {{ $staffProfile->date_of_birth }}</p>
                    <p><span class="info-label">Gender:</span> {{ $staffProfile->gender }}</p>
                    <p><span class="info-label">W and OP Number:</span> {{ $staffProfile->w_and_op_number ?? 'N/A' }}</p>
                    <p><span class="info-label">Highest Education Qualifications:</span> {{ $staffProfile->highest_education_qualifications }}</p>
                </div>

                <div class="custom-frame">
                    <h4 class="section-title">Employment Details</h4>
                    <p><span class="info-label">Salary:</span> {{ $staffProfile->salary ? 'LKR ' . number_format($staffProfile->salary, 2) : 'N/A' }}</p>
                    <p><span class="info-label">Salary Increment Date:</span> {{ $staffProfile->salary_increment_date ?? 'N/A' }}</p>
                    <p><span class="info-label">Personal File Number:</span> {{ $staffProfile->personal_file_number }}</p>
                    <p><span class="info-label">First Appointment Date:</span> {{ $staffProfile->first_appointment_date }}</p>
                </div>

                <div class="custom-frame">
                    <h4 class="section-title">Appointment Letter</h4>
                    @if($staffProfile->appointment_letter)
                        <p>
                            <a href="{{ asset('storage/' . $staffProfile->appointment_letter) }}" target="_blank" class="btn btn-primary">
                                View Appointment Letter
                            </a>
                        </p>
                    @else
                        <p>No Appointment Letter Uploaded</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
