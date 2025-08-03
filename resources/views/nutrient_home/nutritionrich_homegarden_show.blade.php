<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Nutrient Rich Home Garden</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .section-header {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-top: 30px;
        }
        .data-label {
            font-weight: 600;
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

<div class="container mt-4">

    <div class="text-center">
        <h3 style="font-size: 2rem; color: green;">Nutrient Rich Home Garden Details</h3>
    </div>

    <!-- Beneficiary Info -->
    <div class="section-header">Beneficiary Info</div>
    <div class="row mt-2 mb-4">
        <div class="col-md-6">
            <p><span class="data-label">Beneficiary Name:</span> {{ $beneficiary->name_with_initials }}</p>
        </div>
        <div class="col-md-6">
            <p><span class="data-label">NIC:</span> {{ $beneficiary->nic }}</p>
        </div>
    </div>

    <!-- Loop through each Home Garden record -->
    @foreach ($homeGardens as $index => $homeGarden)
        <hr class="my-4">
        <h4 class="text-success">Home Garden Record {{ $index + 1 }}</h4>

        <!-- Section: Crop Info -->
        <div class="section-header">Crop Info</div>
        <div class="row mt-2">
            <div class="col-md-4"><p><span class="data-label">Crop Name:</span> {{ $homeGarden->crop_name }}</p></div>
            <div class="col-md-4"><p><span class="data-label">Production Focus:</span> {{ $homeGarden->production_focus }}</p></div>
            <div class="col-md-4"><p><span class="data-label">Planting Date:</span> {{ $homeGarden->planting_date }}</p></div>
            <div class="col-md-4"><p><span class="data-label">Total Acres:</span> {{ $homeGarden->total_acres }}</p></div>
            <div class="col-md-4"><p><span class="data-label">Total Livestock Area:</span> {{ $homeGarden->total_livestock_area }}</p></div>
            <div class="col-md-4"><p><span class="data-label">Total Cost (Rs):</span> {{ $homeGarden->total_cost }}</p></div>
        </div>

        <!-- Section: Farmer Contributions -->
        <div class="section-header">Farmer Contributions</div>
        <table class="table table-bordered">
            <thead><tr><th>Contribution</th><th>Cost</th><th>Date</th></tr></thead>
            <tbody>
            @foreach ($homeGarden->farmer_contributions as $contribution)
            <tr>
                <td>{{ $contribution['description'] ?? '-' }}</td>
                <td>{{ $contribution['value'] ?? '-' }}</td>
                <td>{{ $contribution['date'] ?? '-' }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Section: Promoter Contributions -->
        <div class="section-header">Promoter Contributions</div>
        <table class="table table-bordered">
            <thead><tr><th>Date</th><th>Description</th><th>Cost</th></tr></thead>
            <tbody>
            @foreach ($homeGarden->promoter_contributions as $contribution)
            <tr>
                <td>{{ $contribution['date'] ?? '-' }}</td>
                <td>{{ $contribution['description'] ?? '-' }}</td>
                <td>{{ $contribution['value'] ?? '-' }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Section: Grant Details -->
        <div class="section-header">Grant Details</div>
        <table class="table table-bordered">
            <thead><tr><th>Date</th><th>Description</th><th>Value</th><th>Issued By</th></tr></thead>
            <tbody>
            @foreach ($homeGarden->grant_details as $grant)
            <tr>
                <td>{{ $grant['date'] ?? '-' }}</td>
                <td>{{ $grant['description'] ?? '-' }}</td>
                <td>{{ $grant['value'] ?? '-' }}</td>
                <td>{{ $grant['issued_by'] ?? '-' }}</td>
            </tr>
            @endforeach

            </tbody>
        </table>

        <!-- Section: Products -->
        <div class="section-header">Agriculture Products</div>
        <table class="table table-bordered">
            <thead><tr><th>Name</th><th>Total Production</th><th>Total Income</th><th>Profit</th></tr></thead>
            <tbody>
            @foreach ($homeGarden->agriculture_products ?? [] as $product)
                <tr>
                    <td>{{ $product['product_name'] ?? '' }}</td>
                    <td>{{ $product['total_production'] ?? '' }}</td>
                    <td>{{ $product['total_income'] ?? '' }}</td>
                    <td>{{ $product['profit'] ?? '' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Section: Credit Details -->
        <div class="section-header">Credit Detail</div>
        <div class="row">
            <div class="col-md-4"><p><span class="data-label">Bank:</span> {{ $homeGarden->bank_name ?? 'N/A' }}</p></div>
            <div class="col-md-4"><p><span class="data-label">Branch:</span> {{ $homeGarden->branch ?? 'N/A' }}</p></div>
            <div class="col-md-4"><p><span class="data-label">Account No:</span> {{ $homeGarden->account_number ?? 'N/A' }}</p></div>
            <div class="col-md-3"><p><span class="data-label">Interest Rate:</span> {{ $homeGarden->interest_rate }}</p></div>
            <div class="col-md-3"><p><span class="data-label">Credit Issue Date:</span> {{ $homeGarden->credit_issue_date }}</p></div>
            <div class="col-md-3"><p><span class="data-label">Loan Installment Date:</span> {{ $homeGarden->loan_installment_date }}</p></div>
            <div class="col-md-3"><p><span class="data-label">Credit Amount:</span> {{ $homeGarden->credit_amount }}</p></div>
            <div class="col-md-3"><p><span class="data-label">Installment Count:</span> {{ $homeGarden->number_of_installments }}</p></div>
            <div class="col-md-3"><p><span class="data-label">Installment Due Date:</span> {{ $homeGarden->installment_due_date }}</p></div>
            <div class="col-md-3"><p><span class="data-label">Credit Balance On:</span> {{ $homeGarden->credit_balance_on_date }}</p></div>
            <div class="col-md-3"><p><span class="data-label">Credit Balance:</span> {{ $homeGarden->credit_balance }}</p></div>
        </div>

        <!-- Section: Credit Payments -->
        <div class="section-header">Credit Payments</div>
        <table class="table table-bordered">
            <thead><tr><th>Date</th><th>Installment Payment</th></tr></thead>
            <tbody>
            @foreach ($homeGarden->credit_payments ?? [] as $cp)
                <tr>
                    <td>{{ $cp['payment_date'] ?? '' }}</td>
                    <td>{{ $cp['payment_value'] ?? '' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Action Buttons -->
        <div class="mt-3 text-end">
            <a href="{{ route('nutrient-home.edit', $homeGarden->id) }}" class="btn btn-primary me-2">
                <i class="fas fa-edit"></i> Edit
            </a>
            <form method="POST" class="delete-form d-inline" data-id="{{ $homeGarden->id }}">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger delete-btn"><i class="fas fa-trash-alt"></i> Delete</button>
            </form>

        </div>
    @endforeach


</div>
</div>
</div>


<script>
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function () {
            const form = this.closest('form');
            const id = form.getAttribute('data-id');

            Swal.fire({
                title: 'Are you sure?',
                text: "This record will be permanently deleted.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
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

</body>
</html>
