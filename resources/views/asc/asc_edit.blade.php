<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit ASC Registration</title>

    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Bootstrap Bundle JS (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
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
            border-color: darkgreen !important; /* Override the border-primary color */
        }
        h2 {
            font-family: sans-serif; /* Change to your desired font */
            font-weight: bold;
        }

        .dropdown-label1 {
            text-align: left;
            display: block;
            width: 100%;
            font-weight: bold
        }

        .dropdown-label {
            text-align: center;
            font-size: 20px;
        }

        .dropdown-label {
            font-weight: bold;
        }

        .form-group, .row {
            margin-bottom: 20px; /* Adjust the value as needed for the desired spacing */
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
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .btn-back img {
            width: 45px;
            height: auto;
            margin-right: 5px;
            transition: transform 0.3s ease;
            background: none;
            position: relative;
            z-index: 1;
        }

        .btn-back .btn-text {
            opacity: 0;
            visibility: hidden;
            position: absolute;
            right: 25px;
            background-color: #1e8e1e;
            color: #fff;
            padding: 4px 8px;
            border-radius: 4px;
            transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease;
            z-index: 0;
        }

        .btn-back:hover .btn-text {
            opacity: 1;
            visibility: visible;
            transform: translateX(-5px);
            padding: 10px 20px;
            border-radius: 20px;
        }

        .btn-back:hover img {
            transform: translateX(-50px);
        }
    </style>

</head>
<body>
@include('dashboard.header')
<div class="frame" style="padding-top: 70px;">
    <div class="left-column">
        <!-- Include your left column content here -->
        @include('dashboard.dashboardC')
        @csrf
    </div>

    <div class="right-column">

    <a href="{{ route('asc_registration.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>

        <div class="col-md-12 text-center">
            <h2 class="header-title" style="color: green;">Edit Agrarian Services Center Details</h2>
        </div>

        <div class="container mt-1 mt-5 border rounded custom-border p-4" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);">

            <form action="{{ route('asc_registration.update', $ascRegistration->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="province_name" class="form-label dropdown-label">Province</label>
                            <input type="text" id="province_name" name="province_name" class="form-control" value="{{ $ascRegistration->province_name }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="district_name" class="form-label dropdown-label">District</label>
                            <input type="text" id="district_name" name="district_name" class="form-control" value="{{ $ascRegistration->district_name }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="ds_division_name" class="form-label dropdown-label">DSD</label>
                            <input type="text" id="ds_division_name" name="ds_division_name" class="form-control" value="{{ $ascRegistration->ds_division_name }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="gn_division_name" class="form-label dropdown-label">GND</label>
                            <input type="text" id="gn_division_name" name="gn_division_name" class="form-control" value="{{ $ascRegistration->gn_division_name }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="as_center" class="form-label dropdown-label">ASC</label>
                            <input type="text" id="as_center" name="as_center" class="form-control" value="{{ $ascRegistration->as_center }}" readonly>
                        </div>
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label for="asc_id">ASC ID</label>
                    <input type="text" id="asc_id" name="asc_id" class="form-control" value="{{ $ascRegistration->asc_id }}" required>
                </div> -->
                <div class="row">
                    <div class="col">
                        <div class="dropdown">
                            <label for="asc_name" class="form-label dropdown-label1">Agrarian Services Center Name</label>
                            <input type="text" id="asc_name" name="asc_name" class="form-control" value="{{ $ascRegistration->asc_name }}" required>
                        </div>
                    </div>

                    <div class="col">
                        <div class="dropdown">
                            <label for="officer_incharge" class="form-label dropdown-label1">Officer Incharge Name</label>
                            <input type="text" id="officer_incharge" name="officer_incharge" class="form-control" value="{{ $ascRegistration->officer_incharge }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="dropdown form-group">
                            <label for="contact_email" class="form-label dropdown-label1">Contact Email</label>
                            <input type="email" id="contact_email" name="contact_email" class="form-control" value="{{ $ascRegistration->contact_email }}" required>
                        </div>
                    </div>

                    <div class="col">
                        <div class="dropdown form-group">
                            <label for="contact_number" class="form-label dropdown-label1">Contact Number</label>
                            <input type="text" id="contact_number" name="contact_number" class="form-control" value="{{ $ascRegistration->contact_number }}" required>
                        </div>
                </div>

                <div class="form-group">
                    <label for="services_available" class="form-label dropdown-label1">Services Available</label>
                    <textarea id="services_available" name="services_available" class="form-control" rows="3" required>{{ $ascRegistration->services_available }}</textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
