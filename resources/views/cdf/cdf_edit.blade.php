<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit CDF Registration</title>
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
        .custom-border {
            border: 2px solid green;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .dropdown-label {
            font-weight: bold;
        }
        .bold-label {
            font-weight: bold;
        }
        .color-label {
            color: green;
        }
        .frame {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
        }
        .right-column {
            flex: 0 0 80%;
            padding: 20px;
        }
        .left-column {
            flex: 0 0 20%;
            border-right: 1px solid #dee2e6;
        }

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

        <a href="{{ route('cdf.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>

        <div class="center-heading text-center">
            <h1 style="font-size: 2.5rem; color: green;">Edit CDF Registration</h1>
        </div>

    <div class="container mt-5 border rounded custom-border p-4" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);">

        <form action="{{ route('cdf.update', $cdf->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <label for="provinceName" class="form-label">Province Name</label>
                    <input type="text" id="provinceName" name="province_name" class="form-control" value="{{ $cdf->province_name }}" required>
                </div>
                <div class="col">
                    <label for="districtName" class="form-label">District Name</label>
                    <input type="text" id="districtName" name="district_name" class="form-control" value="{{ $cdf->district_name }}" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="dsDivisionName" class="form-label">DS Division Name</label>
                    <input type="text" id="dsDivisionName" name="ds_division_name" class="form-control" value="{{ $cdf->ds_division_name }}" required>
                </div>
                <div class="col">
                    <label for="gnDivisionName" class="form-label">GN Division Name</label>
                    <input type="text" id="gnDivisionName" name="gn_division_name" class="form-control" value="{{ $cdf->gn_division_name }}" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="asCenter" class="form-label">AS Center</label>
                    <input type="text" id="asCenter" name="as_center" class="form-control" value="{{ $cdf->as_center }}" required>
                </div>
                <div class="col">
                    <label for="cascadeName" class="form-label">Cascade Name</label>
                    <input type="text" id="cascadeName" name="cascade_name" class="form-control" value="{{ $cdf->cascade_name }}" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="cdfName" class="form-label">CDF Name</label>
                    <input type="text" id="cdfName" name="cdf_name" class="form-control" value="{{ $cdf->cdf_name }}" required>
                </div>
                <div class="col">
                    <label for="cdfAddress" class="form-label">CDF Address</label>
                    <input type="text" id="cdfAddress" name="cdf_address" class="form-control" value="{{ $cdf->cdf_address }}" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </div>
        </form>
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
    </script>
</body>
</html>
