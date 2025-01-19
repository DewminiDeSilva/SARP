<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Fingerling Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
@include('dashboard.header')
<div class="container mt-5" style="padding-top: 70px;">
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
</body>
</html>
