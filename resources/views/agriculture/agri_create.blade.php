<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agriculture Form</title>
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery UI library -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- CSRF Token for AJAX -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

<style>
    .sidebar {
        transition: transform 0.3s ease; /* Smooth toggle animation */
    }

    .sidebar.hidden {
        transform: translateX(-100%); /* Move sidebar out of view */
    }

    #sidebarToggle {
        background-color: #126926; /* Match the back button color */
        color: white;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    #sidebarToggle:hover {
        background-color: #0a4818; /* Darken the hover color */
    }


    .left-column.hidden {
    display: none; /* Hide the sidebar */
}
.right-column {
    transition: flex 0.3s ease, padding 0.3s ease; /* Smooth transition for width and padding */
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

    <div class="d-flex align-items-center mb-3">

    <!-- Sidebar Toggle Button -->
    <button id="sidebarToggle" class="btn btn-secondary mr-2">
        <i class="fas fa-bars"></i>
    </button>

    <a href="{{ route('agriculture.index') }}" class="btn-back">
        <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
    </a>
</div>
    <div class="container mt-5">

        <div class="center-heading text-center">
            <h1 style="font-size: 2.5rem; color: green;">Agriculture Form {{ $beneficiary->name_with_initials }}</h1>
        </div>
    </br>
        <div class="container mt-1 border rounded custom-border p-4" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);">
        <form action="{{ route('agriculture.store') }}" method="POST">
            @csrf
            <!-- Crop Category and Crop Name -->
            <!-- <div class="row mt-3">
                <div class="col">
                    <div class="dropdown">
                        <label for="categoryDropdown" class="form-label dropdown-label">Crop Category</label>
                        <select id="categoryDropdown" name="category" class="form-control" required>
                            <option value="">Select Category</option>
                            <option value="vegetables">Vegetables</option>
                            <option value="fruits">Fruits</option>
                            <option value="home_garden">Home Garden</option>
                            <option value="others">Cereals/Legumes</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <label for="cropName" class="form-label bold-label">Crop Name</label>
                    <select id="cropName" name="crop_name" class="form-control" required>
                        <option value="">Select Crop Name</option>
                    </select>
                </div>
            </div> -->
            <!-- Crop Category (Read-Only) -->
<div class="row mt-3">
    <div class="col">
        <label for="cropCategory" class="form-label bold-label">Crop Category</label>
        <input type="text" class="form-control" id="cropCategory" name="crop_category"
               value="{{ $cropCategory }}" readonly>
    </div>
</div>

<!-- Crop Name (Read-Only) -->
<div class="row mt-3">
    <div class="col">
        <label for="cropName" class="form-label bold-label">Crop Name</label>
        <input type="text" class="form-control" id="cropName" name="crop_name"
               value="{{ $cropName }}" readonly>
    </div>
