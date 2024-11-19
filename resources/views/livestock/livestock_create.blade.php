<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Livestock Registration</title>
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery UI library -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- CSRF Token for AJAX -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>

        .frame {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
        }

        .left-column {
            flex: 0 0 20%;
            border-right: 1px;
        }

        .right-column {
            flex: 0 0 80%;
            padding: 20px;
        }

        /* Styling for the page */
        body {
            background-color: #f0f2f5;
            font-family: 'Roboto', sans-serif;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }
        h2, h4 {
            text-align: center;
            color: #2c3e50;
        }
        .form-section {
            background-color: #f8f9fa;
            border-radius: 6px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .btn {
            font-weight: 600;
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

    <div class="col-md-12 text-center">
    <h2 class="header-title" style="color: green;">Livestock Registration for <td style="color: black;">{{ $beneficiary->name_with_initials }}</td></h2>
    </div>

    <div class="container">
        <h2>Livestock Registration for <td>{{ $beneficiary->name_with_initials }}</td></h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('livestocks.store') }}" method="POST">
            @csrf
            <input type="hidden" name="beneficiary_id" value="{{ $beneficiary->id }}">

            <!-- Livestock Information -->
            <div class="form-section">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="livestock_type" class="form-label">Livestock Type</label>
                            <select id="livestock_type" name="livestock_type" class="form-control" required>
                                <option value="">Select Livestock Type</option>
                                <option value="Dairy">Dairy</option>
                                <option value="Poultry">Poultary</option>
                                <option value="Goat Rearing">Goat Rearing</option>
                                <option value="Aqua Culture">Aqua Culture</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="production_focus" class="form-label">Production Focus</label>
                            <select id="production_focus" name="production_focus" class="form-control" required>
                                <option value="">Select Production Focus</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Newly added Livestock Commencement Date -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="livestock_commencement_date" class="form-label">Livestock Commencement Date</label>
                            <input type="date" class="form-control" id="livestock_commencement_date" name="livestock_commencement_date" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="total_livestock_area" class="form-label">Total Livestock Area</label>
                            <input type="number" class="form-control" id="total_livestock_area" name="total_livestock_area" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="total_number_of_acres" class="form-label">Total Number of Acres</label>
                            <input type="number" class="form-control" id="total_number_of_acres" name="total_number_of_acres" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="total_cost" class="form-label">Total Cost</label>
                            <input type="number" class="form-control" id="total_cost" name="total_cost" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="inputs" class="form-label">Inputs</label>
                            <input type="text" class="form-control" id="inputs" name="inputs" required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contributions Section -->
            <div class="form-section">
                <h4>Farmer Contributions</h4>
                <div id="contributionsSection">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="contribution_type" class="form-label">Contribution Type</label>
                            <input type="text" class="form-control" name="contribution_type[]">
                        </div>
                        <div class="col-md-4">
                            <label for="cost" class="form-label">Cost</label>
                            <input type="number" class="form-control" name="cost[]">
                        </div>
                        <div class="col-md-4 mt-4">
                            <button type="button" class="btn btn-danger remove-contribution">Remove</button>
                        </div>
                    </div>
                </div>
                <button type="button" id="addContribution" class="btn btn-secondary mt-3">Add Contribution</button>
            </div>

            <!-- Products Section -->
            <div class="form-section">
                <h4>Livestock Products</h4>
                <div id="productsSection">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="product_name[]" required>
                        </div>
                        <div class="col-md-3">
                            <label for="total_production" class="form-label">Total Production</label>
                            <input type="number" class="form-control" name="total_production[]" required>
                        </div>
                        <div class="col-md-3">
                            <label for="total_income" class="form-label">Total Income</label>
                            <input type="number" class="form-control" name="total_income[]" required>
                        </div>
                        <div class="col-md-3">
                            <label for="profit" class="form-label">Profit</label>
                            <input type="number" class="form-control" name="profit[]" required>
                        </div>
                    </div>
                </div>
                <button type="button" id="addProduct" class="btn btn-secondary mt-3">Add Product</button>
            </div>

            <!-- Submit Button -->
            <div class="row">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            // CSRF Setup for AJAX
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Fetch GN Division Name on page load
            var beneficiaryId = $('input[name="beneficiary_id"]').val();
            if (beneficiaryId) {
                fetchGnDivisionName(beneficiaryId);
            }

            function fetchGnDivisionName(beneficiaryId) {
                $.get('/get-gn-division-name/' + beneficiaryId, function (data) {
                    // Process GN Division Name
                }).fail(function () {
                    alert('Error fetching GN Division Name');
                });
            }

            // Handle livestock type change
$('#livestock_type').change(function() {
    var selectedType = $(this).val();
    var productionFocusDropdown = $('#production_focus');

    // Clear existing options
    productionFocusDropdown.empty().append(`
        <option value="">Select Production Focus</option>
    `);

    if (selectedType) {
        // Make AJAX call to get production focus options
        $.ajax({
            url: `/livestocks/get-production-focus/${selectedType}`, // Updated URL pattern
            type: 'GET',
            success: function(response) {
                // Add new options based on response
                response.forEach(function(item) {
                    let optionText = item.name; // Assuming 'name' is the common field in all models
                    productionFocusDropdown.append(`
                        <option value="${item.id}">${optionText}</option>
                    `);
                });
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                alert('Error loading production focus options. Please try again.');
            }
        });
    }
});


            // Add Contribution
            $('#addContribution').click(function () {
                var newContribution = `
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <label for="contribution_type" class="form-label">Contribution Type</label>
                            <input type="text" class="form-control" name="contribution_type[]">
                        </div>
                        <div class="col-md-4">
                            <label for="cost" class="form-label">Cost</label>
                            <input type="number" class="form-control" name="cost[]">
                        </div>
                        <div class="col-md-4 mt-4">
                            <button type="button" class="btn btn-danger remove-contribution">Remove</button>
                        </div>
                    </div>`;
                $('#contributionsSection').append(newContribution);
            });

            // Add Product
            $('#addProduct').click(function () {
                var newProduct = `
                    <div class="row mt-2">
                        <div class="col-md-3">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="product_name[]" required>
                        </div>
                        <div class="col-md-3">
                            <label for="total_production" class="form-label">Total Production</label>
                            <input type="number" class="form-control" name="total_production[]" required>
                        </div>
                        <div class="col-md-3">
                            <label for="total_income" class="form-label">Total Income</label>
                            <input type="number" class="form-control" name="total_income[]" required>
                        </div>
                        <div class="col-md-3">
                            <label for="profit" class="form-label">Profit</label>
                            <input type="number" class="form-control" name="profit[]" required>
                        </div>
                        <div class="col-md-12 mt-2">
                            <button type="button" class="btn btn-danger remove-product">Remove</button>
                        </div>
                    </div>`;
                $('#productsSection').append(newProduct);
            });

            // Remove Contribution
            $(document).on('click', '.remove-contribution', function () {
                $(this).closest('.row').remove();
            });

            // Remove Product
            $(document).on('click', '.remove-product', function () {
                $(this).closest('.row').remove();
            });


        });
    </script>
</body>
</html>
