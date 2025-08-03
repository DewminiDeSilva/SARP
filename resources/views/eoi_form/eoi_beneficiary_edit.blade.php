<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Agriculture Data</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    .frame {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        width: 100%;
    }

    .left-column {
        flex: 0 0 20%;
        /*padding: 20px;*/
        border-right: 1px solid #dee2e6;
    }

    .right-column {
        flex: 0 0 80%;
        padding: 20px;
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
  .btn-primary {
            background-color: #198754;
            border-color: #198754;
        }

        .btn-primary:hover {
            background-color: #145c32;
            border-color: #145c32;
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

    <a href="{{ route('expressions.evaluation_completed') }}" class="btn-back">
        <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
    </a>

    </div>

   <div class="container">
    <h2>Edit EOI Data</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif


     <form method="POST" action="{{ route('eoi_form.update', $eoi->id) }}">
    @csrf
    @method('PUT')

    <input type="hidden" name="beneficiary_id" value="{{ $beneficiary->id }}">

    <div class="row">
        <div class="col-md-4">
            <label>EOI Category</label>
            <input type="text" name="eoi_category" class="form-control" value="{{ $beneficiary->eoi_category }}" readonly>
        </div>
        <div class="col-md-4">
            <label>EOI Business Concept Title</label>
            <input type="text" name="eoi_business_title" class="form-control" value="{{ $beneficiary->eoi_business_title }}" readonly>
        </div>
        <div class="col-md-4">
            <label>Planting Date</label>
            <input type="date" name="planting_date" class="form-control" value="{{ $eoi->planting_date }}">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-4">
            <label>Total Acres</label>
            <input type="number" step="0.01" name="total_acres" class="form-control" value="{{ $eoi->total_acres }}">
        </div>
        <div class="col-md-4">
            <label>GN Division</label>
            <input type="text" name="gn_division_name" class="form-control" value="{{ $eoi->gn_division_name }}">
        </div>
        <div class="col-md-4">
            <label>Total Cost</label>
            <input type="number" step="0.01" name="total_cost" class="form-control" value="{{ $eoi->total_cost }}">
        </div>
    </div>

<!-- Farmer Contributions -->
<div class="mt-4">
  <h5>Farmer Contributions</h5>
  <div id="farmer-fields">
    @foreach($eoi->farmerContributions as $index => $item)
    <div class="row farmer-group mb-2">
      <div class="col-md-3">
        <label>Contribution Date</label>
        <input type="date" name="farmer_date[]" class="form-control" value="{{ $item->date }}" placeholder="Date">
      </div>
      <div class="col-md-5">
        <label>Contribution Description</label>
        <input type="text" name="farmer_contribution[]" class="form-control" value="{{ $item->farmer_contribution }}" placeholder="Contribution Description">
      </div>
      <div class="col-md-3">
        <label>Cost (Rs.)</label>
        <input type="number" step="0.01" name="cost[]" class="form-control" value="{{ $item->cost }}" placeholder="Cost">
      </div>
    </div>
    @endforeach
  </div>
  <button type="button" class="btn btn-sm btn-success mt-2" id="add-farmer">Add More</button>
</div>

<!-- Promoter Contributions -->
<div class="mt-4">
  <h5>Promoter Contributions</h5>
  <div id="promoter-fields">
    @foreach($eoi->promoterContributions as $item)
    <div class="row promoter-group mb-2">
      <div class="col-md-3">
        <label>Contribution Date</label>
        <input type="date" name="promoter_date[]" class="form-control" value="{{ $item->date }}" placeholder="Date">
      </div>
      <div class="col-md-5">
        <label>Contribution Description</label>
        <input type="text" name="promoter_description[]" class="form-control" value="{{ $item->description }}" placeholder="Description">
      </div>
      <div class="col-md-3">
        <label>Cost (Rs.)</label>
        <input type="number" step="0.01" name="promoter_cost[]" class="form-control" value="{{ $item->cost }}" placeholder="Cost">
      </div>
    </div>
    @endforeach
  </div>
  <button type="button" class="btn btn-sm btn-success mt-2" id="add-promoter">Add More</button>
</div>

<!-- Grant Details -->
<div class="mt-4">
  <h5>Grant Details</h5>
  <div id="grant-fields">
    @foreach($eoi->grantDetails as $item)
    <div class="row grant-group mb-2">
      <div class="col-md-2">
        <label>Grant Date</label>
        <input type="date" name="grant_date[]" class="form-control" value="{{ $item->date }}" placeholder="Date">
      </div>
      <div class="col-md-4">
        <label>Grant Description</label>
        <input type="text" name="grant_description[]" class="form-control" value="{{ $item->description }}" placeholder="Description">
      </div>
      <div class="col-md-2">
        <label>Value</label>
        <input type="number" step="0.01" name="grant_value[]" class="form-control" value="{{ $item->value }}" placeholder="Value">
      </div>
      <div class="col-md-3">
        <label>Issued By</label>
        <input type="text" name="grant_issued_by[]" class="form-control" value="{{ $item->grant_issued_by }}" placeholder="Issued By">
      </div>
    </div>
    @endforeach
  </div>
  <button type="button" class="btn btn-sm btn-success mt-2" id="add-grant">Add More</button>
</div>



      <!-- Credit Details -->
<div class="mt-4">
  <h5>Credit Details</h5>
  <div class="row">
    <div class="col-md-4">
      <label>Bank Name</label>
      <input type="text" name="bank_name" class="form-control" placeholder="Bank Name"
             value="{{ $eoi->creditDetail->bank_name ?? '' }}">
    </div>
    <div class="col-md-4">
      <label>Branch</label>
      <input type="text" name="branch" class="form-control" placeholder="Branch"
             value="{{ $eoi->creditDetail->branch ?? '' }}">
    </div>
    <div class="col-md-4">
      <label>Account Number</label>
      <input type="text" name="account_number" class="form-control" placeholder="Account Number"
             value="{{ $eoi->creditDetail->account_number ?? '' }}">
    </div>
  </div>

  <div class="row mt-2">
    <div class="col-md-3">
      <label>Interest Rate (%)</label>
      <input type="number" step="0.01" name="interest_rate" class="form-control" placeholder="Interest Rate %"
             value="{{ $eoi->creditDetail->interest_rate ?? '' }}">
    </div>
    <div class="col-md-3">
      <label>Credit Issue Date</label>
      <input type="date" name="credit_issue_date" class="form-control" placeholder="Issue Date"
             value="{{ $eoi->creditDetail->credit_issue_date ?? '' }}">
    </div>
    <div class="col-md-3">
      <label>Loan Installment Date</label>
      <input type="date" name="loan_installment_date" class="form-control" placeholder="Installment Date"
             value="{{ $eoi->creditDetail->loan_installment_date ?? '' }}">
    </div>
    <div class="col-md-3">
      <label>Credit Amount (Rs.)</label>
      <input type="number" step="0.01" name="credit_amount" class="form-control" placeholder="Credit Amount"
             value="{{ $eoi->creditDetail->credit_amount ?? '' }}">
    </div>
  </div>

  <div class="row mt-2">
    <div class="col-md-3">
      <label>Number of Installments</label>
      <input type="number" name="number_of_installments" class="form-control" placeholder="No of Installments"
             value="{{ $eoi->creditDetail->number_of_installments ?? '' }}">
    </div>
    <div class="col-md-3">
      <label>Installment Due Date</label>
      <input type="date" name="installment_due_date" class="form-control" placeholder="Due Date"
             value="{{ $eoi->creditDetail->installment_due_date ?? '' }}">
    </div>
    <div class="col-md-3">
      <label>Credit Balance On Date</label>
      <input type="date" name="credit_balance_on_date" class="form-control" placeholder="Balance On Date"
             value="{{ $eoi->creditDetail->credit_balance_on_date ?? '' }}">
    </div>
    <div class="col-md-3">
      <label>Credit Balance</label>
      <input type="number" step="0.01" name="credit_balance" class="form-control" placeholder="Credit Balance"
             value="{{ $eoi->creditDetail->credit_balance ?? '' }}">
    </div>
  </div>
</div>



<!-- Credit Payments -->
<h5 class="mt-4">Credit Payments</h5>
@if($eoi->creditDetail && $eoi->creditDetail->payments)
    @foreach($eoi->creditDetail->payments as $index => $item)
        <div class="row mb-2 credit-payment-group">
            <div class="col-md-6">
                <label>Payment Date</label>
                <input type="date" name="payment_date[]" class="form-control" value="{{ $item->payment_date }}" placeholder="Payment Date">
            </div>
            <div class="col-md-6">
                <label>Installment Payment (Rs.)</label>
                <input type="number" step="0.01" name="installment_payment[]" class="form-control" value="{{ $item->installment_payment }}" placeholder="Installment Payment">
            </div>
        </div>
    @endforeach
@endif
<div id="credit-payment-fields"></div>
<button type="button" class="btn btn-sm btn-success mt-2" id="add-credit-payment">Add More</button>
<!-- Agriculture Products -->
<h5 class="mt-4">Agriculture Products</h5>
<div id="product-container">
    @if ($eoi->agricultureProducts)
        @foreach ($eoi->agricultureProducts as $index => $product)
            <div class="row mb-2 product-group align-items-end">
                <div class="col-md-3">
                    <label>Product Name</label>
                    <input type="text" name="product_name[]" class="form-control" value="{{ $product->product_name }}">
                </div>
                <div class="col-md-3">
                    <label>Total Production</label>
                    <input type="number" step="0.01" name="total_production[]" class="form-control" value="{{ $product->total_production }}">
                </div>
                <div class="col-md-3">
                    <label>Total Income</label>
                    <input type="number" step="0.01" name="total_income[]" class="form-control" value="{{ $product->total_income }}">
                </div>
                <div class="col-md-2">
                    <label>Profit</label>
                    <input type="number" step="0.01" name="profit[]" class="form-control" value="{{ $product->profit }}">
                </div>
                <div class="col-md-3 mt-2">
                    <label>Buyer Details</label>
                    <input type="text" name="buyer_details[]" class="form-control" value="{{ $product->buyer_details }}" placeholder="Buyer Name / Company">
                </div>
            </div>
        @endforeach
    @endif
</div>

<button type="button" class="btn btn-sm btn-success mt-2" id="add-product">Add More</button>


        <div class="mt-4 text-center">
          
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

        @if($errors->any())
    <div class="alert alert-danger">
        <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
@endif

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
                 <div class="col-md-3">
            <input type="text" name="buyer_details[]" class="form-control" placeholder="Buyer Details">
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

<!-- <script>
document.addEventListener('DOMContentLoaded', function () {
    // ADD CREDIT PAYMENT
    document.getElementById('add-credit-payment')?.addEventListener('click', function () {
        const container = document.createElement('div');
        container.className = 'row mb-2 credit-payment-group';

        container.innerHTML = `
            <div class="col-md-6">
                <label>Payment Date</label>
                <input type="date" name="payment_date[]" class="form-control" placeholder="Payment Date">
            </div>
            <div class="col-md-5">
                <label>Installment Payment (Rs.)</label>
                <input type="number" step="0.01" name="installment_payment[]" class="form-control" placeholder="Installment Payment">
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="button" class="btn btn-danger btn-sm remove-credit-payment">Remove</button>
            </div>
        `;
        this.parentNode.insertBefore(container, this); // insert above the Add More button
    });

    // REMOVE CREDIT PAYMENT
    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('remove-credit-payment')) {
            event.target.closest('.credit-payment-group')?.remove();
        }
    });
});
</script> -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    // ================== Farmer Contribution ==================
    document.getElementById('add-farmer')?.addEventListener('click', function () {
        const container = document.getElementById('farmer-fields');
        const group = document.createElement('div');
        group.className = 'row farmer-group mb-2';
        group.innerHTML = `
            <div class="col-md-3">
                <label>Contribution Date</label>
                <input type="date" name="farmer_date[]" class="form-control" placeholder="Date">
            </div>
            <div class="col-md-5">
                <label>Contribution Description</label>
                <input type="text" name="farmer_contribution[]" class="form-control" placeholder="Contribution Description">
            </div>
            <div class="col-md-3">
                <label>Cost (Rs.)</label>
                <input type="number" step="0.01" name="cost[]" class="form-control" placeholder="Cost">
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="button" class="btn btn-danger btn-sm remove-farmer">Remove</button>
            </div>
        `;
        container.appendChild(group);
    });

    // ================== Promoter Contribution ==================
    document.getElementById('add-promoter')?.addEventListener('click', function () {
        const container = document.getElementById('promoter-fields');
        const group = document.createElement('div');
        group.className = 'row promoter-group mb-2';
        group.innerHTML = `
            <div class="col-md-3">
                <label>Contribution Date</label>
                <input type="date" name="promoter_date[]" class="form-control" placeholder="Date">
            </div>
            <div class="col-md-5">
                <label>Contribution Description</label>
                <input type="text" name="promoter_description[]" class="form-control" placeholder="Description">
            </div>
            <div class="col-md-3">
                <label>Cost (Rs.)</label>
                <input type="number" step="0.01" name="promoter_cost[]" class="form-control" placeholder="Cost">
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="button" class="btn btn-danger btn-sm remove-promoter">Remove</button>
            </div>
        `;
        container.appendChild(group);
    });

    // ================== Grant Details ==================
    document.getElementById('add-grant')?.addEventListener('click', function () {
        const container = document.getElementById('grant-fields');
        const group = document.createElement('div');
        group.className = 'row grant-group mb-2';
        group.innerHTML = `
            <div class="col-md-2">
                <label>Grant Date</label>
                <input type="date" name="grant_date[]" class="form-control" placeholder="Date">
            </div>
            <div class="col-md-4">
                <label>Grant Description</label>
                <input type="text" name="grant_description[]" class="form-control" placeholder="Description">
            </div>
            <div class="col-md-2">
                <label>Value</label>
                <input type="number" step="0.01" name="grant_value[]" class="form-control" placeholder="Value">
            </div>
            <div class="col-md-3">
                <label>Issued by</label>
                <input type="text" name="grant_issued_by[]" class="form-control" placeholder="Issued By">
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="button" class="btn btn-danger btn-sm remove-grant">Remove</button>
            </div>
        `;
        container.appendChild(group);
    });

    // ================== Credit Payments ==================
    document.getElementById('add-credit-payment')?.addEventListener('click', function () {
        const container = document.createElement('div');
        container.className = 'row mb-2 credit-payment-group';
        container.innerHTML = `
            <div class="col-md-6">
                <label>Payment Date</label>
                <input type="date" name="payment_date[]" class="form-control" placeholder="Payment Date">
            </div>
            <div class="col-md-5">
                <label>Installment Payment (Rs.)</label>
                <input type="number" step="0.01" name="installment_payment[]" class="form-control" placeholder="Installment Payment">
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="button" class="btn btn-danger btn-sm remove-credit-payment">Remove</button>
            </div>
        `;
        this.parentNode.insertBefore(container, this); // insert above button
    });

    // ================== Remove Buttons ==================
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-farmer')) {
            e.target.closest('.farmer-group')?.remove();
        } else if (e.target.classList.contains('remove-promoter')) {
            e.target.closest('.promoter-group')?.remove();
        } else if (e.target.classList.contains('remove-grant')) {
            e.target.closest('.grant-group')?.remove();
        } else if (e.target.classList.contains('remove-credit-payment')) {
            e.target.closest('.credit-payment-group')?.remove();
        }
    });
});
</script>

<script>
    document.getElementById('add-product').addEventListener('click', function () {
        const container = document.getElementById('product-container');
        const newGroup = document.createElement('div');
        newGroup.classList.add('row', 'mb-2', 'product-group', 'align-items-end');

        newGroup.innerHTML = `
            <div class="col-md-3">
                <input type="text" name="product_name[]" class="form-control" placeholder="Product Name">
            </div>
            <div class="col-md-3">
                <input type="number" step="0.01" name="total_production[]" class="form-control" placeholder="Total Production">
            </div>
            <div class="col-md-3">
                <input type="number" step="0.01" name="total_income[]" class="form-control" placeholder="Total Income">
            </div>
            <div class="col-md-2">
                <input type="number" step="0.01" name="profit[]" class="form-control" placeholder="Profit">
            </div>
             <div class="col-md-3">
            <input type="text" name="buyer_details[]" class="form-control" placeholder="Buyer Details">
        </div>
            <div class="col-md-1 text-end">
                <button type="button" class="btn btn-danger btn-sm remove-product">Remove</button>
            </div>
        `;

        container.appendChild(newGroup);
    });

    // Remove functionality for newly added rows
    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-product')) {
            e.target.closest('.product-group').remove();
        }
    });
</script>

</body>
</html>
