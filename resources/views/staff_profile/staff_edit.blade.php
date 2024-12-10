<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Staff Profile</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery and jQuery UI -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Custom CSS -->
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
        .btn-back {
            display: inline-flex;
            align-items: center;
            color: white;
            border: none;
            padding: 10px 50px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
            position: relative;
            background-color: green;
        }
        .btn-back img {
            width: 45px;
            margin-right: 5px;
            transition: transform 0.3s ease;
        }
        .btn-back:hover img {
            transform: translateX(-50px);
        }
    </style>
</head>
<body>

<div class="frame">
    <!-- Left Column: Dashboard -->
    <div class="left-column">
        @include('dashboard.dashboardC') <!-- Include dashboard -->
    </div>

    <!-- Right Column: Form -->
    <div class="right-column">
        <a href="{{ route('staff_profile.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back">
            <span>Back</span>
        </a>

        <div class="container">
            <h2 class="text-center" style="color: green;">Edit Staff Profile</h2>
            
            <div class="border rounded p-4" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);">
                <form action="{{ route('staff_profile.update', $staffProfile->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Staff Type -->
                    <div class="mb-3">
                        <label for="staff_type" class="form-label">Staff Type</label>
                        <input type="text" class="form-control" id="staff_type" name="staff_type" value="{{ $staffProfile->staff_type }}" required>
                    </div>

                    <!-- Photo -->
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                        @if($staffProfile->photo)
                            <p>Current Photo: 
                                <img src="{{ asset('storage/' . $staffProfile->photo) }}" alt="Staff Photo" width="100">
                            </p>
                        @endif
                    </div>

                    <!-- Name with Initials -->
                    <div class="mb-3">
                        <label for="name_with_initials" class="form-label">Name with Initials</label>
                        <input type="text" class="form-control" id="name_with_initials" name="name_with_initials" value="{{ $staffProfile->name_with_initials }}" required>
                    </div>

                    <!-- NIC Number -->
                    <div class="mb-3">
                        <label for="nic_number" class="form-label">NIC Number</label>
                        <input type="text" class="form-control" id="nic_number" name="nic_number" value="{{ $staffProfile->nic_number }}" required>
                    </div>

                    <!-- Designation -->
                    <div class="mb-3">
                        <label for="designation" class="form-label">Designation</label>
                        <input type="text" class="form-control" id="designation" name="designation" value="{{ $staffProfile->designation }}" required>
                    </div>

                    <!-- Permanent Address -->
                    <div class="mb-3">
                        <label for="permanent_address" class="form-label">Permanent Address</label>
                        <input type="text" class="form-control" id="permanent_address" name="permanent_address" value="{{ $staffProfile->permanent_address }}" required>
                    </div>

                    <!-- Contact Number -->
                    <div class="mb-3">
                        <label for="contact_number" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ $staffProfile->contact_number }}" required>
                    </div>

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email_address" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email_address" name="email_address" value="{{ $staffProfile->email_address }}">
                    </div>

                    <!-- Date of Birth -->
                    <div class="mb-3">
                        <label for="date_of_birth" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $staffProfile->date_of_birth }}" required>
                    </div>

                    <!-- Gender -->
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="{{ $staffProfile->gender }}">{{ $staffProfile->gender }}</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <!-- W&OP Number -->
                    <div class="mb-3">
                        <label for="w_and_op_number" class="form-label">W&OP Number</label>
                        <input type="text" class="form-control" id="w_and_op_number" name="w_and_op_number" value="{{ $staffProfile->w_and_op_number }}" required>
                    </div>

                    <!-- Highest Educational Qualifications -->
                    <div class="mb-3">
                        <label for="highest_education_qualifications" class="form-label">Highest Education Qualifications</label>
                        <input type="text" class="form-control" id="highest_education_qualifications" name="highest_education_qualifications" value="{{ $staffProfile->highest_education_qualifications }}" required>
                    </div>

                    <!-- Salary -->
                    <div class="mb-3">
                        <label for="salary" class="form-label">Salary</label>
                        <input type="number" class="form-control" id="salary" name="salary" value="{{ $staffProfile->salary }}" required>
                    </div>

                    <!-- Salary Increment Date -->
                    <div class="mb-3">
                        <label for="salary_increment_date" class="form-label">Salary Increment Date</label>
                        <input type="date" class="form-control" id="salary_increment_date" name="salary_increment_date" value="{{ $staffProfile->salary_increment_date }}" required>
                    </div>

                    <!-- Personal File Number -->
                    <div class="mb-3">
                        <label for="personal_file_number" class="form-label">Personal File Number</label>
                        <input type="text" class="form-control" id="personal_file_number" name="personal_file_number" value="{{ $staffProfile->personal_file_number }}" required>
                    </div>

                    <!-- Appointment Letter -->
                    <div class="mb-3">
                        <label for="appointment_letter" class="form-label">Appointment Letter (PDF)</label>
                        <input type="file" class="form-control" id="appointment_letter" name="appointment_letter">
                        @if($staffProfile->appointment_letter)
                            <p>Current File: <a href="{{ asset('storage/' . $staffProfile->appointment_letter) }}" target="_blank">View Appointment Letter</a></p>
                        @endif
                    </div>

                    <!-- First Appointment Date -->
                    <div class="mb-3">
                        <label for="first_appointment_date" class="form-label">First Appointment Date</label>
                        <input type="date" class="form-control" id="first_appointment_date" name="first_appointment_date" value="{{ $staffProfile->first_appointment_date }}" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Update Staff Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>$(document).on('click', '.status-toggle', function (e) {
    e.preventDefault();

    let button = $(this); // Button clicked
    let staffId = button.closest('form').data('id'); // Staff ID from data attribute
    let newStatus = button.text().trim() === 'In Service' ? 'resigned' : 'in_service';

    $.ajax({
        url: `/staff_profile/${staffId}/status`,
        type: 'PATCH',
        data: {
            _token: '{{ csrf_token() }}',
        },
        success: function (response) {
            if (response.success) {
                // Toggle button class and text
                button
                    .toggleClass('btn-success btn-danger')
                    .text(response.new_status === 'in_service' ? 'In Service' : 'Resigned');
            }
        },
        error: function () {
            alert('Failed to update status. Please try again.');
        }
    });
});
</script>
</body>
</html>
