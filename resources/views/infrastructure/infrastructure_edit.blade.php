<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Infrastructure</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery UI library -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <style>
        /* Custom styles */
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .dropdown {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .dropdown-menu {
            min-width: auto;
        }

        .dropdown-item {
            padding: 10px;
            font-size: 16px;
        }

        /* Adjust button width to fit the content */
        .dropdown-toggle {
            min-width: 250px; /* Increase the width */
        }

        /* Center align labels */
        .dropdown-label {
            text-align: center;
            font-size: 20px;
        }
        /* Adjust dropdown button text alignment */

        .frame {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
        }

        .left-column {
            flex: 0 0 20%;
            /*padding: 20px;*/
            border-right: 1px solid #dee2e6;

        }

        .right-column {
            flex: 0 0 80%;
            padding: 20px;
        }

        .custom-border {
            border-color: darkgreen !important; /* Override the border-primary color */
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
        </div>
    <div class="right-column">

    <a href="{{ route('infrastructure.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>

        <div class="col-md-12 text-center">
        <h2 class="header-title" style="color: green;">Edit Infrastructure Details</h2>
        </div>
</br>

        <div class="container mt-1 border rounded custom-border p-4" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);">
            <form action="/infrastructure/{{ $infrastructure->id }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col">
                        <div class="dropdown">
                            <label for="province" class="form-label dropdown-label">Province</label>
                            <input type="text" class="form-control" id="province" name="province_name" value="{{ $infrastructure->province_name }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <label for="district" class="form-label dropdown-label">District</label>
                            <input type="text" class="form-control" id="district" name="district" value="{{ $infrastructure->district }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <label for="dsd" class="form-label dropdown-label">DSD</label>
                            <input type="text" class="form-control" id="ds_division" name="ds_division_name" value="{{ $infrastructure->ds_division_name }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <label for="gnd" class="form-label dropdown-label">GND</label>
                            <input type="text" class="form-control" id="gn_division" name="gn_division_name" value="{{ $infrastructure->gn_division_name }}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="dropdown">
                            <label for="asc" class="form-label dropdown-label">ASC</label>
                            <input type="text" class="form-control" id="as_centre" name="as_centre" value="{{ $infrastructure->as_centre }}" readonly>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">

                        <div class="col">
                            <div class="dropdown">
                                <label for="status">Infrastructure Status</label>
                                <select class="form-control btn btn-secondary" name="status" data-bs-toggle="dropdown" aria-expanded="false" required style="background-color: green; color: white;">
                                    <option value="{{ $infrastructure->status }}">{{ $infrastructure->status }}</option>
                                    <option value="Identified">Identified</option>
                                    <option value="Started">Started</option>
                                    <option value="On Going">On Going</option>
                                    <option value="Finished">Finished</option>
                                    <option value="PIR Completed">PIR Completed</option>
                                    <option value="Survey Completed">Survey Completed</option>
                                    <option value="Engineering Serveys">Engineering Serveys</option>
                                    <option value="Drawings and Designs Completed">Drawings and Designs Completed</option>
                                    <option value="BOQ Completed">BOQ Completed</option>
                                    <option value="Ratification meeting completed">Ratification meeting completed</option>
                                    <option value="Bidding documents completed">Bidding documents completed</option>
                                    <option value="IFAD no objection received">IFAD no objection received</option>
                                    <option value="Paper advertised">Paper advertised</option>
                                    <option value="Evalution of bids">Evalution of bids</option>
                                    <option value="Agreement Sign">Agreement Sign</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="dropdown">
                                <label for="agency">Implementing Agency</label>
                                <select class="form-control btn btn-secondary" name="agency" data-bs-toggle="dropdown" aria-expanded="false" required style="background-color: green; color: white;">
                                    <option value="{{ $infrastructure->agency }}">{{ $infrastructure->agency }}</option>
                                    <option value="Central(ID)">Central(ID)</option>
                                    <option value="DAD">DAD</option>
                                    <option value="PID">PID</option>
                                    <option value="ID">ID</option>
                                    <option value="DI">DI</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="dropdown">
                                <label for="cascade_name">Cascade Name</label>
                                <select class="form-control btn btn-secondary" id="cascadeDropdown" name="cascade_name" data-bs-toggle="dropdown" aria-expanded="false" required style="background-color: green; color: white;">
                                    <option value="{{ $infrastructure->cascade_name }}">{{ $infrastructure->cascade_name }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="type_of_infrastructure" class="form-label">Type of Infrastructure</label>
                            <input type="text" class="form-control" name="type_of_infrastructure" id="type_of_infrastructure" value="{{ $infrastructure->type_of_infrastructure }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="infrastructure_progress" class="form-label">Infrastructure Progress</label>
                            <input type="text" class="form-control" id="infrastructure_progress" name="infrastructure_progress" value="{{ $infrastructure->infrastructure_progress }}" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="river_basin" class="form-label">River Basin</label>
                        <input type="text" class="form-control" name="river_basin" id="river_basin" value="{{ $infrastructure->river_basin }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="infrastructure_description" class="form-label">Infrastructure Description</label>
                        <textarea class="form-control" id="infrastructure_description" name="infrastructure_description" required>{{ $infrastructure->infrastructure_description }}</textarea>
                    </div>

                    <h2 class="text-center mt-5" style="font-family: Arial, sans-serif; font-weight: bold;">Contract Information</h2>
                    <div class="mb-3">
                        <label for="contractor" class="form-label">Contractor Name</label>
                        <input type="text" class="form-control" id="contractor" name="contractor" value="{{ $infrastructure->contractor }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="payment" class="form-label">Payment</label>
                        <input type="text" class="form-control" id="payment" name="payment" value="{{ $infrastructure->payment }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="eot" class="form-label">EOT</label>
                        <input type="text" class="form-control" id="eot" name="eot" value="{{ $infrastructure->eot }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="contract_period" class="form-label">Construction Period (Months)</label>
                        <input type="text" class="form-control" id="contract_period" name="contract_period" value="{{ $infrastructure->contract_period }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_of_family" class="form-label">Number Of Family Members</label>
                        <input type="text" class="form-control" id="no_of_family" name="no_of_family" value="{{ $infrastructure->no_of_family }}" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="latitude" class="form-label">Latitude</label>
                            <input type="text" class="form-control" id="latitude" name="latitude" value="{{ $infrastructure->latitude }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input type="text" class="form-control" id="longitude" name="longitude" value="{{ $infrastructure->longitude }}" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="remarks" class="form-label">Remarks</label>
                        <input type="text" class="form-control" id="remarks" name="remarks" value="{{ $infrastructure->remarks }}" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>


        $(document).ready(function () {
            // Fetch ASC names from the API endpoint
            $.get('/asc', function (data) {
                // Populate the dropdown menu with ASC names
                $.each(data, function (index, asc) {
                    $('#ascDropdown').append($('<option>', {
                        value: asc.asc_name,
                        text: asc.asc_name
                    }));
                });
            });
        });

        $(document).ready(function () {
            // Fetch cascade names from the API endpoint
            $.get('/cascades', function (data) {
                // Populate the dropdown menu with cascade names
                $.each(data, function (index, cascade) {
                    $('#cascadeDropdown').append($('<option>', {
                        value: cascade.cascade_name,
                        text: cascade.cascade_name
                    }));
                });
            });
        });

        $(document).ready(function() {
            // Add '%' sign to infrastructure progress input
            $('#infrastructure_progress').on('blur', function() {
                let value = $(this).val();
                if (value && !value.includes('%')) {
                    $(this).val(value + '%');
                }
            });
        });
    </script>
</body>
</html>
