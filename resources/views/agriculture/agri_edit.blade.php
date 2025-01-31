<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Agriculture Data</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
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

    <div class="container mt-5" style="padding-top: 70px;">
        <h2>Edit Agriculture Data</h2>

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('agriculture.update', $agricultureData->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Method spoofing for PUT request -->

            <!-- Category Field -->
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" name="category" value="{{ old('category', $agricultureData->category) }}" required>
            </div>

            <!-- Crop Name Field -->
            <div class="mb-3">
                <label for="crop_name" class="form-label">Crop Name</label>
                <input type="text" class="form-control" id="crop_name" name="crop_name" value="{{ old('crop_name', $agricultureData->crop_name) }}" required>
            </div>

            <!-- Total Acres Cultivated Field -->
            <div class="mb-3">
                <label for="total_acres" class="form-label">Total Acres Cultivated</label>
                <input type="number" class="form-control" id="total_acres" name="total_acres" value="{{ old('total_acres', $agricultureData->total_acres) }}" required>
            </div>



            <!-- Farmer Contributions and Costs -->
            <div class="mb-3">
                <label class="form-label">Farmer Contributions and Costs</label>
                <div id="farmer-contributions">
                    @foreach($agricultureData->farmerContributions as $index => $contribution)
                        <div class="row mb-3 contribution-group">
                            <div class="col-md-6">
                                <label for="farmer_contribution_{{ $index }}" class="form-label">Farmer Contribution</label>
                                <input type="text" class="form-control" name="farmer_contribution[]" id="farmer_contribution_{{ $index }}" value="{{ old('farmer_contribution.' . $index, $contribution->farmer_contribution) }}" required>
                            </div>
                            <div class="col-md-4">
                                <label for="cost_{{ $index }}" class="form-label">Cost</label>
                                <input type="number" class="form-control" name="cost[]" id="cost_{{ $index }}" value="{{ old('cost.' . $index, $contribution->cost) }}" required>
                            </div>
                            <div class="col-md-2 mt-4">
                                <button type="button" class="btn btn-danger remove-contribution">Remove</button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-primary" id="add-contribution">Add Contribution</button>
            </div>

            <!-- Product Details (Product Name, Total Production, Income, Profit) -->
            <div class="mb-3">
                <label class="form-label">Product Details</label>
                <div id="product-details">
                    @foreach($agricultureData->agriculturProducts as $index => $product)
                        <div class="row mb-3 product-group">
                            <div class="col-md-4">
                                <label for="product_name_{{ $index }}" class="form-label">Product Name</label>
                                <input type="text" class="form-control" name="product_name[]" id="product_name_{{ $index }}" value="{{ old('product_name.' . $index, $product->product_name) }}" required>
                            </div>
                            <div class="col-md-2">
                                <label for="total_production_{{ $index }}" class="form-label">Total Production (kg)</label>
                                <input type="number" class="form-control" name="total_production[]" id="total_production_{{ $index }}" value="{{ old('total_production.' . $index, $product->total_production) }}" required>
                            </div>
                            <div class="col-md-2">
                                <label for="total_income_{{ $index }}" class="form-label">Total Income</label>
                                <input type="number" class="form-control" name="total_income[]" id="total_income_{{ $index }}" value="{{ old('total_income.' . $index, $product->total_income) }}" required>
                            </div>
                            <div class="col-md-2">
                                <label for="profit_{{ $index }}" class="form-label">Profit</label>
                                <input type="number" class="form-control" name="profit[]" id="profit_{{ $index }}" value="{{ old('profit.' . $index, $product->profit) }}" required>
                            </div>
                            <div class="col-md-2 mt-4">
                                <button type="button" class="btn btn-danger remove-product">Remove</button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-primary" id="add-product">Add Product</button>
            </div>

            <!-- Crop Variety Field -->
            <div class="mb-3">
                <label for="crop_variety" class="form-label">Crop Variety</label>
                <input type="text" class="form-control" id="crop_variety" name="crop_variety" value="{{ old('crop_variety', $agricultureData->crop_variety) }}" required>
            </div>

            <!-- Planting Date Field -->
            <div class="mb-3">
                <label for="planting_date" class="form-label">Planting Date</label>
                <input type="date" class="form-control" id="planting_date" name="planting_date" value="{{ old('planting_date', $agricultureData->planting_date) }}" required>
            </div>

            <!-- Update Button -->
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('agriculture.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript for adding/removing contribution and product fields -->
    <script>
        // Add contribution field
        document.getElementById('add-contribution').addEventListener('click', function () {
            var farmerContributionsDiv = document.getElementById('farmer-contributions');
            var index = farmerContributionsDiv.querySelectorAll('.contribution-group').length;

            var newContributionGroup = document.createElement('div');
            newContributionGroup.className = 'row mb-3 contribution-group';
            newContributionGroup.innerHTML = `
                <div class="col-md-6">
                    <label for="farmer_contribution_${index}" class="form-label">Farmer Contribution</label>
                    <input type="text" class="form-control" name="farmer_contribution[]" id="farmer_contribution_${index}" required>
                </div>
                <div class="col-md-4">
                    <label for="cost_${index}" class="form-label">Cost</label>
                    <input type="number" class="form-control" name="cost[]" id="cost_${index}" required>
                </div>
                <div class="col-md-2 mt-4">
                    <button type="button" class="btn btn-danger remove-contribution">Remove</button>
                </div>
            `;

            farmerContributionsDiv.appendChild(newContributionGroup);
        });

        // Add product field
        document.getElementById('add-product').addEventListener('click', function () {
            var productDetailsDiv = document.getElementById('product-details');
            var index = productDetailsDiv.querySelectorAll('.product-group').length;

            var newProductGroup = document.createElement('div');
            newProductGroup.className = 'row mb-3 product-group';
            newProductGroup.innerHTML = `
                <div class="col-md-4">
                    <label for="product_name_${index}" class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="product_name[]" id="product_name_${index}" required>
                </div>
                <div class="col-md-2">
                    <label for="total_production_${index}" class="form-label">Total Production (kg)</label>
                    <input type="number" class="form-control" name="total_production[]" id="total_production_${index}" required>
                </div>
                <div class="col-md-2">
                    <label for="total_income_${index}" class="form-label">Total Income</label>
                    <input type="number" class="form-control" name="total_income[]" id="total_income_${index}" required>
                </div>
                <div class="col-md-2">
                    <label for="profit_${index}" class="form-label">Profit</label>
                    <input type="number" class="form-control" name="profit[]" id="profit_${index}" required>
                </div>
                <div class="col-md-2 mt-4">
                    <button type="button" class="btn btn-danger remove-product">Remove</button>
                </div>
            `;

            productDetailsDiv.appendChild(newProductGroup);
        });

        // Remove contribution or product row
        document.addEventListener('click', function (event) {
            if (event.target && event.target.classList.contains('remove-contribution')) {
                event.target.closest('.contribution-group').remove();
            } else if (event.target && event.target.classList.contains('remove-product')) {
                event.target.closest('.product-group').remove();
            }
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
