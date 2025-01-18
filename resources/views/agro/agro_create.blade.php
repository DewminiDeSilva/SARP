<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Agro Enterprise</title>
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

        .card-custom {
            background-color: #fcfcfc; /* Very light grey */
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

        #add-asset {
        background-color: #28a745; /* Green background */
        color: white; /* White text */
    }

    #add-asset:hover {
        background-color: #218838; /* Darker green when hovered */
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

    <a href="{{ route('agro.index') }}" class="btn-back">
        <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
    </a>

    <div class="col-md-12 text-center">
                    <h2 class="header-title" style="color: green;">Agro Enterprise Registration</h2>
                </div>
</br>
        <div class="container mt-1 border rounded custom-border p-4" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);">
            <form class="form-horizontal" action="{{ route('agro.store') }}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="row">
                    <div class="col-6 form-group">
                        <label for="enterprise_name">Agro Enterprise Name</label>
                        <input type="text" name="enterprise_name" id="enterprise_name" class="form-control" required>
                    </div>
                    <div class="col-6 form-group">
                        <label for="registration_number">Registration Number</label>
                        <input type="text" name="registration_number" id="registration_number" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="institute_of_registration">Institute of Registration</label>
                    <input type="text" name="institute_of_registration" id="institute_of_registration" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" required>
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
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="col-4 form-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" name="phone_number" id="phone_number" class="form-control" required>
                            </div>
                            <div class="col-4 form-group">
                                <label for="website_name">Website Name</label>
                                <input type="text" name="website_name" id="website_name" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description_of_certificates">Description of Certificates</label>
                    <textarea name="description_of_certificates" id="description_of_certificates" class="form-control" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <label for="nature_of_business">Nature of Business</label>
                    <input type="text" name="nature_of_business" id="nature_of_business" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="products_available">Products Available</label>
                    <textarea name="products_available" id="products_available" class="form-control" rows="4" required></textarea>
                </div>

                <!-- Value of Assets Section -->
                <div class="card mb-4 card-custom">
                    <div class="card-header bg-success text-white">
                        Value of Assets
                    </div>
                    <div class="card-body">
                        <div id="asset-fields">
                            <div class="row asset-group">
                                <div class="col-5 form-group">
                                    <label for="asset_name">Asset Name</label>
                                    <input type="text" name="asset_name[]" class="form-control" required>
                                </div>
                                <div class="col-5 form-group">
                                    <label for="asset_value">Asset Value</label>
                                    <input type="number" step="0.01" name="asset_value[]" class="form-control" required>
                                </div>
                                <!-- No remove button for the first asset group -->
                            </div>
                        </div>
                        <button type="button" id="add-asset" class="btn btn-primary mt-3">Add More Assets</button>
                    </div>
                </div>

                <div class="form-group mt-4">
                    <label for="yield_collection_details">Yield Collection Details</label>
                    <textarea name="yield_collection_details" id="yield_collection_details" class="form-control" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label for="marketing_information">Marketing Information</label>
                    <textarea name="marketing_information" id="marketing_information" class="form-control" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label for="list_of_distributors">List of Distributors</label>
                    <textarea name="list_of_distributors" id="list_of_distributors" class="form-control" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label for="business_plan">Business Plan (Upload PDF)</label>
                    <input type="file" name="business_plan" id="business_plan" class="form-control-file" accept="application/pdf">
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" name="button" class="btn btn-success mt-3">Submit</button>
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
