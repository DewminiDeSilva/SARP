<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Nutrient Rich Home Garden</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .section-header {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            margin-top: 20px;
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


	<a href="{{ route('nutrient-home.show', $homeGarden->id) }}" class="btn-back">
        <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
    </a>


    </div>
<div class="container mt-5">
    <h2 class="text-center mb-4">Edit Nutrient Rich Home Garden Record</h2>

    <form method="POST" action="{{ route('nutrient-home.update', $homeGarden->id) }}">
        @csrf
        @method('PUT')

        <input type="hidden" name="beneficiary_id" value="{{ $beneficiary->id }}">

        <div class="form-group">
            <label>Crop Name <span class="text-danger">*</span></label>
            <input type="text" name="crop_name" class="form-control" value="{{ old('crop_name', $homeGarden->crop_name) }}" required>
        </div>

        <div class="form-group">
            <label>Production Focus</label>
            <input type="text" name="production_focus" class="form-control" value="{{ old('production_focus', $homeGarden->production_focus) }}">
        </div>

        <div class="form-group">
            <label>Planting Date</label>
            <input type="date" name="planting_date" class="form-control" value="{{ old('planting_date', $homeGarden->planting_date) }}">
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Total Acres</label>
                <input type="number" step="0.01" name="total_acres" class="form-control" value="{{ old('total_acres', $homeGarden->total_acres) }}">
            </div>
            <div class="form-group col-md-4">
                <label>Total Livestock Area</label>
                <input type="number" step="0.01" name="total_livestock_area" class="form-control" value="{{ old('total_livestock_area', $homeGarden->total_livestock_area) }}">
            </div>
            <div class="form-group col-md-4">
                <label>Total Cost (Rs)</label>
                <input type="number" step="0.01" name="total_cost" class="form-control" value="{{ old('total_cost', $homeGarden->total_cost) }}">
            </div>
        </div>

        <!-- Farmer Contributions -->
        <div class="section-header">Farmer Contributions</div>
        <div id="farmer-contribution-section">
            @foreach($homeGarden->farmer_contributions ?? [] as $i => $item)
                <div class="form-row mb-2">
                    <div class="col">
                        <input type="date" name="farmer_date[]" class="form-control" value="{{ $item['date'] ?? '' }}">
                    </div>
                    <div class="col">
                        <input type="text" name="farmer_contribution[]" class="form-control" placeholder="Description" value="{{ $item['description'] ?? '' }}">
                    </div>
                    <div class="col">
                        <input type="number" name="farmer_cost[]" class="form-control" step="0.01" placeholder="Value" value="{{ $item['value'] ?? '' }}">
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Promoter Contributions -->
        <div class="section-header">Promoter Contributions</div>
        <div id="promoter-contribution-section">
            @foreach($homeGarden->promoter_contributions ?? [] as $i => $item)
                <div class="form-row mb-2">
                    <div class="col">
                        <input type="date" name="promoter_date[]" class="form-control" value="{{ $item['date'] ?? '' }}">
                    </div>
                    <div class="col">
                        <input type="text" name="promoter_description[]" class="form-control" placeholder="Description" value="{{ $item['description'] ?? '' }}">
                    </div>
                    <div class="col">
                        <input type="number" name="promoter_cost[]" class="form-control" step="0.01" placeholder="Value" value="{{ $item['value'] ?? '' }}">
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Grant Details -->
        <div class="section-header">Grant Details</div>
        <div id="grant-detail-section">
            @foreach($homeGarden->grant_details ?? [] as $i => $item)
                <div class="form-row mb-2">
                    <div class="col">
                        <input type="date" name="grant_date[]" class="form-control" value="{{ $item['date'] ?? '' }}">
                    </div>
                    <div class="col">
                        <input type="text" name="grant_description[]" class="form-control" placeholder="Description" value="{{ $item['description'] ?? '' }}">
                    </div>
                    <div class="col">
                        <input type="number" name="grant_value[]" class="form-control" step="0.01" placeholder="Value" value="{{ $item['value'] ?? '' }}">
                    </div>
                    <div class="col">
                        <input type="text" name="grant_issued_by[]" class="form-control" placeholder="Issued By" value="{{ $item['issued_by'] ?? '' }}">
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Credit Details -->
        <div class="section-header">Credit Details</div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Bank Name</label>
                <input type="text" name="bank_name" class="form-control" value="{{ old('bank_name', $homeGarden->bank_name) }}">
            </div>
            <div class="form-group col-md-4">
                <label>Branch</label>
                <input type="text" name="branch" class="form-control" value="{{ old('branch', $homeGarden->branch) }}">
            </div>
            <div class="form-group col-md-4">
                <label>Account Number</label>
                <input type="text" name="account_number" class="form-control" value="{{ old('account_number', $homeGarden->account_number) }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Interest Rate</label>
                <input type="number" step="0.01" name="interest_rate" class="form-control" value="{{ old('interest_rate', $homeGarden->interest_rate) }}">
            </div>
            <div class="form-group col-md-4">
                <label>Credit Issue Date</label>
                <input type="date" name="credit_issue_date" class="form-control" value="{{ old('credit_issue_date', $homeGarden->credit_issue_date) }}">
            </div>
            <div class="form-group col-md-4">
                <label>Loan Installment Date</label>
                <input type="date" name="loan_installment_date" class="form-control" value="{{ old('loan_installment_date', $homeGarden->loan_installment_date) }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Credit Amount</label>
                <input type="number" step="0.01" name="credit_amount" class="form-control" value="{{ old('credit_amount', $homeGarden->credit_amount) }}">
            </div>
            <div class="form-group col-md-4">
                <label>Number of Installments</label>
                <input type="number" name="number_of_installments" class="form-control" value="{{ old('number_of_installments', $homeGarden->number_of_installments) }}">
            </div>
            <div class="form-group col-md-4">
                <label>Installment Due Date</label>
                <input type="date" name="installment_due_date" class="form-control" value="{{ old('installment_due_date', $homeGarden->installment_due_date) }}">
            </div>
        </div>

        <!-- Credit Payments -->
        <div class="section-header">Credit Payments</div>
        <div id="credit-payment-section">
            @foreach($homeGarden->credit_payments ?? [] as $i => $item)
                <div class="form-row mb-2">
                    <div class="col">
                        <input type="date" name="payment_date[]" class="form-control" value="{{ $item['payment_date'] ?? '' }}">
                    </div>
                    <div class="col">
                        <input type="number" name="installment_payment[]" step="0.01" class="form-control" placeholder="Payment Value" value="{{ $item['payment_value'] ?? '' }}">
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Credit Balance -->
        <div class="section-header">Credit Balance</div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Credit Balance On Date</label>
                <input type="date" name="credit_balance_on_date" class="form-control" value="{{ old('credit_balance_on_date', $homeGarden->credit_balance_on_date) }}">
            </div>
            <div class="form-group col-md-6">
                <label>Credit Balance (Rs)</label>
                <input type="number" step="0.01" name="credit_balance" class="form-control" value="{{ old('credit_balance', $homeGarden->credit_balance) }}">
            </div>
        </div>

        <!-- Agriculture Products -->
        <div class="section-header">Agriculture Products</div>
        <div id="agriculture-products-section">
            @foreach($homeGarden->agriculture_products ?? [] as $i => $item)
                <div class="form-row mb-2">
                    <div class="col">
                        <input type="text" name="agriculture_products[product_name][]" class="form-control" placeholder="Product Name" value="{{ $item['product_name'] ?? '' }}">
                    </div>
                    <div class="col">
                        <input type="number" step="0.01" name="agriculture_products[total_production][]" class="form-control" placeholder="Total Production" value="{{ $item['total_production'] ?? '' }}">
                    </div>
                    <div class="col">
                        <input type="number" step="0.01" name="agriculture_products[total_income][]" class="form-control" placeholder="Total Income" value="{{ $item['total_income'] ?? '' }}">
                    </div>
                    <div class="col">
                        <input type="number" step="0.01" name="agriculture_products[profit][]" class="form-control" placeholder="Profit" value="{{ $item['profit'] ?? '' }}">
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            <a href="{{ route('nutrient-home.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
</div>
</div>
</div>

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
