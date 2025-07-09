<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Livestock Data</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
     <style>
    body {
        background-color: #f9f9f9;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        margin-bottom: 40px;
    }

    h2, h4, h5 {
        font-weight: 600;
        color: #145A32;
        margin-bottom: 20px;
    }

    .form-section {
        padding: 20px;
        margin-bottom: 30px;
        border: 1px solid #dcdcdc;
        border-radius: 8px;
        background-color: #fdfdfd;
    }

    .form-label {
        font-weight: 500;
        color: #333;
    }

    .btn-primary,
    .btn-secondary,
    .btn-danger {
        border-radius: 6px;
        padding: 8px 18px;
        font-size: 15px;
    }

    .btn-primary {
        background-color: #126926;
        border-color: #126926;
    }

    .btn-primary:hover {
        background-color: #126926;
        border-color: #126926;
    }

    .btn-secondary {
        background-color: #126926;
        border-color: #126926;
    }

    .btn-secondary:hover {
        background-color: #126926;
        border-color: #126926;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }

    .product-group, .row.mt-2 {
        background-color: #fefefe;
        padding: 10px 15px;
        border-radius: 6px;
        border: 1px solid #e0e0e0;
        margin-bottom: 10px;
    }

    .btn-back {
        display: flex;
        align-items: center;
        background-color: #126926;
        color: white;
        padding: 8px 20px;
        border-radius: 30px;
        text-decoration: none;
        font-weight: 500;
        transition: 0.3s ease;
        margin-right: 15px;
    }

    .btn-back img {
        height: 24px;
        margin-right: 8px;
        transition: transform 0.3s ease;
    }

    .btn-back:hover {
        background-color: #0f541f;
    }

    .btn-back:hover img {
        transform: translateX(-5px);
    }

    #sidebarToggle {
        background-color: #145A32;
        color: white;
        border: none;
        padding: 8px 14px;
        border-radius: 6px;
        font-size: 16px;
        margin-right: 15px;
    }

    #sidebarToggle:hover {
        background-color: #0f451c;
    }

    .text-center .btn {
        margin: 0 10px;
    }
    .left-column {
    width: 280px;
}

.right-column {
    flex-grow: 1;
}

</style>


</head>
<body>
@include('dashboard.header')
<div class="d-flex" style="gap: 20px;">
    <div class="left-column">
        @include('dashboard.dashboardC')
        @csrf
    </div>
   <div class="right-column flex-fill">

    <div class="d-flex align-items-center mb-3">


    <button id="sidebarToggle" class="btn btn-secondary mr-2">
        <i class="fas fa-bars"></i>
    </button>


    <a href="{{ route('infrastructure.index') }}" class="btn-back">
        <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
    </a>
    </div>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-2">
    <h1 class="custom-border">Edit Livestock Registration </h1>
        <form action="{{ route('livestocks.update', ['beneficiary_id' => $beneficiary_id, 'livestock' => $livestock->id]) }}" method="POST">
        </div>
            @csrf
            @method('PUT')

<div class="row">
    <!-- Livestock Type Field -->
    <div class="col-md-4 mb-3">
        <label for="livestock_type" class="form-label">Livestock Type</label>
        <select id="livestock_type" name="livestock_type" class="form-control" required>
            <option value="cattle" {{ $livestock->livestock_type == 'cattle' ? 'selected' : '' }}>Cattle</option>
            <option value="poultry" {{ $livestock->livestock_type == 'poultry' ? 'selected' : '' }}>Poultry</option>
            <option value="goats" {{ $livestock->livestock_type == 'goats' ? 'selected' : '' }}>Goats</option>
            <option value="sheep" {{ $livestock->livestock_type == 'sheep' ? 'selected' : '' }}>Sheep</option>
        </select>
    </div>

    <!-- Production Focus Field -->
    <div class="col-md-4 mb-3">
        <label for="production_focus" class="form-label">Production Focus</label>
        <select id="production_focus" name="production_focus" class="form-control" required>
            <option value="milk" {{ $livestock->production_focus == 'milk' ? 'selected' : '' }}>Milk Production</option>
            <option value="meat" {{ $livestock->production_focus == 'meat' ? 'selected' : '' }}>Meat Production</option>
            <option value="eggs" {{ $livestock->production_focus == 'eggs' ? 'selected' : '' }}>Egg Production</option>
            <option value="wool" {{ $livestock->production_focus == 'wool' ? 'selected' : '' }}>Wool Production</option>
        </select>
    </div>

    <!-- Livestock Commencement Date Field -->
    <div class="col-md-4 mb-3">
        <label for="livestock_commencement_date" class="form-label">Livestock Commencement Date</label>
        <input type="date" class="form-control" id="livestock_commencement_date" name="livestock_commencement_date" value="{{ old('livestock_commencement_date', $livestock->livestock_commencement_date) }}" required>
    </div>
