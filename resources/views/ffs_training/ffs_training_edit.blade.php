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
        .header-title {
            color: #000000;
            font-size: 2.5rem;
            font-weight: bold;
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
            justify-content: center;
            color: #fff;
            border: none;
            padding: 10px 50px;
            border-radius: 4px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .btn-back img {
            width: 45px;
            margin-right: 5px;
            transition: transform 0.3s ease;
            background: none;
            position: relative;
            z-index: 1;
        }

        .btn-back:hover img {
            transform: translateX(-50px);
        }

        .btn-back:hover .btn-text {
            opacity: 1;
            visibility: visible;
            transform: translateX(-5px);
            padding: 10px 20px;
            border-radius: 20px;
        }
    </style>

</head>
<body>

<div class="frame">
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
