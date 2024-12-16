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

<style>
    .btn-back {
        display: inline-flex;
        align-items: center;
        justify-content: center; /* Center content horizontally */
        /*background-color: #26CF23; /* Button background color */
        color: #fff; /* Text color */
        border: none; /* Remove default border */
        padding: 10px 50px; /* Adjust padding */
        border-radius: 4px; /* Rounded corners */
        text-decoration: none; /* Remove underline */
        font-size: 14px; /* Font size */
        transition: background-color 0.3s ease; /* Smooth transition */
        cursor: pointer; /* Pointer cursor on hover */
        position: relative; /* Position relative for text positioning */
        overflow: hidden; /* Hide overflow to create a smooth effect */
    }

    .btn-back img {
        width: 45px; /* Adjust the size of the arrow image */
        height: auto;
        margin-right: 5px; /* Space between the image and text */
        transition: transform 0.3s ease; /* Smooth transition for image */
        background: none; /* Ensure no background on the image */
        position: relative; /* Position relative for smooth animation */
        z-index: 1; /* Ensure image is on top */
    }

    .btn-back .btn-text {
        opacity: 0; /* Hide text initially */
        visibility: hidden; /* Hide text initially */
        position: absolute; /* Position absolutely within the button */
        right: 25px; /* Adjust right position to fit the button */
        background-color: #1e8e1e; /* Background color for text on hover */
        color: #fff; /* Text color */
        padding: 4px 8px; /* Padding around text */
        border-radius: 4px; /* Rounded corners for text background */
        transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease; /* Smooth transition */
        z-index: 0; /* Ensure text is beneath the image */
    }

    .btn-back:hover .btn-text {
        opacity: 1; /* Show text on hover */
        visibility: visible; /* Show text on hover */
        transform: translateX(-5px); /* Move text to the right on hover */
        padding: 10px 20px; /* Adjust padding */
        border-radius: 20px; /* Rounded corners */
    }

    .btn-back:hover img {
        transform: translateX(-50px); /* Move image to the left on hover */
    }

    .btn-back:hover {
        /*background-color: #1e8e1e; /* Dark green on hover */

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
            <a href="{{ route('staff_profile.index') }}" class="btn-back">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
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
