<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Fingerling Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center text-success">
        Fingerling Data for Tank: {{ $fingerling->tank->tank_name ?? 'Tank Name Not Available' }}
    </h2>

    <!-- Livestock Type -->
    <div class="form-group">
        <label><strong>Livestock Type:</strong></label>
        <p>{{ $fingerling->livestock_type }}</p>
    </div>

    <!-- Stocking Type and Date -->
    <div class="form-group">
        <label><strong>Stocking Type:</strong></label>
        <p>{{ $fingerling->stocking_type }}</p>
    </div>
    <div class="form-group">
        <label><strong>Stocking Date:</strong></label>
        <p>{{ $fingerling->stocking_date }}</p>
    </div>

    <!-- Stocking Details -->
    <h5 class="mt-4">Stocking Details</h5>
    @php
        $stockingDetails = json_decode($fingerling->stocking_details, true);
    @endphp
    @if ($stockingDetails && count($stockingDetails) > 0)
        @foreach ($stockingDetails as $index => $detail)
            <div class="form-group">
                <label><strong>Stocking Detail #{{ $index + 1 }}</strong></label>
                <p><strong>Variety:</strong> {{ $detail['variety'] ?? 'N/A' }}</p>
                <p><strong>Stock Number:</strong> {{ $detail['stock_number'] ?? 'N/A' }}</p>
            </div>
        @endforeach
    @else
        <p>No stocking details available.</p>
    @endif

    <!-- Harvest Details -->
    <h5 class="mt-4">Harvest Details</h5>
    <div class="form-group">
        <label><strong>Harvest Date:</strong></label>
        <p>{{ $fingerling->harvest_date ?? 'N/A' }}</p>
    </div>
    <div class="form-group">
        <label><strong>Variety Harvest (kg):</strong></label>
        <p>{{ $fingerling->variety_harvest_kg ?? 'N/A' }}</p>
    </div>

    <!-- Income Details -->
    <h5 class="mt-4">Income Details</h5>
    <div class="form-group">
        <label><strong>Amount Cumulative (kg):</strong></label>
        <p>{{ $fingerling->amount_cumulative_kg ?? 'N/A' }}</p>
    </div>
    <div class="form-group">
        <label><strong>Unit Price (Rs.):</strong></label>
        <p>{{ $fingerling->unit_price_rs ?? 'N/A' }}</p>
    </div>
    <div class="form-group">
        <label><strong>Total Income (Rs.):</strong></label>
        <p>{{ $fingerling->total_income_rs ?? 'N/A' }}</p>
    </div>

    <!-- Whole Sale Details -->
    <h5 class="mt-4">Whole Sale</h5>
    <div class="form-group">
        <label><strong>Quantity (kg):</strong></label>
        <p>{{ $fingerling->wholesale_quantity_kg ?? 'N/A' }}</p>
    </div>
    <div class="form-group">
        <label><strong>Unit Price (Rs.):</strong></label>
        <p>{{ $fingerling->wholesale_unit_price_rs ?? 'N/A' }}</p>
    </div>
    <div class="form-group">
        <label><strong>Total Income (Rs.):</strong></label>
        <p>{{ $fingerling->wholesale_total_income_rs ?? 'N/A' }}</p>
    </div>

    <!-- Back Button -->
    <a href="{{ route('fingerling.index') }}" class="btn btn-secondary">Back</a>
</div>
</body>
</html>
