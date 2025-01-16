<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Fingerling Details</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
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
    <div class="left-column">
        @include('dashboard.dashboardC')
        @csrf
    </div>
    <div class="right-column">
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
</body>
</html>