</div>

          <div class="row">
    <!-- Number of Livestocks -->
    <div class="col-md-4 mb-3">
        <label for="number_of_livestocks" class="form-label">Number of Livestocks</label>
        <input type="number" class="form-control" 
               id="number_of_livestocks" 
               name="number_of_livestocks" 
               step="0.01" min="0" required
               value="{{ old('number_of_livestocks', $livestock->number_of_livestocks) }}">
    </div>

    <!-- Area of the Cade -->
    <div class="col-md-4 mb-3">
        <label for="area_of_cade" class="form-label">Area of the Cade</label>
        <input type="number" class="form-control" 
               id="area_of_cade" 
               name="area_of_cade" 
               step="0.01" min="0" required
               value="{{ old('area_of_cade', $livestock->area_of_cade) }}">
    </div>

    <!-- Value -->
    <div class="col-md-4 mb-3">
        <label for="livestock_value" class="form-label">Value</label>
        <input type="number" class="form-control" 
               id="livestock_value" 
               name="livestock_value" 
               step="0.01" min="0" required
               value="{{ old('livestock_value', $livestock->value) }}">
    </div>
</div>



            <!-- Farmer Contributions and Costs -->
           <div class="form-section">
    <h4>Farmer Contributions</h4>
    <div id="contributionsSection">
        @foreach($livestock->farmerContributions as $index => $contribution)
        <div class="row mt-2">
            <div class="col-md-3">
                <label class="form-label">Date</label>
                <input type="date" class="form-control" name="farmer_date[]" value="{{ old('farmer_date.' . $index, $contribution->date) }}">
            </div>
            <div class="col-md-5">
                <label class="form-label">Description of Farmer Contribution</label>
                <input type="text" class="form-control" name="farmer_description[]" value="{{ old('farmer_description.' . $index, $contribution->description) }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">Value</label>
                <input type="number" class="form-control" name="farmer_value[]" step="0.01" value="{{ old('farmer_value.' . $index, $contribution->value) }}">
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="button" class="btn btn-danger remove-contribution">Remove</button>
            </div>
        </div>
        @endforeach
    </div>
    <button type="button" id="addContribution" class="btn btn-secondary mt-3">Add Contribution</button>
</div>

<div class="form-section">
    <h4>Promoter Contributions</h4>
    <div id="promoterContributionsSection">
        @foreach($livestock->promoterContributions as $index => $promoter)
        <div class="row mt-2">
            <div class="col-md-3">
                <label class="form-label">Date</label>
                <input type="date" class="form-control" name="promoter_date[]" value="{{ old('promoter_date.' . $index, $promoter->date) }}">
            </div>
            <div class="col-md-5">
                <label class="form-label">Description</label>
                <input type="text" class="form-control" name="promoter_description[]" value="{{ old('promoter_description.' . $index, $promoter->description) }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">Value</label>
                <input type="number" class="form-control" name="promoter_value[]" step="0.01" value="{{ old('promoter_value.' . $index, $promoter->value) }}">
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="button" class="btn btn-danger remove-promoter-contribution">Remove</button>
            </div>
        </div>
        @endforeach
    </div>
    <button type="button" id="addPromoterContribution" class="btn btn-secondary mt-3">Add Contribution</button>
