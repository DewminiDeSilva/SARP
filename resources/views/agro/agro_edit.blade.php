<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Agro Enterprise</title>
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
        /* Frame structure */
        .frame {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
            background-color: #f4f7f9;
        }

        .left-column {
            flex: 0 0 20%;
            border-right: 1px solid #dee2e6;
            background-color: #2a2f32;
            color: white;
        }

        .right-column {
            flex: 0 0 80%;
            padding: 20px;
            background-color: #ffffff;
        }

        /* Card styling */
        .card-custom {
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
        }

        .card-header {
            font-size: 1.25rem;
            font-weight: 500;
            background-color: #28a745;
            color: white;
            border-bottom: 1px solid #ced4da;
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
        }

        .card-body {
            padding: 1.25rem;
        }

        /* Form styling */
        .form-control {
            border-radius: 0.2rem;
            border: 1px solid #ced4da;
            padding: 0.5rem 1rem;
            background-color: #e9f7ef; /* Light green background to indicate update */
            color: #155724; /* Dark green text */
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        /* Buttons */
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            padding: 0.5rem 1rem;
            font-size: 1rem;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }9+3

        /* Add More Assets Button */
        .btn-primary {
            background-color: #0062cc;
            border-color: #005cbf;
            font-size: 0.875rem;
            padding: 0.375rem 0.75rem;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        /* Remove Asset Button */
        .remove-asset-btn {
            background-color: #dc3545;
            border-color: #dc3545;
            font-size: 0.875rem;
            padding: 0.375rem 0.75rem;
            margin-top: 33px;
            margin-left: 50px;
            margin-right: 0;
            margin-bottom: 0;
            float: flex;
        }

        .remove-asset-btn:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        /* Overall page styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f9;
            color: #343a40;
        }

        h2 {
            color: #343a40;
            font-weight: bold;
            font-size: 1.75rem;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        label {
            font-weight: 500;
            color: #343a40;
        }

        /* File input styling */
        .form-control-file {
            display: block;
            width: 100%;
            margin-top: 0.5rem;
        }

        .file-preview {
            margin-top: 1rem;
            font-size: 0.875rem;
            color: #495057;
        }

        /* Additional assets section */
        .asset-group {
            border-bottom: 1px solid #ced4da;
            padding-bottom: 1rem;
            margin-bottom: 1rem;
            position: relative;
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
    <div class="left-column">
        @include('dashboard.dashboardC')
        @csrf
    </div>
    <div class="right-column">

    <a href="{{ route('agro.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>

        <div class="col-md-12 text-center">
    <h2 class="header-title" style="color: green;">Edit Agro Enterprise</h2>
    </div>

        <div class="container mt-1 border rounded custom-border p-4" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);">
            <form class="form-horizontal" action="{{ route('agro.update', $agro->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')



                <div class="row">
                    <div class="col-6 form-group">
                        <label for="enterprise_name">Agro Enterprise Name</label>
                        <input type="text" name="enterprise_name" id="enterprise_name" class="form-control" value="{{ $agro->enterprise_name }}" required>
                    </div>
                    <div class="col-6 form-group">
                        <label for="registration_number">Registration Number</label>
                        <input type="text" name="registration_number" id="registration_number" class="form-control" value="{{ $agro->registration_number }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="institute_of_registration">Institute of Registration</label>
                    <input type="text" name="institute_of_registration" id="institute_of_registration" class="form-control" value="{{ $agro->institute_of_registration }}" required>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ $agro->address }}" required>
                </div>

                <!-- Contact Details Section -->
                <div class="card mb-4 card-custom">
                    <div class="card-header bg-success text-white">
                        Contact Details
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $agro->email }}" required>
                            </div>
                            <div class="col-4 form-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ $agro->phone_number }}" required>
                            </div>
                            <div class="col-4 form-group">
                                <label for="website_name">Website Name</label>
                                <input type="text" name="website_name" id="website_name" class="form-control" value="{{ $agro->website_name }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description_of_certificates">Description of Certificates</label>
                    <textarea name="description_of_certificates" id="description_of_certificates" class="form-control" rows="4">{{ $agro->description_of_certificates }}</textarea>
                </div>

                <div class="form-group">
                    <label for="nature_of_business">Nature of Business</label>
                    <input type="text" name="nature_of_business" id="nature_of_business" class="form-control" value="{{ $agro->nature_of_business }}" required>
                </div>

                <div class="form-group">
                    <label for="products_available">Products Available</label>
                    <textarea name="products_available" id="products_available" class="form-control" rows="4" required>{{ $agro->products_available }}</textarea>
                </div>

                <!-- Value of Assets Section -->
                <div class="card mb-4 card-custom">
                    <div class="card-header bg-success text-white">
                        Value of Assets
                    </div>
                    <div class="card-body">
                        <div id="asset-fields">
                            @foreach ($agro->assets as $asset)
                                <div class="row asset-group mt-3" data-id="{{ $asset->id }}">
                                    <div class="col-5 form-group">
                                        <label for="asset_name">Asset Name</label>
                                        <input type="text" name="asset_name[]" class="form-control" value="{{ $asset->asset_name }}" required>
                                    </div>
                                    <div class="col-5 form-group">
                                        <label for="asset_value">Asset Value</label>
                                        <input type="number" step="0.01" name="asset_value[]" class="form-control" value="{{ $asset->asset_value }}" required>
                                    </div>
                                    <div class="col-2">
                                        <button type="button" class="btn btn-danger remove-asset-btn">Remove</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" id="add-asset" class="btn btn-success mt-3">Add More Assets</button>
                    </div>
                </div>

                <div class="form-group mt-4">
                    <label for="yield_collection_details">Yield Collection Details</label>
                    <textarea name="yield_collection_details" id="yield_collection_details" class="form-control" rows="4" required>{{ $agro->yield_collection_details }}</textarea>
                </div>

                <div class="form-group">
                    <label for="marketing_information">Marketing Information</label>
                    <textarea name="marketing_information" id="marketing_information" class="form-control" rows="4" required>{{ $agro->marketing_information }}</textarea>
                </div>

                <div class="form-group">
                    <label for="list_of_distributors">List of Distributors</label>
                    <textarea name="list_of_distributors" id="list_of_distributors" class="form-control" rows="4" required>{{ $agro->list_of_distributors }}</textarea>
                </div>

                <div class="form-group">
                    <label for="business_plan">Business Plan (Upload PDF)</label>
                    <input type="file" name="business_plan" id="business_plan" class="form-control-file" accept="application/pdf">
                    @if($agro->business_plan)
                        <div class="file-preview">
                            Current Plan: <a href="{{ route('agro.view_pdf', $agro->id) }}" target="_blank">View Current PDF</a>
                        </div>
                    @endif
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" name="button" class="btn btn-success mt-3">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('add-asset').addEventListener('click', function () {
    var assetFields = document.getElementById('asset-fields');
    var newAssetGroup = document.createElement('div');
    newAssetGroup.className = 'row asset-group mt-3';
    newAssetGroup.innerHTML = `
        <div class="col-5 form-group">
            <label for="asset_name">Asset Name</label>
            <input type="text" name="asset_name[]" class="form-control" required>
        </div>
        <div class="col-5 form-group">
            <label for="asset_value">Asset Value</label>
            <input type="number" step="0.01" name="asset_value[]" class="form-control" required>
        </div>
        <div class="col-2">
            <button type="button" class="btn btn-danger remove-asset-btn">Remove</button>
        </div>
    `;
    assetFields.appendChild(newAssetGroup);
});

// Remove asset from the DOM
$(document).on('click', '.remove-asset-btn', function() {
    $(this).closest('.asset-group').remove();
});
</script>
</body>
</html>
