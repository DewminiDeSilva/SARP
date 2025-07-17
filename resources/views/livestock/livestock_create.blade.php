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
        /* Layout Styling */
body {
    background-color: #f0f2f5;
    font-family: 'Roboto', sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 0 25px rgba(0, 0, 0, 0.08);
    padding: 40px 30px;
    margin-top: 50px;
}

/* Page Headers */
h1, h2, h4 {
    text-align: center;
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 20px;
}

/* Section Box Styling */
.form-section {
    background-color: #f9f9f9;
    border-left: 6px solid #198754; /* Bootstrap green */
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 25px;
}

/* Frame Layout */
.frame {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    width: 100%;
}

.left-column {
    flex: 0 0 20%;
    border-right: 1px solid #dee2e6;
    padding: 15px;
    background-color: #ffffff;
}

.right-column {
    flex: 0 0 80%;
    padding: 25px 40px;
    background-color: #ffffff;
}

/* Labels and Inputs */
label.form-label {
    font-weight: 600;
    color: #34495e;
    margin-bottom: 6px;
}

input.form-control, select.form-control {
    border-radius: 4px;
    padding: 8px 10px;
    border: 1px solid #ced4da;
    box-shadow: none;
    transition: border-color 0.3s;
}

input.form-control:focus, select.form-control:focus {
    border-color: #198754;
    outline: none;
    box-shadow: 0 0 0 0.15rem rgba(25, 135, 84, 0.25);
}

/* Button Styles */
button.btn {
    font-weight: 600;
    padding: 8px 18px;
    border-radius: 5px;
}

button.btn-primary {
    background-color: #198754;
    border: none;
}

button.btn-primary:hover {
    background-color: #157347;
}

button.btn-secondary {
    background-color: #0d6efd;
    color: white;
    border: none;
}

button.btn-secondary:hover {
    background-color: #0b5ed7;
}

button.btn-danger {
    background-color: #dc3545;
    border: none;
}

button.btn-danger:hover {
    background-color: #bb2d3b;
}

/* Error Messages */
.alert-danger {
    background-color: #f8d7da;
    color: #842029;
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
}

/* Utility */
.mt-2 { margin-top: 0.5rem !important; }
.mt-3 { margin-top: 1rem !important; }
.mt-4 { margin-top: 1.5rem !important; }
.mb-3 { margin-bottom: 1rem !important; }
.mb-4 { margin-bottom: 1.5rem !important; }
.text-center { text-align: center !important; }

/* Layout Styling */
body {
    background-color: #f0f2f5;
    font-family: 'Roboto', sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 0 25px rgba(0, 0, 0, 0.08);
    padding: 40px 30px;
    margin-top: 50px;
}

/* Page Headers */
h1, h2, h4 {
    text-align: center;
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 20px;
}

/* Section Box Styling */
.form-section {
    background-color: #f9f9f9;
    border-left: 6px solid #fffcfc; /* Bootstrap green */
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 25px;
}
.sub-form-box {
    border: 1px dashed #ccc;
    background-color: #ffffff;
    padding: 15px 20px;
    border-radius: 6px;
    margin-bottom: 15px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.05);
}


/* Frame Layout */
.frame {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    width: 100%;
}

.left-column {
    flex: 0 0 20%;
    border-right: 1px solid #dee2e6;
    padding: 15px;
    background-color: #ffffff;
}

.right-column {
    flex: 0 0 80%;
    padding: 25px 40px;
    background-color: #ffffff;
}

/* Labels and Inputs */
label.form-label {
    font-weight: 600;
    color: #34495e;
    margin-bottom: 6px;
}

input.form-control, select.form-control {
    border-radius: 4px;
    padding: 8px 10px;
    border: 1px solid #ced4da;
    box-shadow: none;
    transition: border-color 0.3s;
}

input.form-control:focus, select.form-control:focus {
    border-color: #080a09;
    outline: none;
    box-shadow: 0 0 0 0.15rem rgba(25, 135, 84, 0.25);
}

/* Button Styles */
button.btn {
    font-weight: 600;
    padding: 8px 18px;
    border-radius: 5px;
}

button.btn-primary {
    background-color: #198754;
    border: none;
}

button.btn-primary:hover {
    background-color: #157347;
}

button.btn-secondary {
    background-color: #2d8b32;
    color: white;
    border: none;
}

button.btn-secondary:hover {
    background-color: #0e8c51;
}

button.btn-danger {
    background-color: #dc3545;
    border: none;
}

button.btn-danger:hover {
    background-color: #bb2d3b;
}

/* Error Messages */
.alert-danger {
    background-color: #f8d7da;
    color: #842029;
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
}