</div>
<div class="form-section">
    <h4>Grant Details</h4>
    <div id="grantDetailsSection">
        @foreach($livestock->grantDetails as $index => $grant)
        <div class="row mt-2">
            <div class="col-md-3">
                <label class="form-label">Date</label>
                <input type="date" class="form-control" name="grant_date[]" value="{{ old('grant_date.' . $index, $grant->date) }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">Description</label>
                <input type="text" class="form-control" name="grant_description[]" value="{{ old('grant_description.' . $index, $grant->description) }}">
            </div>
            <div class="col-md-2">
                <label class="form-label">Value</label>
                <input type="number" class="form-control" name="grant_value[]" step="0.01" value="{{ old('grant_value.' . $index, $grant->value) }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">Grant Issued By</label>
                <input type="text" class="form-control" name="grant_issued_by[]" value="{{ old('grant_issued_by.' . $index, $grant->issued_by) }}">
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="button" class="btn btn-danger remove-grant">Remove</button>
            </div>
        </div>
        @endforeach
    </div>
    <button type="button" id="addGrantDetail" class="btn btn-secondary mt-3">Add Grant</button>
</div>
<div class="form-section">
    <h4>Credit Details</h4>
    <div class="row">
        <div class="col-md-3">
            <label class="form-label">Bank Name</label>
            <input type="text" class="form-control" name="bank_name" value="{{ old('bank_name', $livestock->bank_name) }}">
        </div>
        <div class="col-md-3">
            <label class="form-label">Branch</label>
            <input type="text" class="form-control" name="branch" value="{{ old('branch', $livestock->branch) }}">
        </div>
        <div class="col-md-2">
            <label class="form-label">Account Number</label>
            <input type="text" class="form-control" name="account_number" value="{{ old('account_number', $livestock->account_number) }}">
        </div>
        <div class="col-md-2">
            <label class="form-label">Interest Rate (%)</label>
            <input type="number" step="0.01" class="form-control" name="interest_rate" value="{{ old('interest_rate', $livestock->interest_rate) }}">
        </div>
        <div class="col-md-2">
            <label class="form-label">Credit Issue Date</label>
            <input type="date" class="form-control" name="credit_issue_date" value="{{ old('credit_issue_date', $livestock->credit_issue_date) }}">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-3">
            <label class="form-label">Loan Installment Date</label>
            <input type="date" class="form-control" name="loan_installment_date" value="{{ old('loan_installment_date', $livestock->loan_installment_date) }}">
        </div>
        <div class="col-md-3">
            <label class="form-label">Credit Amount</label>
            <input type="number" class="form-control" name="credit_amount" value="{{ old('credit_amount', $livestock->credit_amount) }}">
        </div>
        <div class="col-md-3">
            <label class="form-label">Number of Installments</label>
            <input type="number" class="form-control" name="number_of_installments" value="{{ old('number_of_installments', $livestock->number_of_installments) }}">
        </div>
        <div class="col-md-3">
            <label class="form-label">Installment Due Date</label>
            <input type="date" class="form-control" name="installment_due_date" value="{{ old('installment_due_date', $livestock->installment_due_date) }}">
        </div>
    </div>
    <div class="mt-4">
        <h5>Installment Payments</h5>
        <div id="installmentPaymentsSection">
            @foreach($livestock->installmentPayments as $index => $payment)
            <div class="row mt-2">
                <div class="col-md-5">
                    <label class="form-label">Installment Payment Date</label>
                    <input type="date" class="form-control" name="installment_payment_date[]" value="{{ old('installment_payment_date.' . $index, $payment->installment_payment_date) }}">
                </div>
                <div class="col-md-5">
                    <label class="form-label">Installment Payment Value</label>
                    <input type="number" class="form-control" name="installment_payment_value[]" step="0.01" value="{{ old('installment_payment_value.' . $index, $payment->installment_payment_value) }}">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger remove-installment">Remove</button>
                </div>
            </div>
            @endforeach
        </div>
        <button type="button" id="addInstallmentPayment" class="btn btn-secondary mt-3">Add Installment Payment</button>
    </div>
