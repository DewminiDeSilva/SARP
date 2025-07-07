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
    .btn-back {
        display: inline-flex;
        align-items: center;
        justify-content: center; /* Center content horizontally */
        /*background-color: #26CF23; /* Button background color */
        color: #fff; /* Text color */
        border: none; /* Remove default border */
        padding: 10px 50px; /* Adjust padding */
        border-radius: 4px; /* Rounded corners */
        text-decoration: none; /* Remove underline */
        font-size: 14px; /* Font size */
        transition: background-color 0.3s ease; /* Smooth transition */
        cursor: pointer; /* Pointer cursor on hover */
        position: relative; /* Position relative for text positioning */
        overflow: hidden; /* Hide overflow to create a smooth effect */
    }

    .btn-back img {
        width: 45px; /* Adjust the size of the arrow image */
        height: auto;
        margin-right: 5px; /* Space between the image and text */
        transition: transform 0.3s ease; /* Smooth transition for image */
        background: none; /* Ensure no background on the image */
        position: relative; /* Position relative for smooth animation */
        z-index: 1; /* Ensure image is on top */
    }

    .btn-back .btn-text {
        opacity: 0; /* Hide text initially */
        visibility: hidden; /* Hide text initially */
        position: absolute; /* Position absolutely within the button */
        right: 25px; /* Adjust right position to fit the button */
        background-color: #1e8e1e; /* Background color for text on hover */
        color: #fff; /* Text color */
        padding: 4px 8px; /* Padding around text */
        border-radius: 4px; /* Rounded corners for text background */
        transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease; /* Smooth transition */
        z-index: 0; /* Ensure text is beneath the image */
    }

    .btn-back:hover .btn-text {
        opacity: 1; /* Show text on hover */
        visibility: visible; /* Show text on hover */
        transform: translateX(-5px); /* Move text to the right on hover */
        padding: 10px 20px; /* Adjust padding */
        border-radius: 20px; /* Rounded corners */
    }

    .btn-back:hover img {
        transform: translateX(-50px); /* Move image to the left on hover */
    }

    .btn-back:hover {
        /*background-color: #1e8e1e; /* Dark green on hover */

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

    <a href="{{ route('agriculture.index') }}" class="btn-back">
        <img src="{{ asset('assets/images/backarrow.png') }}" alt="Back"><span class="btn-text">Back</span>
    </a>

    </div>

   <div class="container">
    <h2>Edit Agriculture Data</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('agriculture.update', $agriculture->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-4">
                <label>Crop Category</label>
                <input type="text" name="category" class="form-control" value="{{ $agriculture->category }}" required>
            </div>
            <div class="col-md-4">
                <label>Crop Name</label>
                <input type="text" name="crop_name" class="form-control" value="{{ $agriculture->crop_name }}" required>
            </div>
            <div class="col-md-4">
                <label>Planting Date</label>
                <input type="date" name="planting_date" class="form-control" value="{{ $agriculture->planting_date }}" required>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <label>Total Acres</label>
                <input type="number" step="0.01" name="total_acres" class="form-control" value="{{ $agriculture->total_acres }}" required>
            </div>
            <div class="col-md-4">
                <label>Total Livestock Area</label>
                <input type="number" step="0.01" name="total_livestock_area" class="form-control" value="{{ $agriculture->total_livestock_area }}" required>
            </div>
            <div class="col-md-4">
                <label>Total Cost</label>
                <input type="number" step="0.01" name="total_cost" class="form-control" value="{{ $agriculture->total_cost }}" required>
            </div>
        </div>

        <!-- Farmer Contributions -->
      <div class="mt-4">
  <h5>Farmer Contributions</h5>
  <div id="farmer-fields">
    @foreach($agriculture->farmerContributions as $index => $item)
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
      <div class="col-md-1 d-flex align-items-end">
        <button type="button" class="btn btn-danger btn-sm remove-farmer">Remove</button>
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
    @foreach($agriculture->promoterContributions as $item)
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
      <div class="col-md-1 d-flex align-items-end">
        <button type="button" class="btn btn-danger btn-sm remove-promoter">Remove</button>
      </div>
    </div>
    @endforeach
  </div>
  <button type="button" class="btn btn-sm btn-success mt-2" id="add-promoter">Add More</button>
</div>


       <div class="mt-4">
  <h5>Grant Details</h5>
  <div id="grant-fields">
    @foreach($agriculture->grantDetails as $item)
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
        <label>Issued by</label>
        <input type="text" name="grant_issued_by[]" class="form-control" value="{{ $item->issued_by }}" placeholder="Issued By">
      </div>
      <div class="col-md-1 d-flex align-items-end">
        <button type="button" class="btn btn-danger btn-sm remove-grant">Remove</button>
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
             value="{{ $agriculture->creditDetail->bank_name ?? '' }}">
    </div>
    <div class="col-md-4">
      <label>Branch</label>
      <input type="text" name="branch" class="form-control" placeholder="Branch"
             value="{{ $agriculture->creditDetail->branch ?? '' }}">
    </div>
    <div class="col-md-4">
      <label>Account Number</label>
      <input type="text" name="account_number" class="form-control" placeholder="Account Number"
             value="{{ $agriculture->creditDetail->account_number ?? '' }}">
    </div>
  </div>

  <div class="row mt-2">
    <div class="col-md-3">
      <label>Interest Rate (%)</label>
      <input type="number" step="0.01" name="interest_rate" class="form-control" placeholder="Interest Rate %"
             value="{{ $agriculture->creditDetail->interest_rate ?? '' }}">
    </div>
    <div class="col-md-3">
      <label>Credit Issue Date</label>
      <input type="date" name="credit_issue_date" class="form-control" placeholder="Issue Date"
             value="{{ $agriculture->creditDetail->credit_issue_date ?? '' }}">
    </div>
    <div class="col-md-3">
      <label>Loan Installment Date</label>
      <input type="date" name="loan_installment_date" class="form-control" placeholder="Installment Date"
             value="{{ $agriculture->creditDetail->loan_installment_date ?? '' }}">
    </div>
    <div class="col-md-3">
      <label>Credit Amount (Rs.)</label>
      <input type="number" step="0.01" name="credit_amount" class="form-control" placeholder="Credit Amount"
             value="{{ $agriculture->creditDetail->credit_amount ?? '' }}">
    </div>
  </div>

  <div class="row mt-2">
    <div class="col-md-3">
      <label>Number of Installments</label>
      <input type="number" name="number_of_installments" class="form-control" placeholder="No of Installments"
             value="{{ $agriculture->creditDetail->number_of_installments ?? '' }}">
    </div>
    <div class="col-md-3">
      <label>Installment Due Date</label>
      <input type="date" name="installment_due_date" class="form-control" placeholder="Due Date"
             value="{{ $agriculture->creditDetail->installment_due_date ?? '' }}">
    </div>
    <div class="col-md-3">
      <label>Credit Balance On Date</label>
      <input type="date" name="credit_balance_on_date" class="form-control" placeholder="Balance On Date"
             value="{{ $agriculture->creditDetail->credit_balance_on_date ?? '' }}">
    </div>
    <div class="col-md-3">
      <label>Credit Balance</label>
      <input type="number" step="0.01" name="credit_balance" class="form-control" placeholder="Credit Balance"
             value="{{ $agriculture->creditDetail->credit_balance ?? '' }}">
    </div>
  </div>
</div>



        <!-- Credit Payments -->
        <h5 class="mt-4">Credit Payments</h5>
       @if($agriculture->creditDetail && $agriculture->creditDetail->payments)
    @foreach($agriculture->creditDetail->payments as $index => $item)
        <div class="row mb-2">
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
<button type="button" class="btn btn-sm btn-success mt-2" id="add-credit-payment">Add More</button>

        <div class="mt-4 text-center">
            <a href="{{ route('agriculture.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Update</button>
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

<script>
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
</script>
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

</body>
</html>
