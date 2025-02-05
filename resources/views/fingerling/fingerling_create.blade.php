<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Fingerling Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

            <a href="{{ route('fingerling.index') }}" class="btn-back">
                <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
            </a>

        </div>
        <h2 class="text-center text-success">Add Fingerling Data</h2>
        <form action="{{ route('fingerling.store') }}" method="POST">
            @csrf

            <!-- Tank ID (Hidden) -->
            <input type="hidden" name="tank_id" value="{{ $tank->id }}">

            <!-- Tank Name (Read-only) -->
            <div class="form-group">
                <label for="tank_name">Tank Name:</label>
                <input type="text" class="form-control" id="tank_name" name="tank_name" value="{{ $tank->tank_name }}" readonly>
            </div>

            <!-- Livestock Type -->
            <div class="form-group">
                <label for="livestock_type">Livestock Type:</label>
                <input type="text" class="form-control" id="livestock_type" name="livestock_type" required>
            </div>

            <!-- Stocking Type -->
            <div class="form-group">
                <label for="stocking_type">Stocking Type:</label>
                <input type="text" class="form-control" id="stocking_type" name="stocking_type" required>
            </div>

            <!-- Stocking Date -->
            <div class="form-group">
                <label for="stocking_date">Stocking Date:</label>
                <input type="date" class="form-control" id="stocking_date" name="stocking_date" required>
            </div>

            <!-- Dynamic Stocking Details -->
            <h5>Stocking Details</h5>
            <div id="stocking-details-container">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="stocking_details[0][variety]">Variety:</label>
                        <input type="text" class="form-control" name="stocking_details[0][variety]" required>
                    </div>
                    <div class="col-md-6">
                        <label for="stocking_details[0][stock_number]">Stock Number:</label>
                        <input type="number" class="form-control" name="stocking_details[0][stock_number]" required>
                    </div>
                </div>
            </div>
            <button type="button" id="add-more-stocking" class="btn btn-success btn-sm mb-3">Add More Stocking Details</button>

            <!-- Harvest Details -->
            <h5>Harvest Details</h5>
            <div class="form-group">
                <label for="harvest_date">Harvest Date:</label>
                <input type="date" class="form-control" name="harvest_date">
            </div>
            <div class="form-group">
                <label for="variety_harvest_kg">Variety Harvest (kg):</label>
                <input type="number" class="form-control" name="variety_harvest_kg" step="0.01">
            </div>

            <!-- Income Details -->
            <h5>Income Details</h5>
            <div class="form-group">
                <label for="amount_cumulative_kg">Amount Cumulative (kg):</label>
                <input type="number" class="form-control" name="amount_cumulative_kg" step="0.01">
            </div>
            <div class="form-group">
                <label for="unit_price_rs">Unit Price (Rs.):</label>
                <input type="number" class="form-control" name="unit_price_rs" step="0.01">
            </div>
            <div class="form-group">
                <label for="total_income_rs">Total Income (Rs.):</label>
                <input type="number" class="form-control" name="total_income_rs" step="0.01">
            </div>

            <!-- Whole Sale -->
            <h5>Whole Sale</h5>
            <div class="form-group">
                <label for="wholesale_quantity_kg">Quantity (kg):</label>
                <input type="number" class="form-control" name="wholesale_quantity_kg" step="0.01">
            </div>
            <div class="form-group">
                <label for="wholesale_unit_price_rs">Unit Price (Rs.):</label>
                <input type="number" class="form-control" name="wholesale_unit_price_rs" step="0.01">
            </div>
            <div class="form-group">
                <label for="wholesale_total_income_rs">Total Income (Rs.):</label>
                <input type="number" class="form-control" name="wholesale_total_income_rs" step="0.01">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>



<script>
    $(document).ready(function () {
        let stockingIndex = 1;

        // Add more stocking details
        $('#add-more-stocking').click(function () {
            const html = `
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="stocking_details[${stockingIndex}][variety]">Variety:</label>
                        <input type="text" class="form-control" name="stocking_details[${stockingIndex}][variety]" required>
                    </div>
                    <div class="col-md-6">
                        <label for="stocking_details[${stockingIndex}][stock_number]">Stock Number:</label>
                        <input type="number" class="form-control" name="stocking_details[${stockingIndex}][stock_number]" required>
                    </div>
                </div>
            `;
            $('#stocking-details-container').append(html);
            stockingIndex++;
        });
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
