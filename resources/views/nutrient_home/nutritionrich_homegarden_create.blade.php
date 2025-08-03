<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nutrient Rich Home Garden - Create</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS and FontAwesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        .section-header {
            background-color: #28a745;
            color: white;
            padding: 8px;
            margin-top: 20px;
            font-weight: bold;
            border-radius: 4px;
        }
        .remove-btn {
            color: red;
            cursor: pointer;
        }
    </style>

    <style>
        .frame {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%;
        }
        .right-column {
            flex: 0 0 80%;
            padding: 20px;
        }
        .left-column {
            flex: 0 0 20%;
            border-right: 1px solid #dee2e6;
        }
    </style>

    <style>
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
            position: relative;
            z-index: 1;
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
            z-index: 0;
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

<style>
    .sidebar {
        transition: transform 0.3s ease; /* Smooth toggle animation */
    }

    .sidebar.hidden {
        transform: translateX(-100%); /* Move sidebar out of view */
    }

    #sidebarToggle {
        background-color: #126926; /* Match the back button color */
        color: white;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    #sidebarToggle:hover {
        background-color: #0a4818; /* Darken the hover color */
    }


    .left-column.hidden {
    display: none; /* Hide the sidebar */
}
.right-column {
    transition: flex 0.3s ease, padding 0.3s ease; /* Smooth transition for width and padding */
}

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

    <div class="d-flex align-items-center mb-3">

	<!-- Sidebar Toggle Button -->
	<button id="sidebarToggle" class="btn btn-secondary mr-2">
		<i class="fas fa-bars"></i>
	</button>


	<a href="{{ route('nutrient-home.index') }}" class="btn-back">
        <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
    </a>

    </div>

<div class="container mt-4 mb-5">
    <h2 class="mb-4">Register Nutrient Rich Home Garden</h2>

    <form action="{{ route('nutrient-home.store') }}" method="POST">
        @csrf
        <input type="hidden" name="beneficiary_id" value="{{ $beneficiary->id }}">

        <!-- Crop Information -->
        <div class="section-header">Crop Information</div>
        <div class="form-group col-md-4">
            <label for="crop_category">Crop Category</label>
            <input type="text" class="form-control" name="crop_category" value="{{ $cropCategory }}" readonly>
        </div>
        <div class="form-group">
            <label>Crop Name *</label>
            <input type="text" name="crop_name" class="form-control" value="{{ old('crop_name', $cropName) }}" required>
        </div>
        <div class="form-group">
            <label>Production Focus</label>
            <input type="text" name="production_focus" class="form-control" value="{{ old('production_focus') }}">
        </div>
        <div class="form-group">
            <label>Planting Date</label>
            <input type="date" name="planting_date" class="form-control" value="{{ old('planting_date') }}">
        </div>

        <!-- Land & Livestock -->
        <div class="section-header">Land & Livestock</div>
        <div class="form-group">
            <label>Total Acres</label>
            <input type="number" name="total_acres" class="form-control" step="0.01">
        </div>
        <div class="form-group">
            <label>Total Livestock Area</label>
            <input type="number" name="total_livestock_area" class="form-control" step="0.01">
        </div>
        <div class="form-group">
            <label>Total Cost</label>
            <input type="number" name="total_cost" class="form-control" step="0.01">
        </div>

        <!-- Farmer Contributions -->
        <div class="section-header">Farmer Contributions</div>
        <table class="table table-bordered" id="farmer-contribution-table">
            <thead>
            <tr>
                <th>Date</th><th>Description</th><th>Value</th><th></th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
        <button type="button" onclick="addFarmerRow()" class="btn btn-sm btn-success mb-3">Add Farmer Contribution</button>

        <!-- Promoter Contributions -->
        <div class="section-header">Promoter Contributions</div>
        <table class="table table-bordered" id="promoter-contribution-table">
            <thead>
            <tr><th>Date</th><th>Description</th><th>Value</th><th></th></tr>
            </thead>
            <tbody></tbody>
        </table>
        <button type="button" onclick="addPromoterRow()" class="btn btn-sm btn-success mb-3">Add Promoter Contribution</button>

        <!-- Grant Details -->
        <div class="section-header">Grant Details</div>
        <table class="table table-bordered" id="grant-detail-table">
            <thead>
            <tr><th>Date</th><th>Description</th><th>Value</th><th>Issued By</th><th></th></tr>
            </thead>
            <tbody></tbody>
        </table>
        <button type="button" onclick="addGrantRow()" class="btn btn-sm btn-success mb-3">Add Grant</button>

        <!-- Products -->
        <div class="section-header">Products</div>
        <table class="table table-bordered" id="product-table">
            <thead>
            <tr>
                <th>Production Name</th>
                <th>Total Production</th>
                <th>Total Income (Rs.)</th>
                <th>Profit (Rs.)</th>
                <th></th>
            </tr>
            </thead>

            <tbody></tbody>
        </table>
        <button type="button" onclick="addProductRow()" class="btn btn-sm btn-success mb-3">Add Product</button>

        <!-- Credit Details -->
        <div class="section-header">Credit Details</div>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Bank Name</label>
                <input type="text" name="bank_name" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label>Branch</label>
                <input type="text" name="branch" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label>Account Number</label>
                <input type="text" name="account_number" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label>Interest Rate (%)</label>
                <input type="number" step="0.01" name="interest_rate" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label>Credit Issue Date</label>
                <input type="date" name="credit_issue_date" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label>Loan Installment Date</label>
                <input type="date" name="loan_installment_date" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label>Credit Amount</label>
                <input type="number" step="0.01" name="credit_amount" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label>Number of Installments</label>
                <input type="number" name="number_of_installments" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label>Installment Due Date</label>
                <input type="date" name="installment_due_date" class="form-control">
            </div>
        </div>

        <!-- Credit Payments -->
        <div class="section-header">Credit Payments</div>
        <table class="table table-bordered" id="credit-payment-table">
            <thead>
            <tr><th>Payment Date</th><th>Payment Value</th><th></th></tr>
            </thead>
            <tbody></tbody>
        </table>
        <button type="button" onclick="addCreditPaymentRow()" class="btn btn-sm btn-success mb-3">Add Payment</button>

        <!-- Credit Balance -->
        <div class="section-header">Credit Balance</div>
        <div class="row">
            <div class="form-group col-md-6">
                <label>Credit Balance On Date</label>
                <input type="date" name="credit_balance_on_date" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>Credit Balance</label>
                <input type="number" name="credit_balance" class="form-control" step="0.01">
            </div>
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
</div>
</div>

