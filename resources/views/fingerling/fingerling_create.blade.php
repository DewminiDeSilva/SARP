<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Fingerling Details</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<<<<<<< HEAD
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
=======
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

>>>>>>> 3a5dafb8d91e40ec1762230fc51598d42a4abdd4
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
<<<<<<< HEAD
        .card-custom {
            background-color: #fcfcfc; /* Very light grey */
            margin-bottom: 20px;
        }
        .remove-stock-btn {
            background-color: #dc3545;
            border-color: #dc3545;
            font-size: 0.875rem;
            padding: 0.375rem 0.75rem;
        }
        .remove-stock-btn:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        #add-stock {
            background-color: #28a745; /* Green background */
            color: white; /* White text */
        }
        #add-stock:hover {
            background-color: #218838; /* Darker green when hovered */
        }
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
<div class="frame">
=======

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

>>>>>>> 3a5dafb8d91e40ec1762230fc51598d42a4abdd4
    <div class="left-column">
        @include('dashboard.dashboardC')
        @csrf
    </div>
    <div class="right-column">
<<<<<<< HEAD
        <a href="{{ route('fingerling.index') }}" class="btn-back">
            <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
        </a>
        <div class="col-md-12 text-center">
            <h2 class="header-title" style="color: green;">Fingerling Registration</h2>
        </div>
        <br>
        <div class="container mt-1 border rounded custom-border p-4" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);">
            <form class="form-horizontal" action="{{ route('fingerling.store') }}" method="POST">
                @csrf
                <input type="hidden" name="tank_id" value="{{ $tank->id }}">
                
                <div class="form-group">
                    <label for="tank_name">Tank Name</label>
                    <input type="text" name="tank_name" id="tank_name" class="form-control" value="{{ $tank->tank_name }}" readonly>
                </div>

                <div class="form-group">
                    <label for="livestock_type">Livestock Type</label>
                    <input type="text" name="livestock_type" id="livestock_type" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="stocking_type">Stocking Type</label>
                    <input type="text" name="stocking_type" id="stocking_type" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="stocking_date">Stocking Date</label>
                    <input type="date" name="stocking_date" id="stocking_date" class="form-control" required>
                </div>

               <!-- Stocking Details Section -->
<div class="card mb-4 card-custom">
    <div class="card-header bg-success text-white">
        Stocking Details
    </div>
    <div class="card-body">
        <div id="stocking-details-container">
            <!-- Initial Row (non-removable) -->
            <div class="row stock-group align-items-center">
                <div class="col-md-6 form-group">
                    <label for="stocking_details[0][variety]">Variety</label>
                    <input type="text" name="stocking_details[0][variety]" class="form-control" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="stocking_details[0][stock_number]">Stock Number</label>
                    <input type="number" name="stocking_details[0][stock_number]" class="form-control" required>
                </div>
                <div class="col-md-2 form-group d-flex align-items-center">
                    <!-- No Remove Button for Initial Row -->
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between mt-3">
            <button type="button" id="add-more-stocking" class="btn btn-success">Add More Stocking Details</button>
        </div>
    </div>
</div>





                <!-- Harvest Details -->
                <div class="card card-custom">
                    <div class="card-header bg-success text-white">
                        Harvest Details
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="harvest_date">Harvest Date</label>
                            <input type="date" name="harvest_date" id="harvest_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="variety_harvest_kg">Variety Harvest (kg)</label>
                            <input type="number" name="variety_harvest_kg" id="variety_harvest_kg" class="form-control">
                        </div>
                    </div>
                </div>

                <!-- Income Details -->
                <div class="card card-custom">
                    <div class="card-header bg-success text-white">
                        Income Details
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="amount_cumulative_kg">Cumulative Amount (kg)</label>
                            <input type="number" name="amount_cumulative_kg" id="amount_cumulative_kg" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="unit_price_rs">Unit Price (Rs.)</label>
                            <input type="number" name="unit_price_rs" id="unit_price_rs" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="total_income_rs">Total Income (Rs.)</label>
                            <input type="number" name="total_income_rs" id="total_income_rs" class="form-control">
                        </div>
                    </div>
                </div>

                <!-- Wholesale Details -->
                <div class="card card-custom">
                    <div class="card-header bg-success text-white">
                        Wholesale Details
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="wholesale_quantity_kg">Wholesale Quantity (kg)</label>
                            <input type="number" name="wholesale_quantity_kg" id="wholesale_quantity_kg" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="wholesale_unit_price_rs">Wholesale Unit Price (Rs.)</label>
                            <input type="number" name="wholesale_unit_price_rs" id="wholesale_unit_price_rs" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="wholesale_total_income_rs">Wholesale Total Income (Rs.)</label>
                            <input type="number" name="wholesale_total_income_rs" id="wholesale_total_income_rs" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success mt-3">Submit</button>
                </div>
            </form>
        </div>
=======

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
>>>>>>> 3a5dafb8d91e40ec1762230fc51598d42a4abdd4
    </div>
</div>



<script>
    $(document).ready(function () {
        let stockingIndex = 1;

        $('#add-stock').click(function () {
            const html = `
                <div class="row stock-group mt-3">
                    <div class="col-5 form-group">
                        <label for="stocking_details[${stockingIndex}][variety]">Variety</label>
                        <input type="text" class="form-control" name="stocking_details[${stockingIndex}][variety]" required>
                    </div>
                    <div class="col-5 form-group">
                        <label for="stocking_details[${stockingIndex}][stock_number]">Stock Number</label>
                        <input type="number" class="form-control" name="stocking_details[${stockingIndex}][stock_number]" required>
                    </div>
                </div>`;
            $('#stock-fields').append(html);
            stockingIndex++;
        });
    });


    $(document).ready(function () {
    let stockingIndex = 1;

    // Add more stocking details
    $('#add-more-stocking').click(function () {
        const html = `
            <div class="row stock-group align-items-center mt-3">
                <div class="col-md-6 form-group">
                    <label for="stocking_details[${stockingIndex}][variety]">Variety</label>
                    <input type="text" name="stocking_details[${stockingIndex}][variety]" class="form-control" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="stocking_details[${stockingIndex}][stock_number]">Stock Number</label>
                    <input type="number" name="stocking_details[${stockingIndex}][stock_number]" class="form-control" required>
                </div>
                <div class="col-md-2  form-group d-flex align-items-center">
                    <button type="button" class="btn btn-danger remove-stock-btn">Remove</button>
                </div>
            </div>
        `;
        $('#stocking-details-container').append(html);
        stockingIndex++;
    });

    // Remove newly added stock details
    $(document).on('click', '.remove-stock-btn', function () {
        $(this).closest('.stock-group').remove();
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
