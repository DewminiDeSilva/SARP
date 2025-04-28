<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Fingerling Details</title>
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
        #add-more-stocking {
    background-color: #198754 !important;
    border-color: #198754 !important;
    color: #fff !important;
}

#add-more-stocking:hover {
    background-color: #0f6c3c !important;
    border-color: #0f6c3c !important;
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
            <h2 class="header-title" style="color: green;">Edit Fingerling Details</h2>
        </div>
        <br>
        <div class="container mt-1 border rounded custom-border p-4" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);">
            <form action="{{ route('fingerling.update', $fingerling->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Tank Name -->
                <div class="form-group mb-5">
                    <label for="tank_name">Tank Name</label>
                    <input type="text" class="form-control" id="tank_name" value="{{ $fingerling->tank->tank_name ?? 'N/A' }}" readonly>
                </div>

                <!-- Stocking Details -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">Stocking Details</div>
            <div class="card-body" id="stocking-details-container">
                @php $stockingDetails = json_decode($fingerling->stocking_details, true) ?? []; @endphp
                @foreach ($stockingDetails as $index => $detail)
                    <div class="row stock-group align-items-center mb-2">
                        <div class="col-md-4">
                            <input type="date" name="stocking_details[{{ $index }}][stocking_date]" class="form-control" value="{{ $detail['stocking_date'] ?? '' }}" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="stocking_details[{{ $index }}][variety]" class="form-control" value="{{ $detail['variety'] ?? '' }}" required>
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="stocking_details[{{ $index }}][stock_number]" class="form-control" value="{{ $detail['stock_number'] ?? '' }}" required>
                        </div>
                        @if ($index > 0)
                        <div class="col-md-1">
                            <button type="button" class="btn btn-danger remove-stock-btn">X</button>
                        </div>
                        @endif
                    </div>
                @endforeach
                <div id="add-more-stocking-container">
                    <button type="button" id="add-more-stocking" class="btn btn-success mt-2">Add More Stocking</button>
                </div>
            </div>
        </div>

                <!-- Harvest Details -->
        <div class="card mb-5">
            <div class="card-header bg-success text-white">Harvest Details</div>
            <div class="card-body" id="harvest-details-container">
                @php $harvestDetails = json_decode($fingerling->harvest_details, true) ?? []; @endphp
                @foreach ($harvestDetails as $index => $detail)
                    <div class="row harvest-group align-items-center mb-2">
                        <div class="col-md-4">
                            <input type="date" name="harvest_details[{{ $index }}][harvest_date]" class="form-control" value="{{ $detail['harvest_date'] ?? '' }}" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="harvest_details[{{ $index }}][variety]" class="form-control" value="{{ $detail['variety'] ?? '' }}" required>
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="harvest_details[{{ $index }}][variety_harvest_kg]" class="form-control" value="{{ $detail['variety_harvest_kg'] ?? '' }}" required>
                        </div>
                        @if ($index > 0)
                        <div class="col-md-1">
                            <button type="button" class="btn btn-danger remove-harvest-btn">X</button>
                        </div>
                        @endif
                    </div>
                @endforeach
                <div id="add-more-harvest-container">
                    <button type="button" id="add-more-harvest" class="btn btn-success mt-2">Add More Harvest</button>
            </div> 
            </div>
             
        </div>


<div class="form-group">
    <label>Cumulative Amount (kg)</label>
    <input type="number" name="amount_cumulative_kg" id="amount_cumulative_kg" class="form-control" value="{{ $fingerling->amount_cumulative_kg }}" readonly>
</div>

<div class="form-group">
    <label for="community_distribution_kg">Community Distribution (kg)</label>
    <input type="number" class="form-control" id="community_distribution_kg" name="community_distribution_kg" value="{{ $fingerling->community_distribution_kg }}">
</div>

<div class="form-group">
    <label for="total_income_rs">Total Income (Rs.)</label>
    <input type="number" class="form-control" id="total_income_rs" name="total_income_rs" value="{{ $fingerling->total_income_rs }}">
</div>

<div class="form-group">
    <label for="wholesale_quantity_kg">Wholesale Quantity (kg)</label>
    <input type="number" class="form-control" id="wholesale_quantity_kg" name="wholesale_quantity_kg" value="{{ $fingerling->wholesale_quantity_kg }}">
</div>

<div class="form-group">
    <label for="no_of_families_benefited">No. of Families Benefited</label>
    <input type="number" class="form-control" id="no_of_families_benefited" name="no_of_families_benefited" value="{{ $fingerling->no_of_families_benefited }}">
</div>



                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success mt-3">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        let stockingIndex = {{ count($stockingDetails ?? []) }};
        let harvestIndex = {{ count($harvestDetails ?? []) }};

        function updateCumulativeAmount() {
            let total = 0;
            $('input[name*="[variety_harvest_kg]"]').each(function () {
                const val = parseFloat($(this).val());
                if (!isNaN(val)) total += val;
            });
            $('#amount_cumulative_kg').val(total.toFixed(2));
        }

        // Add more stocking
        $('#add-more-stocking').click(function () {
            const html = `
                <div class="row stock-group align-items-center mb-2">
                    <div class="col-md-4"><input type="date" name="stocking_details[${stockingIndex}][stocking_date]" class="form-control" required></div>
                    <div class="col-md-4"><input type="text" name="stocking_details[${stockingIndex}][variety]" class="form-control" required></div>
                    <div class="col-md-3"><input type="number" name="stocking_details[${stockingIndex}][stock_number]" class="form-control" required></div>
                    <div class="col-md-1 d-flex align-items-center"><button type="button" class="btn btn-danger remove-stock-btn">X</button></div>
                </div>`;
            $(html).insertBefore('#add-more-stocking-container');
            stockingIndex++;
        });

        // Add more harvest
        $('#add-more-harvest').click(function () {
            const html = `
                <div class="row harvest-group align-items-center mb-2">
                    <div class="col-md-4"><input type="date" name="harvest_details[${harvestIndex}][harvest_date]" class="form-control" required></div>
                    <div class="col-md-4"><input type="text" name="harvest_details[${harvestIndex}][variety]" class="form-control" required></div>
                    <div class="col-md-3"><input type="number" name="harvest_details[${harvestIndex}][variety_harvest_kg]" class="form-control harvest-kg" required></div>
                    <div class="col-md-1 d-flex align-items-center"><button type="button" class="btn btn-danger remove-harvest-btn">X</button></div>
                </div>`;
            $(html).insertBefore('#add-more-harvest-container');
            harvestIndex++;
            setTimeout(updateCumulativeAmount, 100);
        });

        // Remove stocking row
        $(document).on('click', '.remove-stock-btn', function () {
            $(this).closest('.stock-group').remove();
        });

        // Remove harvest row and recalculate
        $(document).on('click', '.remove-harvest-btn', function () {
            $(this).closest('.harvest-group').remove();
            updateCumulativeAmount();
        });

        // Recalculate on variety harvest input change
        $(document).on('input', '.harvest-kg, input[name*="[variety_harvest_kg]"]', updateCumulativeAmount);

        // Initial calculation
        updateCumulativeAmount();
    });
</script>


</body>
</html>