</div>

            <!-- Crop Variety -->
            <div class="row mt-3">
                <div class="col">
                    <label for="cropVariety" class="form-label bold-label">Crop Variety</label>
                    <input type="text" class="form-control" id="cropVariety" name="crop_variety" >
                </div>
            </div>

            <!-- Planting Date -->
            <div class="row mt-3">
                <div class="col">
                    <label for="plantingDate" class="form-label bold-label">Planting Date</label>
                    <input type="date" class="form-control" id="plantingDate" name="planting_date">
                </div>
            </div>

            <!-- Inputs -->
            <div class="row mt-3">
                <div class="col">
                    <label for="inputs" class="form-label bold-label">Inputs</label>
                    <input type="text" class="form-control" id="inputs" name="inputs" required>
                </div>
            </div>

            <!-- Farmer Contribution and Cost -->
            <div class="row mt-3">
                <div class="col">
                    Farmer or Other Contribution
                </div>
                <div class="card-body">
                    <div id="contribution-fields">
                        <div class="row contribution-group">
                            <div class="col-5 form-group">
                                <label for="farmer_contribution[]">Farmer Contribution</label>
                                <input type="text" name="farmer_contribution[]" class="form-control" required>
                            </div>
                            <div class="col-5 form-group">
                                <label for="cost[]">Cost</label>
                                <input type="number" step="0.01" name="cost[]" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="add-contribution" class="btn btn-primary mt-3">Add More</button>
                </div>
            </div>

            <!-- Total Acres -->
            <div class="row mt-3">
                <div class="col">
                    <label for="totalAcres" class="form-label bold-label">Total Number of Acres Cultivated</label>
                    <input type="number" class="form-control" id="totalAcres" name="total_acres" step="0.01" required>
                </div>
            </div>

            <!-- Total Production, Total Income, Profit for Products -->
            <div class="row mt-3">
                <div class="col">
                    Product Details
                </div>
                <div class="card-body">
                    <div id="product-fields">
                        <div class="row product-group">
                            <div class="col-4 form-group">
                                <label for="product_name[]">Product Name</label>
                                <input type="text" name="product_name[]" class="form-control" required>
                            </div>
                            <div class="col-3 form-group">
                                <label for="total_production[]">Total Production (kg)</label>
                                <input type="number" step="0.01" name="total_production[]" class="form-control" required>
                            </div>
                            <div class="col-3 form-group">
                                <label for="total_income[]">Total Income</label>
                                <input type="number" step="0.01" name="total_income[]" class="form-control" required>
                            </div>
                            <div class="col-2 form-group">
                                <label for="profit[]">Profit</label>
                                <input type="number" step="0.01" name="profit[]" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="add-product" class="btn btn-primary mt-3">Add More Product</button>
                </div>
            </div>

            <!-- GN Division Name -->
            <input type="hidden" id="gnDivisionName" name="gn_division_name">

            <!-- Submit Button -->
            <div class="row mt-4">
                <div class="col text-center">
                    <input type="hidden" name="beneficiary_id" value="{{ $beneficiaryId ?? '' }}">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
    </div>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <!-- jQuery Script for CSRF Token in AJAX -->
    <script>
        $('#categoryDropdown').change(function () {
    var selectedCategory = $(this).val();
    var cropNameDropdown = $('#cropName');

    // Clear previous options
    cropNameDropdown.empty().append($('<option>', {
        value: '',
        text: 'Select Crop Name'
    }));

    // Make AJAX call to fetch crops based on selected category
    if (selectedCategory) {
        $.ajax({
            url: '/get-crops/' + selectedCategory,
            method: 'GET',
            success: function (data) {
                console.log(data);  // Check the response in the browser console

                data.forEach(function (crop) {
                    var cropName = '';

                    // Dynamically set the crop name based on category
                    switch (selectedCategory) {
                        case 'vegetables':
                            cropName = crop.crop_name;
                            break;
                        case 'fruits':
                            cropName = crop.fruit_name;
                            break;
                        case 'home_garden':
                            cropName = crop.homegarden_name;
                            break;
                            case 'others':
                            cropName = crop.crop_name;
                            break;

                        default:
                            cropName = crop.name;
                    }

                    // Append the crop name to the dropdown
                    cropNameDropdown.append($('<option>', {
                        value: cropName,
                        text: cropName
                    }));
                });
            },
            error: function () {
                alert('Error fetching crops');
            }
        });
    }
});


        // Function to fetch the GN Division Name
        function fetchGnDivisionName(beneficiaryId) {
            if (beneficiaryId) {
                $.ajax({
                    url: '/get-gn-division-name/' + beneficiaryId,
                    method: 'GET',
                    success: function (data) {
                        $('#gnDivisionName').val(data.gn_division_name);
                    },
                    error: function () {
                        alert('Error fetching GN Division Name');
                    }
                });
            }
        }
        $(document).ready(function () {
    var beneficiaryId = $('input[name="beneficiary_id"]').val();
    fetchGnDivisionName(beneficiaryId);  // This should run on page load
    console.log("Fetching GN division for Beneficiary ID:", beneficiaryId);
});
    </script>

    <script>
    // Add farmer contribution fields dynamically
    document.getElementById('add-contribution').addEventListener('click', function () {
         var contributionFields = document.getElementById('contribution-fields');
         var newContributionGroup = document.createElement('div');
         newContributionGroup.className = 'row contribution-group mt-3';
         newContributionGroup.innerHTML = `
             <div class="col-5 form-group">
                 <label for="farmer_contribution[]">Farmer Contribution</label>
                 <input type="text" name="farmer_contribution[]" class="form-control" required>
             </div>
             <div class="col-5 form-group">
                 <label for="cost[]">Cost</label>
                 <input type="number" step="0.01" name="cost[]" class="form-control" required>
             </div>
             <div class="col-2">
                 <button type="button" class="btn btn-danger remove-contribution-btn">Remove</button>
             </div>
         `;
         contributionFields.appendChild(newContributionGroup);
     });

    // Remove contribution fields dynamically
    $(document).on('click', '.remove-contribution-btn', function() {
        $(this).closest('.contribution-group').remove();
    });

    // Add product details dynamically
    document.getElementById('add-product').addEventListener('click', function () {
         var productFields = document.getElementById('product-fields');
         var newProductGroup = document.createElement('div');
         newProductGroup.className = 'row product-group mt-3';
         newProductGroup.innerHTML = `
             <div class="col-4 form-group">
                 <label for="product_name[]">Product Name</label>
                 <input type="text" name="product_name[]" class="form-control" required>
             </div>
             <div class="col-3 form-group">
                 <label for="total_production[]">Total Production (kg)</label>
                 <input type="number" step="0.01" name="total_production[]" class="form-control" required>
             </div>
             <div class="col-3 form-group">
                 <label for="total_income[]">Total Income</label>
                 <input type="number" step="0.01" name="total_income[]" class="form-control" required>
             </div>
             <div class="col-2 form-group">
                 <label for="profit[]">Profit</label>
                 <input type="number" step="0.01" name="profit[]" class="form-control" required>
             </div>
             <div class="col-2">
                 <button type="button" class="btn btn-danger remove-product-btn">Remove</button>
             </div>
         `;
         productFields.appendChild(newProductGroup);
     });

    // Remove product fields dynamically
    $(document).on('click', '.remove-product-btn', function() {
        $(this).closest('.product-group').remove();
    });

    $('form').on('submit', function(e) {
    e.preventDefault(); // Prevent form submission temporarily
    console.log($(this).serialize()); // Log the serialized form data
    $(this).unbind('submit').submit(); // Re-enable form submission
});

    </script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.querySelector('.left-column');
        const content = document.querySelector('.right-column');
        const toggleButton = document.getElementById('sidebarToggle');

        toggleButton.addEventListener('click', function () {
            // Toggle the 'hidden' class on the sidebar
            sidebar.classList.toggle('hidden');

            // Adjust the width of the content
            if (sidebar.classList.contains('hidden')) {
                content.style.flex = '0 0 100%'; // Expand to full width
                content.style.padding = '20px'; // Optional: Adjust padding for better visuals
            } else {
                content.style.flex = '0 0 80%'; // Default width
                content.style.padding = '20px'; // Reset padding
            }
        });
    });
</script>
</body>
</html>
