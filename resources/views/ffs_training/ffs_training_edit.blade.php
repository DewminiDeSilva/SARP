<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit FFS Training Program</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Include jQuery UI library -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            background-color: #f0f4f7;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
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
        .dropdown {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .dropdown-label {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }
        .form-control[readonly] {
            background-color: #e9ecef;
            opacity: 1;
        }
        .form-control {
            border-radius: 5px;
            border: 2px solid #ced4da;
            padding: 10px;
            transition: border-color 0.3s ease;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        .submit-btn {
            background-color: #28a745;
            border-color: #28a745;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        .submit-btn:hover {
            background-color: #218838;
            border-color: #1e7e34;
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
    <div class="left-column">
        @include('dashboard.dashboardC')
        @csrf
    </div>
    <div class="right-column">

    <a href="{{ route('ffs-training.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>

        <div class="col-md-12 text-center">
                <h2 class="header-title" style="color: green;">Edit FFS Training Program</h2>
            </div>

        <div class="container mt-5">

            <form class="form-horizontal" method="POST" action="{{ route('ffs-training.update', $ffsTraining->id) }}">
                @csrf
                @method('PUT')

                <!-- Province Dropdown (Locked) -->
                <div class="row">
                    <div class="col">
                        <div class="dropdown">
                            <label for="province" class="form-label dropdown-label">Province</label>
                            <input type="text" id="provinceName" name="province_name" class="form-control" value="{{ $ffsTraining->province_name }}" readonly>
                        </div>
                    </div>

                    <!-- District Dropdown (Locked) -->
                    <div class="col">
                        <div class="dropdown">
                            <label for="district" class="form-label dropdown-label">District</label>
                            <input type="text" id="districtName" name="district" class="form-control" value="{{ $ffsTraining->district }}" readonly>
                        </div>
                    </div>

                    <!-- DSD Dropdown (Locked) -->
                    <div class="col">
                        <div class="dropdown">
                            <label for="dsd" class="form-label dropdown-label">DSD</label>
                            <input type="text" id="dsDivisionName" name="ds_division_name" class="form-control" value="{{ $ffsTraining->ds_division_name }}" readonly>
                        </div>
                    </div>

                    <!-- GND Dropdown (Locked) -->
                    <div class="col">
                        <div class="dropdown">
                            <label for="gnd" class="form-label dropdown-label">GND</label>
                            <input type="text" id="gndName" name="gn_division_name" class="form-control" value="{{ $ffsTraining->gn_division_name }}" readonly>
                        </div>
                    </div>

                    <!-- ASC Dropdown (Locked) -->
                    <div class="col">
                        <div class="dropdown">
                            <label for="asc" class="form-label dropdown-label">ASC</label>
                            <input type="text" id="ascName" name="as_center" class="form-control" value="{{ $ffsTraining->as_center }}" readonly>
                        </div>
                    </div>
                </div>

                <!-- Rest of the Form Fields -->

                <div class="container mt-5">
                    <div class="row g-3">
                        <!-- Venue Field -->
                        <div class="col-md-4 mb-3">
                            <label for="venue">Venue</label>
                            <input type="text" class="form-control" id="venue" name="venue" value="{{ $ffsTraining->venue }}" required>
                        </div>

                        <!-- Program Name Field -->
                        <div class="col-md-4 mb-3">
                            <label for="program_name">Program Name</label>
                            <input type="text" class="form-control" id="program_name" name="program_name" value="{{ $ffsTraining->program_name }}" required>
                        </div>

                        <!-- Program Number Field -->
                        <div class="col-md-4 mb-3">
                            <label for="program_number">Program Number</label>
                            <input type="text" class="form-control" id="program_number" name="program_number" value="{{ $ffsTraining->program_number }}" required>
                        </div>

                        <!-- Crop Name Field -->
                        <div class="col-md-4 mb-3">
                            <label for="crop_name">Crop Name</label>
                            <input type="text" class="form-control" id="crop_name" name="crop_name" value="{{ $ffsTraining->crop_name }}" required>
                        </div>

                        <!-- Start Date Field -->
                        <div class="col-md-4 mb-3">
                            <label for="startDate">Start Date</label>
                            <input type="text" class="form-control" id="startDate" name="date" value="{{ $ffsTraining->date }}" required>
                        </div>

                        <!-- Resource Person Name Field -->
                        <div class="col-md-4 mb-3">
                            <label for="resource_person_name">Resource Person Name</label>
                            <input type="text" class="form-control" id="resource_person_name" name="resource_person_name" value="{{ $ffsTraining->resource_person_name }}" required>
                        </div>

                        <!-- Training Program Cost Field -->
                        <div class="col-md-4 mb-3">
                            <label for="training_program_cost">Training Program Cost</label>
                            <input type="text" class="form-control" id="training_program_cost" name="training_program_cost" value="{{ $ffsTraining->training_program_cost }}" required>
                        </div>

                        <!-- Resource Person Payment Field -->
                        <div class="col-md-4 mb-3">
                            <label for="resource_person_payment">Resource Person Payment</label>
                            <input type="text" class="form-control" id="resource_person_payment" name="resource_person_payment" value="{{ $ffsTraining->resource_person_payment }}" required>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-md-12 mb-3 text-center">
                            <button type="submit" class="btn btn-success submit-btn">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Date Picker Script -->
<script>
    $("#startDate").datepicker({
        dateFormat: 'yy-mm-dd'
    });
</script>

</body>
</html>