/* Utility */
.mt-2 { margin-top: 0.5rem !important; }
.mt-3 { margin-top: 1rem !important; }
.mt-4 { margin-top: 1.5rem !important; }
.mb-3 { margin-bottom: 1rem !important; }
.mb-4 { margin-bottom: 1.5rem !important; }
.text-center { text-align: center !important; }


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

    <div class="col-md-12 text-center">
        <h1 class="custom-border">Livestock Registration Form</h1>
    <h2 class="header-title" style="color: green;">Cultivation data of  <td style="color: black;">{{ $beneficiary->name_with_initials }}</td></h2>
    </div>

    <div class="container">
        <!-- <h2>Livestock Registration for <td>{{ $beneficiary->name_with_initials }}</td></h2> -->

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
                    <div class="col-md-4">
                        <!-- Livestock Type -->
                        <div class="mb-3">
                            <label for="livestock_type" class="form-label">Livestock Type</label>
                            <select id="livestock_type" name="livestock_type" class="form-control" disabled>
                                <option value="">Select Livestock Type</option>
                                <option value="Dairy" {{ $livestockType == 'Dairy' ? 'selected' : '' }}>Dairy</option>
                                <option value="Poultry" {{ $livestockType == 'Poultry' ? 'selected' : '' }}>Poultry</option>
                                <option value="Goat Rearing" {{ $livestockType == 'Goat Rearing' ? 'selected' : '' }}>Goat Rearing</option>
                                <option value="Aqua Culture" {{ $livestockType == 'Aqua Culture' ? 'selected' : '' }}>Aqua Culture</option>
                            </select>
                            <!-- Add a hidden field to store the livestock type value for submission -->
                            <input type="hidden" name="livestock_type" value="{{ $livestockType }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Production Focus -->
                        <div class="mb-3">
                            <label for="production_focus" class="form-label">Production Focus</label>
                            <input type="text" class="form-control" id="production_focus" name="production_focus"
                                   value="{{ $productionFocus }}" readonly>
                        </div>
                    </div>

                

                <!-- Newly added Livestock Commencement Date -->
                
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="livestock_commencement_date" class="form-label">Livestock Commencement Date</label>
                            <input type="date" class="form-control" id="livestock_commencement_date" name="livestock_commencement_date" >
                        </div>
                    </div>
                 </div>

                <div class="row">
    <div class="col-md-4">
        <div class="mb-3">
            <label for="number_of_livestocks" class="form-label">Number of Livestocks</label>
            <input type="number" class="form-control" id="number_of_livestocks" name="number_of_livestocks" step="0.01" min="0" >
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="area_of_cade" class="form-label">Area of the Cade</label>
            <input type="number" class="form-control" id="area_of_cade" name="area_of_cade" step="0.01" min="0" >
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="livestock_value" class="form-label">Livestock Value</label>
           <input type="number" class="form-control" id="livestock_value" name="livestock_value" step="0.01" min="0" >

        </div>
    </div>
</div>



           <!-- Farmer Contributions Section -->
<div class="sub-form-box">
    <h4>Farmer Contributions</h4>
    <div id="contributionsSection">
        <div class="row mt-2">
            <div class="col-md-3">
                <label class="form-label">Date</label>
                <input type="date" class="form-control" name="farmer_date[]">
            </div>
            <div class="col-md-5">
                <label class="form-label">Description of Farmer Contribution</label>
                <input type="text" class="form-control" name="farmer_description[]">
            </div>
            <div class="col-md-3">
                <label class="form-label">Value</label>
                <input type="number" class="form-control" name="farmer_value[]">
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="button" class="btn btn-danger remove-contribution">Remove</button>
            </div>
        </div>
    </div>
    <button type="button" id="addContribution" class="btn btn-secondary mt-3">Add Contribution</button>
</div>


     <!-- Promoter Contributions Section -->
<div class="sub-form-box">
    <h4>Promoter Contributions</h4>
    <div id="promoterContributionsSection">
        <div class="row mt-2">
            <div class="col-md-3">
                <label class="form-label">Date</label>
                <input type="date" class="form-control" name="promoter_date[]">
            </div>
            <div class="col-md-5">
                <label class="form-label">Description of Promoter Contribution</label>
                <input type="text" class="form-control" name="promoter_description[]">
            </div>
            <div class="col-md-3">
                <label class="form-label">Value</label>
                <input type="number" class="form-control" name="promoter_value[]" step="0.01" min="0">
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="button" class="btn btn-danger remove-promoter-contribution">Remove</button>
            </div>
        </div>
    </div>
    <button type="button" id="addPromoterContribution" class="btn btn-secondary mt-3">Add Contribution</button>
</div>
      <!-- Grant Details Section -->
