<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Agriculture Data</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('dashboard.header')

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
</body>
</html>
