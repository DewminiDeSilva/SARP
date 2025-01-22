<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Staff Profile</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            border: 2px solid green;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .form-label {
            font-weight: bold;
            /* color: #28a745; */
        }

        .form-control:focus {
            border-color: #28a745;
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
        }

        .btn-submit {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-submit:hover {
            background-color: #218838;
            color: white;
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
@include('dashboard.header')
    <div class="frame" style="padding-top: 70px;">
        <!-- Include Dashboard -->
        <div class="left-column">
            @include('dashboard.dashboardC')
        </div>

        <div class="right-column">
            <!-- Back Button -->
            <a href="{{ route('staff_profile.index') }}" class="btn-back">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>

            <div class="col-md-12 text-center">
                <h2 class="header-title" style="color: green;">Create Staff Profile</h2>
            </div>

            <div class="container mt-3 border rounded p-4 custom-border">

                @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

                <form action="{{ route('staff_profile.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Staff Type and Photo -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <select class="form-control" id="staff_type" name="staff_type" required>
                                <option value="" disabled selected>Select Staff Type</option>
                                <option value="Carder Position">Carder Position</option>
                                <option value="Consultant">Consultant</option>
                                <option value="Daily Basis">Daily Basis</option>
                                <option value="Internship">Internship</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="photo" class="form-label">Photo</label>
                            <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                        </div>
                    </div>

                    <!-- Name and NIC -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name_with_initials" class="form-label">Name with Initials</label>
                            <input type="text" class="form-control" id="name_with_initials" name="name_with_initials" placeholder="Enter Name with Initials" required>
                        </div>
                        <div class="col-md-6">
                            <label for="nic_number" class="form-label">NIC Number</label>
                            <input type="text" class="form-control" id="nic_number" name="nic_number" placeholder="Enter NIC Number" required>
                        </div>
                    </div>
                    <!-- Grade Input -->
<div class="col-md-6">
    <label for="grade" class="form-label">Grade</label>
    <input type="text" class="form-control" id="grade" name="grade" value="{{ old('grade', $staffProfile->grade ?? '') }}">
</div>




                    <!-- Designation and Permanent Address -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="designation" class="form-label">Designation</label>
                            <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter Designation" required>
                        </div>
                        <div class="col-md-6">
                            <label for="permanent_address" class="form-label">Permanent Address</label>
                            <textarea class="form-control" id="permanent_address" name="permanent_address" placeholder="Enter Permanent Address" rows="2" required></textarea>
                        </div>
                    </div>

                    <!-- Contact Details -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="contact_number" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Enter Contact Number">
                        </div>
                        <div class="col-md-4">
                            <label for="mobile_fixed" class="form-label">Mobile Fixed</label>
                            <input type="text" class="form-control" id="mobile_fixed" name="mobile_fixed" placeholder="Enter Mobile Fixed">
                        </div>
                        <div class="col-md-4">
                            <label for="email_address" class="form-label">Official Email Address</label>
                            <input type="email" class="form-control" id="email_address" name="email_address" placeholder="Enter Email Address">
                        </div>
                    </div>

                    <!-- DOB and Gender -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="date_of_birth" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                        </div>
                        <div class="col-md-6">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>

                    <!-- W and OP, Education -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="w_and_op_number" class="form-label">W and OP Number</label>
                            <input type="text" class="form-control" id="w_and_op_number" name="w_and_op_number" placeholder="Enter W and OP Number">
                        </div>
                        <div class="col-md-6">
                            <label for="highest_education_qualifications" class="form-label">Highest Education Qualifications</label>
                            <input type="text" class="form-control" id="highest_education_qualifications" name="highest_education_qualifications" placeholder="Enter Education Qualifications">
                        </div>
                    </div>

                    <!-- Salary and Increment -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="salary" class="form-label">Salary</label>
                            <input type="number" class="form-control" id="salary" name="salary" placeholder="Enter Salary">
                        </div>
                        <div class="col-md-6">
                            <label for="salary_increment_date" class="form-label">Salary Increment Date</label>
                            <input type="date" class="form-control" id="salary_increment_date" name="salary_increment_date">
                        </div>
                    </div>

                    <!-- Personal File and Appointment -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="personal_file_number" class="form-label">Personal File Number</label>
                            <input type="text" class="form-control" id="personal_file_number" name="personal_file_number" placeholder="Enter Personal File Number">
                        </div>
                        <div class="col-md-6">
                            <label for="appointment_letter" class="form-label">Appointment Letter (PDF)</label>
                            <input type="file" class="form-control" id="appointment_letter" name="appointment_letter" accept=".pdf">
                        </div>
                    </div>

                    <!-- First Appointment Date -->
                    <div class="mb-3">
                        <label for="first_appointment_date" class="form-label">First Appointment Date</label>
                        <input type="date" class="form-control" id="first_appointment_date" name="first_appointment_date">
                    </div>
<!-- CV Upload -->
<div class="col-md-6">
    <label for="cv" class="form-label">Upload CV</label>
    <input type="file" class="form-control" id="cv" name="cv" accept=".pdf">
</div>
</br>
                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
