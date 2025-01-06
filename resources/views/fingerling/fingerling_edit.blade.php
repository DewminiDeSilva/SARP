<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Fingerling Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center text-success">Edit Fingerling Details</h2>
    <form action="{{ route('fingerling.update', $fingerling->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Tank Name (Read-only) -->
        <div class="form-group">
            <label for="tank_name">Tank Name:</label>
            <input type="text" class="form-control" id="tank_name" value="{{ $fingerling->tank->tank_name ?? 'N/A' }}" readonly>
        </div>

        <!-- Livestock Type -->
        <div class="form-group">
            <label for="livestock_type">Livestock Type:</label>
            <input type="text" class="form-control" id="livestock_type" name="livestock_type" value="{{ $fingerling->livestock_type }}" required>
        </div>

        <!-- Stocking Type -->
        <div class="form-group">
            <label for="stocking_type">Stocking Type:</label>
            <input type="text" class="form-control" id="stocking_type" name="stocking_type" value="{{ $fingerling->stocking_type }}" required>
        </div>

        <!-- Stocking Date -->
        <div class="form-group">
            <label for="stocking_date">Stocking Date:</label>
            <input type="date" class="form-control" id="stocking_date" name="stocking_date" value="{{ $fingerling->stocking_date }}" required>
        </div>

        <!-- Dynamic Stocking Details -->
        <h5>Stocking Details</h5>
        <div id="stocking-details-container">
            @php
                $stockingDetails = json_decode($fingerling->stocking_details, true) ?? [];
            @endphp
            @foreach ($stockingDetails as $index => $detail)
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="stocking_details[{{ $index }}][variety]">Variety:</label>
                        <input type="text" class="form-control" name="stocking_details[{{ $index }}][variety]" value="{{ $detail['variety'] ?? '' }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="stocking_details[{{ $index }}][stock_number]">Stock Number:</label>
                        <input type="number" class="form-control" name="stocking_details[{{ $index }}][stock_number]" value="{{ $detail['stock_number'] ?? '' }}" required>
                    </div>
                </div>
            @endforeach
        </div>
        <button type="button" id="add-more-stocking" class="btn btn-success btn-sm mb-3">Add More Stocking Details</button>

        <!-- Harvest Date -->
        <div class="form-group">
            <label for="harvest_date">Harvest Date:</label>
            <input type="date" class="form-control" id="harvest_date" name="harvest_date" value="{{ $fingerling->harvest_date }}">
        </div>

        <!-- Variety Harvest (kg) -->
        <div class="form-group">
            <label for="variety_harvest_kg">Variety Harvest (kg):</label>
            <input type="number" class="form-control" id="variety_harvest_kg" name="variety_harvest_kg" value="{{ $fingerling->variety_harvest_kg }}" step="0.01">
        </div>

        <!-- Cumulative Amount (kg) -->
        <div class="form-group">
            <label for="amount_cumulative_kg">Cumulative Amount (kg):</label>
            <input type="number" class="form-control" id="amount_cumulative_kg" name="amount_cumulative_kg" value="{{ $fingerling->amount_cumulative_kg }}" step="0.01">
        </div>

        <!-- Unit Price (Rs) -->
        <div class="form-group">
            <label for="unit_price_rs">Unit Price (Rs):</label>
            <input type="number" class="form-control" id="unit_price_rs" name="unit_price_rs" value="{{ $fingerling->unit_price_rs }}" step="0.01">
        </div>

        <!-- Total Income (Rs) -->
        <div class="form-group">
            <label for="total_income_rs">Total Income (Rs):</label>
            <input type="number" class="form-control" id="total_income_rs" name="total_income_rs" value="{{ $fingerling->total_income_rs }}" step="0.01">
        </div>

        <!-- Wholesale Quantity (kg) -->
        <div class="form-group">
            <label for="wholesale_quantity_kg">Wholesale Quantity (kg):</label>
            <input type="number" class="form-control" id="wholesale_quantity_kg" name="wholesale_quantity_kg" value="{{ $fingerling->wholesale_quantity_kg }}" step="0.01">
        </div>

        <!-- Wholesale Unit Price (Rs) -->
        <div class="form-group">
            <label for="wholesale_unit_price_rs">Wholesale Unit Price (Rs):</label>
            <input type="number" class="form-control" id="wholesale_unit_price_rs" name="wholesale_unit_price_rs" value="{{ $fingerling->wholesale_unit_price_rs }}" step="0.01">
        </div>

        <!-- Wholesale Total Income (Rs) -->
        <div class="form-group">
            <label for="wholesale_total_income_rs">Wholesale Total Income (Rs):</label>
            <input type="number" class="form-control" id="wholesale_total_income_rs" name="wholesale_total_income_rs" value="{{ $fingerling->wholesale_total_income_rs }}" step="0.01">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<script>
    $(document).ready(function () {
        let stockingIndex = {{ count($stockingDetails) }};

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