<!-- JavaScript for dynamic rows -->
<script>
    function addRow(tableId, columnsHtml) {
        const row = document.createElement('tr');
        row.innerHTML = columnsHtml;
        document.getElementById(tableId).querySelector('tbody').appendChild(row);
    }

    function removeRow(button) {
        button.closest('tr').remove();
    }

    function addFarmerRow() {
        addRow('farmer-contribution-table', `
            <td><input type="date" name="farmer_date[]" class="form-control"></td>
            <td><input type="text" name="farmer_contribution[]" class="form-control"></td>
            <td><input type="number" name="farmer_cost[]" class="form-control" step="0.01"></td>
            <td><span class="remove-btn" onclick="removeRow(this)"><i class="fas fa-trash-alt"></i></span></td>
        `);
    }

    function addPromoterRow() {
        addRow('promoter-contribution-table', `
            <td><input type="date" name="promoter_date[]" class="form-control"></td>
            <td><input type="text" name="promoter_description[]" class="form-control"></td>
            <td><input type="number" name="promoter_cost[]" class="form-control" step="0.01"></td>
            <td><span class="remove-btn" onclick="removeRow(this)"><i class="fas fa-trash-alt"></i></span></td>
        `);
    }

    function addGrantRow() {
        addRow('grant-detail-table', `
            <td><input type="date" name="grant_date[]" class="form-control"></td>
            <td><input type="text" name="grant_description[]" class="form-control"></td>
            <td><input type="number" name="grant_value[]" class="form-control" step="0.01"></td>
            <td><input type="text" name="grant_issued_by[]" class="form-control"></td>
            <td><span class="remove-btn" onclick="removeRow(this)"><i class="fas fa-trash-alt"></i></span></td>
        `);
    }

    function addProductRow() {
        addRow('product-table', `
            <td><input type="text" name="agriculture_products[product_name][]" class="form-control"></td>
            <td><input type="number" name="agriculture_products[total_production][]" class="form-control" step="0.01"></td>
            <td><input type="number" name="agriculture_products[total_income][]" class="form-control" step="0.01"></td>
            <td><input type="number" name="agriculture_products[profit][]" class="form-control" step="0.01"></td>
            <td><span class="remove-btn" onclick="removeRow(this)"><i class="fas fa-trash-alt"></i></span></td>
        `);
    }



    function addCreditPaymentRow() {
        addRow('credit-payment-table', `
            <td><input type="date" name="payment_date[]" class="form-control"></td>
            <td><input type="number" name="installment_payment[]" class="form-control" step="0.01"></td>
            <td><span class="remove-btn" onclick="removeRow(this)"><i class="fas fa-trash-alt"></i></span></td>
        `);
    }
</script>

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
