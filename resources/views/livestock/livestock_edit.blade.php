<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Livestock Data</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@include('dashboard.header')
    <div class="container mt-5" style="padding-top: 70px;">
        <h2>Edit Livestock Data</h2>

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

        <form action="{{ route('livestocks.update', ['beneficiary_id' => $beneficiary_id, 'livestock' => $livestock->id]) }}" method="POST">

            @csrf
            @method('PUT')


            <!-- Livestock Type Field -->
            <div class="mb-3">
                <label for="livestock_type" class="form-label">Livestock Type</label>
                <select id="livestock_type" name="livestock_type" class="form-control" required>
                    <option value="cattle" {{ $livestock->livestock_type == 'cattle' ? 'selected' : '' }}>Cattle</option>
                    <option value="poultry" {{ $livestock->livestock_type == 'poultry' ? 'selected' : '' }}>Poultry</option>
                    <option value="goats" {{ $livestock->livestock_type == 'goats' ? 'selected' : '' }}>Goats</option>
                    <option value="sheep" {{ $livestock->livestock_type == 'sheep' ? 'selected' : '' }}>Sheep</option>
                </select>
            </div>

            <!-- Production Focus Field -->
            <div class="mb-3">
                <label for="production_focus" class="form-label">Production Focus</label>
                <select id="production_focus" name="production_focus" class="form-control" required>
                    <option value="milk" {{ $livestock->production_focus == 'milk' ? 'selected' : '' }}>Milk Production</option>
                    <option value="meat" {{ $livestock->production_focus == 'meat' ? 'selected' : '' }}>Meat Production</option>
                    <option value="eggs" {{ $livestock->production_focus == 'eggs' ? 'selected' : '' }}>Egg Production</option>
                    <option value="wool" {{ $livestock->production_focus == 'wool' ? 'selected' : '' }}>Wool Production</option>
                </select>
            </div>

            <!-- Livestock Commencement Date Field -->
            <div class="mb-3">
                <label for="livestock_commencement_date" class="form-label">Livestock Commencement Date</label>
                <input type="date" class="form-control" id="livestock_commencement_date" name="livestock_commencement_date" value="{{ old('livestock_commencement_date', $livestock->livestock_commencement_date) }}" required>
            </div>

            <!-- Total Livestock Area Field -->
            <div class="mb-3">
                <label for="total_livestock_area" class="form-label">Total Livestock Area</label>
                <input type="number" class="form-control" id="total_livestock_area" name="total_livestock_area" value="{{ old('total_livestock_area', $livestock->total_livestock_area) }}" required>
            </div>

            <!-- Total Number of Acres Field -->
            <div class="mb-3">
                <label for="total_number_of_acres" class="form-label">Total Number of Acres</label>
                <input type="number" class="form-control" id="total_number_of_acres" name="total_number_of_acres" value="{{ old('total_number_of_acres', $livestock->total_number_of_acres) }}" required>
            </div>

            <!-- Total Cost Field -->
            <div class="mb-3">
                <label for="total_cost" class="form-label">Total Cost</label>
                <input type="number" class="form-control" id="total_cost" name="total_cost" value="{{ old('total_cost', $livestock->total_cost) }}" required>
            </div>

            <!-- Inputs Field -->
            <div class="mb-3">
                <label for="inputs" class="form-label">Inputs</label>
                <input type="text" class="form-control" id="inputs" name="inputs" value="{{ old('inputs', $livestock->inputs) }}" required>
            </div>

            <!-- Farmer Contributions and Costs -->
            <div class="mb-3">
                <label class="form-label">Farmer Contributions and Costs</label>
                <div id="contributionsSection">
                    @foreach($livestock->liveContributions as $index => $contribution)
                        <div class="row mb-3 contribution-group">
                            <div class="col-md-6">
                                <label for="contribution_type_{{ $index }}" class="form-label">Contribution Type</label>
                                <input type="text" class="form-control" name="contribution_type[]" id="contribution_type_{{ $index }}" value="{{ old('contribution_type.' . $index, $contribution->contribution_type) }}" required>
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

            <!-- Product Details -->
            <div class="mb-3">
                <label class="form-label">Product Details</label>
                <div id="productsSection">
                    @foreach($livestock->liveProducts as $index => $product)
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

            <!-- Update Button -->
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('livestocks.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript for adding/removing contribution and product fields -->
    <script>
        // Add contribution field
        document.getElementById('add-contribution').addEventListener('click', function () {
            var contributionsDiv = document.getElementById('contributionsSection');
            var index = contributionsDiv.querySelectorAll('.contribution-group').length;

            var newContributionGroup = document.createElement('div');
            newContributionGroup.className = 'row mb-3 contribution-group';
            newContributionGroup.innerHTML = `
                <div class="col-md-6">
                    <label for="contribution_type_${index}" class="form-label">Contribution Type</label>
                    <input type="text" class="form-control" name="contribution_type[]" id="contribution_type_${index}" required>
                </div>
                <div class="col-md-4">
                    <label for="cost_${index}" class="form-label">Cost</label>
                    <input type="number" class="form-control" name="cost[]" id="cost_${index}" required>
                </div>
                <div class="col-md-2 mt-4">
                    <button type="button" class="btn btn-danger remove-contribution">Remove</button>
                </div>
            `;
            contributionsDiv.appendChild(newContributionGroup);
        });

        // Add product field
        document.getElementById('add-product').addEventListener('click', function () {
            var productsDiv = document.getElementById('productsSection');
            var index = productsDiv.querySelectorAll('.product-group').length;

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
            productsDiv.appendChild(newProductGroup);
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