<div class="sub-form-box">
    <h4>Grant Details</h4>
    <div id="grantDetailsSection">
        <div class="row mt-2">
            <div class="col-md-3">
                <label class="form-label">Date</label>
                <input type="date" class="form-control" name="grant_date[]">
            </div>
            <div class="col-md-3">
                <label class="form-label">Description of Grant</label>
                <input type="text" class="form-control" name="grant_description[]">
            </div>
            <div class="col-md-2">
                <label class="form-label">Value</label>
                <input type="number" class="form-control" name="grant_value[]" step="0.01" min="0">
            </div>
            <div class="col-md-3">
                <label class="form-label">Grant Issued By</label>
                <input type="text" class="form-control" name="grant_issued_by[]">
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="button" class="btn btn-danger remove-grant">Remove</button>
            </div>
        </div>
    </div>
    <button type="button" id="addGrantDetail" class="btn btn-secondary mt-3">Add Grant</button>
</div>
<!-- Credit Details Section -->
<div class="sub-form-box">
    <h4>Credit Details</h4>
    <div class="row">
        <div class="col-md-3">
            <label class="form-label">Bank Name</label>
            <input type="text" class="form-control" name="bank_name">
        </div>
        <div class="col-md-3">
            <label class="form-label">Branch</label>
            <input type="text" class="form-control" name="branch" >
        </div>
        <div class="col-md-2">
            <label class="form-label">Account Number</label>
            <input type="text" class="form-control" name="account_number" >
        </div>
        <div class="col-md-2">
            <label class="form-label">Interest Rate (%)</label>
            <input type="number" step="0.01" min="0" class="form-control" name="interest_rate" >
        </div>
        <div class="col-md-2">
            <label class="form-label">Credit Issue Date</label>
            <input type="date" class="form-control" name="credit_issue_date">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-3">
            <label class="form-label">Loan Installment Date</label>
            <input type="date" class="form-control" name="loan_installment_date">
        </div>
        <div class="col-md-3">
            <label class="form-label">Credit Amount</label>
            <input type="number" step="0.01" min="0" class="form-control" name="credit_amount">
        </div>
        <div class="col-md-3">
            <label class="form-label">Number of Installments</label>
            <input type="number" min="1" class="form-control" name="number_of_installments">
        </div>
        <div class="col-md-3">
            <label class="form-label">Installment Due Date</label>
            <input type="date" class="form-control" name="installment_due_date">
        </div>
    </div>

    <div class="mt-4">
        <h4>Installment Payment</h4>
        <div id="installmentPaymentsSection">
            <div class="row mt-2">
                <div class="col-md-5">
                    <label class="form-label">Installment Payment Date</label>
                    <input type="date" class="form-control" name="installment_payment_date[]">
                </div>
                <div class="col-md-5">
                    <label class="form-label">Installment Payment Value</label>
                    <input type="number" step="0.01" min="0" class="form-control" name="installment_payment_value[]">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger remove-installment">Remove</button>
                </div>
            </div>
        </div>
        <button type="button" id="addInstallmentPayment" class="btn btn-secondary mt-3">Add Installment Payment</button>
    </div>
</div>

<!-- Credit Balance Info Section -->
<div class="sub-form-box">
    <h4>Credit Balance Info</h4>
    <div class="row">
        {{-- <div class="col-md-4">
            <label class="form-label">Credit Balance No</label>
            <input type="text" class="form-control" name="credit_balance_no" >
        </div> --}}
        <div class="col-md-4">
            <label class="form-label">Date (Auto)</label>
            <input type="date" class="form-control" name="credit_balance_date" value="{{ \Carbon\Carbon::now()->toDateString() }}" readonly>
        </div>
        <div class="col-md-4">
            <label class="form-label">Value</label>
            <input type="number" step="0.01" min="0" class="form-control" name="credit_balance_value" >
        </div>
    </div>
</div>



            <!-- Products Section -->
            <div class="sub-form-box">
                <h4>Livestock Products</h4>
                <div id="productsSection">
                    <div class="row mt-2">
        <div class="col-md-3">
            <label for="product_name" class="form-label">Product Name</label>
            <input type="text" class="form-control" name="product_name[]">
        </div>
        <div class="col-md-3">
            <label for="total_production" class="form-label">Total Production</label>
            <input type="number" class="form-control" name="total_production[]" step="0.01" min="0">
        </div>
        <div class="col-md-3">
            <label for="total_income" class="form-label">Total Income</label>
            <input type="number" class="form-control" name="total_income[]" step="0.01" min="0">
        </div>
        <div class="col-md-2">
            <label for="profit" class="form-label">Profit</label>
            <input type="number" class="form-control" name="profit[]" step="0.01" min="0">
        </div>
         <div class="col-md-6 mt-3">
        <label for="buyer_details" class="form-label">Buyer Details</label>
        <input type="text" class="form-control" name="buyer_details[]" placeholder="Enter buyer name/contact/remarks">
    </div>
        <div class="col-md-1 d-flex align-items-end">
            <button type="button" class="btn btn-danger remove-product">Remove</button>
        </div>
         </div>
                <button type="button" id="addProduct" class="btn btn-secondary mt-3">Add Product</button>
            </div>

    </div>