</div>
<div class="form-section">
    <h4>Credit Balance Info</h4>
    <div class="row">
        <div class="col-md-4">
            <label class="form-label">Credit Balance No</label>
            <input type="text" class="form-control" name="credit_balance_no" value="{{ old('credit_balance_no', $livestock->credit_balance_no) }}">
        </div>
        <div class="col-md-4">
            <label class="form-label">Date</label>
            <input type="date" class="form-control" name="credit_balance_date" value="{{ old('credit_balance_date', $livestock->credit_balance_date) }}">
        </div>
        <div class="col-md-4">
            <label class="form-label">Value</label>
            <input type="number" step="0.01" class="form-control" name="credit_balance_value" value="{{ old('credit_balance_value', $livestock->credit_balance_value) }}">
        </div>
    </div>
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

    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript for adding/removing contribution and product fields -->
   <script>
    document.getElementById('addContribution').addEventListener('click', function () {
        var container = document.getElementById('contributionsSection');
        var group = document.createElement('div');
        group.className = 'row mt-2';

        group.innerHTML = `
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
        `;
        container.appendChild(group);
    });

    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-contribution')) {
            e.target.closest('.row').remove();
        }
    });
</script>
<script>
    document.getElementById('addPromoterContribution').addEventListener('click', function () {
        var container = document.getElementById('promoterContributionsSection');
        var group = document.createElement('div');
        group.className = 'row mt-2';

        group.innerHTML = `
            <div class="col-md-3">
                <label class="form-label">Date</label>
                <input type="date" class="form-control" name="promoter_date[]">
            </div>
            <div class="col-md-5">
                <label class="form-label">Description</label>
                <input type="text" class="form-control" name="promoter_description[]">
            </div>
            <div class="col-md-3">
                <label class="form-label">Value</label>
                <input type="number" class="form-control" name="promoter_value[]" step="0.01" min="0">
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="button" class="btn btn-danger remove-promoter-contribution">Remove</button>
            </div>
        `;
        container.appendChild(group);
    });

    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-promoter-contribution')) {
            e.target.closest('.row').remove();
        }
    });
</script>
<script>
    document.getElementById('addGrantDetail').addEventListener('click', function () {
        var container = document.getElementById('grantDetailsSection');
        var group = document.createElement('div');
        group.className = 'row mt-2';

        group.innerHTML = `
            <div class="col-md-3">
                <label class="form-label">Date</label>
                <input type="date" class="form-control" name="grant_date[]">
            </div>
            <div class="col-md-3">
                <label class="form-label">Description</label>
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
        `;
        container.appendChild(group);
    });

    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-grant')) {
            e.target.closest('.row').remove();
        }
    });
</script>
<script>
    document.getElementById('addInstallmentPayment').addEventListener('click', function () {
        var container = document.getElementById('installmentPaymentsSection');
        var group = document.createElement('div');
        group.className = 'row mt-2';

        group.innerHTML = `
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
        `;
        container.appendChild(group);
    });

    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-installment')) {
            e.target.closest('.row').remove();
        }
    });
</script>


        <script>
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
                <input type="number" class="form-control" name="total_production[]" id="total_production_${index}" step="0.01" min="0" required>
            </div>
            <div class="col-md-2">
                <label for="total_income_${index}" class="form-label">Total Income</label>
                <input type="number" class="form-control" name="total_income[]" id="total_income_${index}" step="0.01" min="0" required>
            </div>
            <div class="col-md-2">
                <label for="profit_${index}" class="form-label">Profit</label>
                <input type="number" class="form-control" name="profit[]" id="profit_${index}" step="0.01" min="0" required>
            </div>
            <div class="col-md-2 mt-4">
                <button type="button" class="btn btn-danger remove-product">Remove</button>
            </div>
        `;
        productsDiv.appendChild(newProductGroup);
    });

    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-product')) {
            e.target.closest('.row').remove();
        }
    });
</script>
<!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

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