</div>
                   
               
            <!-- Submit Button -->
            <div class="row">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
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
                        <option value="${item.name}">${optionText}</option>
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


            // Add Farmer Contribution
$('#addContribution').click(function () {
   var newContribution = `
    <div class="row mt-2">
        <div class="col-md-3">
            <label class="form-label">Date</label>
            <input type="date" class="form-control" name="farmer_date[]">
        </div>
        <div class="col-md-5">
            <label class="form-label">Description of Farmer Contribution</label>
            <input type="text" class="form-control" name="farmer_description[]">
        </div>
        <div class="col-md-3">
            <label class="form-label">Value</label>
            <input type="number" class="form-control" name="farmer_value[]" step="0.01" min="0">
        </div>
        <div class="col-md-1 d-flex align-items-end">
            <button type="button" class="btn btn-danger remove-contribution">Remove</button>
        </div>
    </div>`;

    $('#contributionsSection').append(newContribution);
});

// Remove Farmer Contribution
$(document).on('click', '.remove-contribution', function () {
    $(this).closest('.row').remove();
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
                        <div class="col-md-6 mt-3">
                <label for="buyer_details" class="form-label">Buyer Details</label>
                <input type="text" class="form-control" name="buyer_details[]" placeholder="Enter buyer name/contact/remarks">
            </div>
                        <div class="col-md-12 mt-2">
                            <button type="button" class="btn btn-danger remove-product">Remove</button>
                        </div>
                    </div>`;
                $('#productsSection').append(newProduct);
            });

            

            // Remove Product
            $(document).on('click', '.remove-product', function () {
                $(this).closest('.row').remove();
            });
            
// Add Promoter Contribution
$('#addPromoterContribution').click(function () {
    var newPromoterContribution = `
        <div class="row mt-2">
            <div class="col-md-3">
                <label class="form-label">Date</label>
                <input type="date" class="form-control" name="promoter_date[]">
            </div>
            <div class="col-md-5">
                <label class="form-label">Description of Promoter Contribution</label>
                <input type="text" class="form-control" name="promoter_description[]">
            </div>
            <div class="col-md-3">
                <label class="form-label">Value</label>
                <input type="number" class="form-control" name="promoter_value[]" step="0.01" min="0">
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="button" class="btn btn-danger remove-promoter-contribution">Remove</button>
            </div>
        </div>`;
    $('#promoterContributionsSection').append(newPromoterContribution);
});

// Remove Promoter Contribution
$(document).on('click', '.remove-promoter-contribution', function () {
    $(this).closest('.row').remove();
});
// Add Grant Detail
$('#addGrantDetail').click(function () {
    var newGrant = `
        <div class="row mt-2">
            <div class="col-md-3">
                <label class="form-label">Date</label>
                <input type="date" class="form-control" name="grant_date[]">
            </div>
            <div class="col-md-3">
                <label class="form-label">Description of Grant</label>
                <input type="text" class="form-control" name="grant_description[]">
            </div>
            <div class="col-md-2">
                <label class="form-label">Value</label>
                <input type="number" class="form-control" name="grant_value[]" step="0.01" min="0">
            </div>
            <div class="col-md-3">
                <label class="form-label">Grant Issued By</label>
                <input type="text" class="form-control" name="grant_issued_by[]">
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="button" class="btn btn-danger remove-grant">Remove</button>
            </div>
        </div>`;
    $('#grantDetailsSection').append(newGrant);
});

// Remove Grant
$(document).on('click', '.remove-grant', function () {
    $(this).closest('.row').remove();
});
// Add Installment Payment
$('#addInstallmentPayment').click(function () {
    var newInstallment = `
        <div class="row mt-2">
            <div class="col-md-5">
                <label class="form-label">Installment Payment Date</label>
                <input type="date" class="form-control" name="installment_payment_date[]">
            </div>
            <div class="col-md-5">
                <label class="form-label">Installment Payment Value</label>
                <input type="number" class="form-control" name="installment_payment_value[]" step="0.01" min="0">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="button" class="btn btn-danger remove-installment">Remove</button>
            </div>
        </div>`;
    $('#installmentPaymentsSection').append(newInstallment);
});

// Remove Installment Payment
$(document).on('click', '.remove-installment', function () {
    $(this).closest('.row').remove();
});


        });
    </script>
</body>
</html>
